<?php

namespace App\Http\Controllers;

use App\Jobs\KirimPesanFonnte;
use App\Models\logwa;
use App\Traits\WablasTrait;
use App\Models\Recruitment;
use App\services\fonnteservice;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        if (strlen($keyword)) {
            $datapeserta = Recruitment::where('Nama', 'ilike', "%$keyword%")
                ->orWhere('Formasi', 'ilike', "%$keyword%")->orWhere('nohp', 'ilike', "%$keyword%")->orWhere('NIK', 'ilike', "%$keyword%")->orWhere('Universitas/Sekolah', 'ilike', "%$keyword%")->paginate(10);
        } else {
            $datapeserta = Recruitment::orderBy('id', 'asc')->paginate(10);
        }
        // $datapeserta = Recruitment::paginate();
        return view('admin.recruitment.recruitment', compact('datapeserta'));
    }

    public function sendwa(Request $request, $id)
    {
        $recruitment = Recruitment::find($id);
        // dd($recruitment->Nama);
        $tgl_kirim = date("Y-m-d");
        $jam_kirim = date("H:i:s");
        $pesan =
            "Assalamu'alaikum Wr. Wb. 

Kepada Yth. *".trim($recruitment->Nama)."*

RS Sarkies 'Aisyiyah Kudus mengundang Bapak/Ibu untuk hadir dalam kegiatan *Rekrutmen Pegawai Tahap II (Tes Tertulis & Wawancara)* dengan formasi *".trim($recruitment->Formasi)."* yang akan dilaksanakan pada:

Hari, tgl  : Senin, 8 Desember 2025
Jam        : 08.00 wib - Selesai
Tempat  : Lantai Ground RS Sarkies 'Aisyiyah Kudus

Perlengkapan yang harus dibawa:
1. Alat tulis
2. Curriculum Vitae (CV) dan FC KTP 
3. ⁠Handphone yang terisi baterai full dan kuota

Harap memperhatikan hal-hal berikut ini:
1. Harap datang 15 menit sebelum jadwal
2. Memakai pakaian rapih, sopan dan bersepatu (perempuan wajib berjilbab)

**Mohon konfirmasi kesediaan Bapak/Ibu untuk menerima ataupun menolak undangan kami.*

Demikian informasi yang dapat kami sampaikan, atas perhatiannya kami sampaikan terimakasih. 

Salam sehat, salam hebat. 

*Panitia Rekruitmen Pegawai*
*RS Sarkies 'Aisyiyah Kudus*";

        // dd($pesan);
        $phone= '0' . ltrim($recruitment->nohp, '0'); // Use the phone number from the recruitment model
        // $phone = '081215837977'; // Example phone number, replace with actual phone number

        $kumpulan_data = [];
        // $data['phone'] = '0' . ltrim($recruitment->nohp, '0');
        // $data['phone'] = '081215837977';
        $data['message'] = $pesan;
        $data['secret'] = false;
        $data['retry'] = true;
        $data['isGroup'] = false;
        array_push($kumpulan_data, $data);
        // dd($phone);
        $sendwa = fonnteservice::sendText($phone, $pesan);

        if ($sendwa) {
            $validasi = [
                'nama' => $recruitment->Nama,
                'nohp' => $recruitment->nohp,
                'tgl_kirim' => $tgl_kirim,
                'jam_kirim' => $jam_kirim,
                'pesan' => $pesan,
            ];
            // logwa::create($validasi);
            return redirect()->back()->with('success', 'Berhasil mengirim notifikasi');
        } else {
            return redirect()->back()->withErrors('Gagagl mengirim notifikasi');
        };
    }

    public function bulkSend(Request $request)
    {
        $recruitments = Recruitment::limit(1)->get(); // Adjust the limit as needed
        $tgl_kirim = date("Y-m-d");
        $jam_kirim = date("H:i:s");
        // dd($recruitments);
        $pesan_list = [];
        $phone_list = [];
        foreach ($recruitments as $recruitment) {
//             
$pesan = "Assalamu'alaikum Wr. Wb. 

Kepada Yth. Tn. *Maya Yusinta*

Kami dari RS Sarkies 'Aisyiyah Kudus ingin menginformasikan jadwal kontrol  pada:

Hari, tgl : Kamis, 28 Maret 2024
Dokter  : dr. xxx, Sp.x
*Jadwal dokter bisa berubah sewaktu-waktu 

- Jika pembiayaan dengan BPJS, pendaftaran melalui aplikasi Mobile JKN, maksimal dilakukan H-1 dari hari pemeriksaan

Harap membawa persyaratan berikut ini:
1. surat kontrol
2. resume medis (bagi pasien rawat inap)

Demikian informasi yang dapat kami sampaikan, atas perhatiannya kami sampaikan terimakasih.  

Salam sehat.

Wassalamu’alaikum Wr. Wb.

Ikuti saluran Sarkies 'Aisyiyah Hospital di WhatsApp. https://whatsapp.com/channel/0029Vamy8ZSDeON9NVKWcb1K";
            // $pesan_list[] = $pesan;
            // $phone = '0' . ltrim($recruitment->nohp, '0');
            $phone = '085641471638'; //Example phone number, replace with actual phone number
            // $phone_list[] = $phone;
            // $img = null;
            // dd($img);
            dispatch(new KirimPesanFonnte($phone, $pesan)); // Optional: to avoid hitting API rate limits
            
        }
        // dd($phone);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
