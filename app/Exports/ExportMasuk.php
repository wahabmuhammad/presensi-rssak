<?php

namespace App\Exports;

use App\Models\presensiIn;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class  ExportMasuk implements FromCollection, WithHeadings, WithDrawings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data->map(function ($item) {
            return [
                'NIP'            => $item->nip,
                'nama'          => $item->name,
                'shift'         => $item->shift,
                'foto_masuk'    => '', // kosong karena gambar pakai Drawing
                'tgl_presensi'  => $item->tgl_presensi,
                'jam_masuk'     => $item->jam_in,
                'foto_pulang'   => '', // kosong karena gambar pakai Drawing
                'tgl_pulang'    => $item->tgl_presensi_out,
                'jam_pulang'    => $item->jam_out,
                'jam_terlambat' => $item->jam_terlambat,
                'total_jamkerja' => $item->total_jamkerja,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'NIP',
            'Nama',
            'shift',
            'Foto Masuk',
            'Tanggal Masuk',
            'Jam Masuk',
            'Foto Pulang',
            'Tanggal Pulang',
            'Jam Pulang',
            'Jam Terlambat',
            'Total Jam Kerja',
        ];
    }

    public function drawings()
    {
        $drawings = [];
        $row = 2;

        foreach ($this->data as $item) {

            // FOTO MASUK (kolom F)
            if ($item->foto_in && file_exists(public_path('storage/' . $item->foto_in))) {

                $drawingMasuk = new Drawing();
                $drawingMasuk->setName('Foto Masuk');
                $drawingMasuk->setDescription('Foto Masuk');
                $drawingMasuk->setPath(public_path('storage/' . $item->foto_in));
                $drawingMasuk->setHeight(70);
                $drawingMasuk->setCoordinates('F' . $row);

                $drawings[] = $drawingMasuk;
            }

            // FOTO PULANG (kolom G)
            if ($item->foto_out && file_exists(public_path('storage/' . $item->foto_out))) {

                $drawingPulang = new Drawing();
                $drawingPulang->setName('Foto Pulang');
                $drawingPulang->setDescription('Foto Pulang');
                $drawingPulang->setPath(public_path('storage/' . $item->foto_out));
                $drawingPulang->setHeight(70);
                $drawingPulang->setCoordinates('G' . $row);

                $drawings[] = $drawingPulang;
            }

            $row++;
        }

        return $drawings;
    }

    // Supaya tinggi row menyesuaikan gambar
    public function styles(Worksheet $sheet)
    {
        $rowCount = count($this->data) + 1;

        for ($i = 2; $i <= $rowCount; $i++) {
            $sheet->getRowDimension($i)->setRowHeight(80);
        }
    }
}
