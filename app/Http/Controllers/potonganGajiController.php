<?php

namespace App\Http\Controllers;

use App\Models\kretabpegawai;
use App\Models\obatdanperiksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class potonganGajiController extends Controller
{
    public function obatperiksa_pegawai_index()
    {
        return view('admin.penggajian.obatdanperiksa');
    }

    public function get_data_obat_periksa(Request $request)
    {
        $keyword  = $request->keyword;
        $tglAwal  = $request->tglAwal;
        $tglAkhir = $request->tglAkhir;

        $query = DB::table('obatdanperiksa_t as o')
            ->join('pegawai_m as p', 'p.id', '=', 'o.pegawai_fk')
            ->select(
                'o.id',
                'p.nip as nip_pegawai',
                'p.nama_lengkap as nama_pegawai',
                'o.periodegaji',
                'o.tanggaltransaksi',
                'o.debit',
                'o.keterangan'
            );

        if (!empty($tglAwal) && !empty($tglAkhir)) {
            $query->whereBetween('o.periodegaji', [$tglAwal, $tglAkhir]);
        }

        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('p.nama_lengkap', 'ilike', "%{$keyword}%")
                    ->orWhere('p.nip', 'ilike', "%{$keyword}%");
                // ->orWhere('o.keterangan', 'ilike', "%{$keyword}%");
            });
        }

        $data = $query->orderBy('o.tanggaltransaksi', 'asc')
            ->paginate(10)
            ->withQueryString();

        return response()->json([
            'datas' => $data->items(),
            'pagination' => (string) $data->links()
        ]);
    }

    public function simpanObatPeriksa(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'pegawai_fk'        => 'required|integer|exists:pegawai_m,id',
            'periodegaji'       => 'required',
            'tanggaltransaksi'  => 'required|date',
            'nominaldebit'      => 'required|numeric|min:0',
            'keterangan'        => 'nullable|string',
        ]);

        try {
            // Convert YYYY-MM menjadi YYYY-MM-01
            $periodeGaji = $validated['periodegaji'] . '-01';
            $data = obatdanperiksa::create([
                'pegawai_fk'       => $validated['pegawai_fk'],
                'periodegaji'      => $periodeGaji,
                'tanggaltransaksi' => $validated['tanggaltransaksi'],
                'debit'            => $validated['nominaldebit'],
                'keterangan'       => $validated['keterangan'] ?? null,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan',
                'data'    => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data',
            ], 500);
        }
    }

    public function kretab_pegawai_index()
    {
        return view('admin.penggajian.kretab');
    }

    public function get_data_kretab(Request $request)
    {
        $keyword  = $request->keyword;
        $tglAwal  = $request->tglAwal;
        $tglAkhir = $request->tglAkhir;

        $query = DB::table('kretabpegawai_t as k')
            ->join('pegawai_m as p', 'p.id', '=', 'k.pegawai_fk')
            ->select(
                'k.id',
                'p.nip as nip_pegawai',
                'p.nama_lengkap as nama_pegawai',
                'k.periodegaji',
                'k.tanggaltransaksi',
                'k.nominal',
                'k.keterangan'
            );

        if (!empty($tglAwal) && !empty($tglAkhir)) {
            $query->whereBetween('k.periodegaji', [$tglAwal, $tglAkhir]);
        }

        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('p.nama_lengkap', 'ilike', "%{$keyword}%")
                    ->orWhere('p.nip', 'ilike', "%{$keyword}%");
                // ->orWhere('k.keterangan', 'ilike', "%{$keyword}%");
            });
        }

        $data = $query->orderBy('k.tanggaltransaksi', 'asc')
            ->paginate(10)
            ->withQueryString();

        return response()->json([
            'datas' => $data->items(),
            'pagination' => (string) $data->links()
        ]);
    }

    public function simpanKretab(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'pegawai_fk'        => 'required|integer|exists:pegawai_m,id',
            'periodegaji'       => 'required',
            'tanggaltransaksi'  => 'required|date',
            'nominalkretab'      => 'required|numeric|min:0',
            'keterangan'        => 'nullable|string',
        ]);

        try {
            // Convert YYYY-MM menjadi YYYY-MM-01
            $periodeGaji = $validated['periodegaji'] . '-01';
            $data = kretabpegawai::create([
                'pegawai_fk'       => $validated['pegawai_fk'],
                'periodegaji'      => $periodeGaji,
                'tanggaltransaksi' => $validated['tanggaltransaksi'],
                'nominal'          => $validated['nominalkretab'],
                'keterangan'       => $validated['keterangan'] ?? null,
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function koperasi_pegawai_index()
    {
        return view('admin.penggajian.kopkar');
    }

    public function get_data_koperasi(Request $request)
    {
        // Implementasi logika untuk mengambil data koperasi dengan pagination dan search
        // Sesuaikan dengan struktur tabel dan model yang digunakan
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dimuat',
        ]);
    }

    public function simpanKoperasi(Request $request)
    {
        dd($request->all());
        // Implementasi logika untuk menyimpan data koperasi
        // Validasi input dan simpan ke database sesuai dengan struktur tabel dan model yang digunakan
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
        ]);
    }

    public function potongan_lain_pegawai_index()
    {
        return view('admin.penggajian.potonganLain');
    }
}
