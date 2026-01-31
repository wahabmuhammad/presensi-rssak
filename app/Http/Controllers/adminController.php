<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Presensi;
use App\Models\presensiIn;
use App\Models\presensiOut;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportMasuk;
use App\Exports\ExportPulang;
use App\Models\pegawai;
use GrahamCampbell\ResultType\Success;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.adminDashboard');
    }

    public function user(Request $request)
    {
        $today = date("Y-m-d");
        $bulanIni = date("m", strtotime($today));
        $tahunIni = date("Y");
        $user = Auth::user()->nip;

        // $presensimasukBulanini = DB::table('presensi')->whereMonth('tgl_presensi', $bulanIni)->where('nip', $user)->orderBy('tgl_presensi')->get();
        // $presensipulangBulanini = DB::table('presensi_out')->whereMonth('tgl_presensi_out', $bulanIni)->where('nip', $user)->orderBy('tgl_presensi_out')->get();
        $keyword = $request->search;

        if (strlen($keyword)) {
            $userTable = User::where('nip', 'like', "%$keyword%")
                ->orWhere('name', 'like', "%$keyword%")->paginate(10);
        } else {
            $userTable = User::orderBy('id', 'asc')->paginate(10);
        }
        // dd(request('search'));
        return view('admin.kepegawaian.user', compact('userTable'));
    }

    public function create_user(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|unique:users,nip',
            'password' => 'required|min:8',
            'email' => 'required|email|max:255|unique:users',
            'jabatan' => 'required|string|max:255',
            'role' => 'required'
        ]);
        //create to database
        $simpan = User::create($validasi);
        if ($simpan) {
            // toastr()->success('Data berhasi disimpan');
            return back()->with('success', 'Berhasil Membuat User');
        } else {
            // toastr()->error('Data gagal disimpan!');
            return back()->with('error', 'Gagal Membuat User');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        // dd($user->name);
        return view('admin.kepegawaian.editUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|max:255',
            'jabatan' => 'required|string|max:255',
            'role' => 'required'
        ]);

        $user = User::find($id);
        // $user = User::all();
        // dd($user);
        $user->update($request->all());
        // toastr()->success('Data berhasi diperbarui!');
        return redirect(route('kepegawaianUser'))->with('success', 'Update Data berhasil');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        // toastr()->success('Data berhasi dihapus!');
        return redirect(route('kepegawaianUser'))->with('success', 'Berhasil Menghapus User');
    }

    public function rekap(Request $request)
    {
        $today = date("Y-m-d");
        $bulanIni = date("m", strtotime($today));
        $keyword = $request->search;
        $start_to = $request->date_start;
        $end_to = $request->date_to;

        if ($start_to != null && $end_to != null) {
            if (strlen($keyword)) {
                $rekapMasuk = presensiIn::where('nip', 'ilike', "%$keyword%")
                    ->orWhere('name', 'ilike', "%$keyword%")
                    ->whereBetween('tgl_presensi', [$start_to, $end_to])
                    ->paginate(15);

                $jumlahMasuk = presensiIn::where('nip', 'ilike', "%$keyword%")
                    ->orWhere('name', 'ilike', "%$keyword%")
                    ->whereBetween('tgl_presensi', [$start_to, $end_to])
                    ->select('jam_in')
                    ->count();

                $totalTerlambat = presensiIn::where('nip', 'ilike', "%$keyword%")
                    ->orWhere('name', 'ilike', "%$keyword%")
                    ->whereBetween('tgl_presensi', [$start_to, $end_to])
                    ->whereNotNull('jam_terlambat')
                    ->count();
                // dd($totalTerlambat);
            } else {
                $rekapMasuk = presensiIn::whereBetween('tgl_presensi', [$start_to, $end_to])->paginate(15);

                $jumlahMasuk = presensiIn::where('nip', 'ilike', "%$keyword%")
                    ->orWhere('name', 'ilike', "%$keyword%")
                    ->whereBetween('tgl_presensi', [$start_to, $end_to])
                    ->select('jam_in')
                    ->count();

                $totalTerlambat = presensiIn::whereBetween('tgl_presensi', [$start_to, $end_to])
                    ->whereNotNull('jam_terlambat')
                    ->count();
                // dd($jumlahMasuk);
            }
        } else {
            $rekapMasuk = presensiIn::whereYear('tgl_presensi', date("Y"))
                ->whereMonth('tgl_presensi', $bulanIni)
                ->orderBy('tgl_presensi')
                ->paginate('15');

            $jumlahMasuk = presensiIn::whereBetween('tgl_presensi', [$start_to, $end_to])
                ->select('jam_in')
                ->count();

            $totalTerlambat = presensiIn::whereBetween('tgl_presensi', [$start_to, $end_to])
                ->whereNotNull('jam_terlambat')
                ->count();
            // dd($jumlahMasuk);
        }
        return view('admin.rekapPresensi.presensiIn', compact('rekapMasuk', 'today', 'jumlahMasuk', 'totalTerlambat'));
    }

    public function exportMasuk()
    {
        return Excel::download(new ExportMasuk, "Rekap_Presensi_Masuk.xlsx");
    }

    public function rekapOut(Request $request)
    {
        // dd($request);
        $today = date("Y-m-d");
        $bulanIni = date("m", strtotime($today));
        $keyword = $request->search;
        $start_to = $request->date_start;
        $end_to = $request->date_to;

        if (strlen($keyword)) {
            $rekapPulang = presensiOut::where('nip', 'ilike', "%$keyword%")
                ->orWhere('name', 'like', "%$keyword%")->paginate(15);
        } elseif ($keyword or ($start_to && $end_to)) {
            $rekapPulang = presensiOut::whereBetween('tgl_presensi_out', [$start_to, $end_to])->paginate(15);
        } else {
            $rekapPulang = presensiOut::whereMonth('tgl_presensi_out', $bulanIni)->orderBy('tgl_presensi_out')->paginate('15');
        }
        return view('admin.rekapPresensi.presensiOut', compact('rekapPulang', 'today'));
    }

    public function exportPulang()
    {
        return Excel::download(new ExportPulang, "Rekap_Presensi_Pulang.xlsx");
    }

    public function dataPegawai(Request $request)
    {
        // $datas =  DB::table('pegawais')
        // ->leftJoin('jenisproduk_m', 'jenisproduk_m.id', '=', 'produk_t.jenisproduk_fk')
        // ->leftJoin('kelompokproduk_m', 'kelompokproduk_m.id', '=', 'jenisproduk_m.kelompokproduk_fk')
        // ->leftJoin('detailjenis_m', 'detailjenis_m.id', '=', 'produk_t.detailjenis_fk')
        // ->leftJoin('penjamin_t', 'penjamin_t.id', '=', 'produk_t.penjamin_fk')
        // ->select('produk_t.*', 'jenisproduk_m.namajenis', 'kelompokproduk_m.namakelompok', 'detailjenis_m.detailjenis', 'penjamin_t.namapenjamin')
        // ->where('produk_t.statusenabled', '=', true)->orderBy('id', 'asc')
        // ->paginate(10);
        // Jika request AJAX
        // if ($request->ajax()) {
        // dd($datas);
        // return view('user.pemeriksaan', compact('datas'))->render();
        //     return response()->json([
        //         'datas' => $datas->items(),
        //         'pagination' => (string) $datas->links()
        //     ]);
        // }
        // dd($datas);
        return view('admin.kepegawaian.data-pegawai');
    }
    public function get_datapegawai()
    {
        $pegawai = DB::table('pegawai_m')
            ->leftJoin('status_kerja_m', 'status_kerja_m.id', '=', 'pegawai_m.status_pegawaifk')
            ->leftJoin('statuskawin_m', 'statuskawin_m.id', '=', 'pegawai_m.status_kawinfk')
            ->leftJoin('ruangan_m', 'ruangan_m.id_ruangan', '=', 'pegawai_m.unitkerja')
            ->leftJoin('jabatan_fungsional_m', 'jabatan_fungsional_m.id', '=', 'pegawai_m.tunjangan_fungsional_fk')
            ->leftJoin('jenispegawai_m', 'jenispegawai_m.id', '=', 'pegawai_m.jenispegawai_fk')
            ->leftJoin('formasi_m', 'formasi_m.id', '=', 'pegawai_m.formasi_fk')
            ->leftJoin('pendidikan_m', 'pendidikan_m.id', '=', 'pegawai_m.pendidikan_fk')
            ->leftJoin('jabatan_m', 'jabatan_m.id', '=', 'pegawai_m.jabatan_fk')
            ->select(
                'pegawai_m.*',
                DB::raw("
                    CASE 
                        WHEN pegawai_m.jenis_kelamin = 1 THEN 'Laki-laki'
                        WHEN pegawai_m.jenis_kelamin = 2 THEN 'Perempuan'
                        ELSE '-'
                    END AS jenis_kelamin_text
                "),
                DB::raw("TO_CHAR(pegawai_m.tgl_lahir, 'DD-MM-YYYY') AS tgl_lahir_formatted"),
                DB::raw("TO_CHAR(pegawai_m.awal_masuk, 'DD-MM-YYYY') AS awal_masuk_formatted"),
                DB::raw("TO_CHAR(pegawai_m.tmt, 'DD-MM-YYYY') AS tmt_formatted"),
                DB::raw("TO_CHAR(pegawai_m.sk_pt, 'DD-MM-YYYY') AS sk_pt_formatted"),
                DB::raw("EXTRACT(YEAR FROM AGE(CURRENT_DATE, pegawai_m.tgl_lahir)) AS usia"),
                'status_kerja_m.status_kerja',
                'statuskawin_m.status_kawin',
                'ruangan_m.nama_ruangan as unitkerja',
                'jabatan_fungsional_m.jabatan_fungsional',
                'jenispegawai_m.jenispegawai',
                'formasi_m.formasi',
                'pendidikan_m.nama_pendidikan',
                'jabatan_m.namajabatan as jabatan'
            )
            ->where('pegawai_m.statusenabled', '=', true)
            ->orderBy('pegawai_m.id', 'asc')
            ->paginate(10);
        // Jika request AJAX
        // return view('user.pemeriksaan', compact('datas'))->render();
        return response()->json([
            'datas' => $pegawai->items(),
            'pagination' => (string) $pegawai->links()
        ]);
    }
    //function ajax get-pegawai
    public function get_pegawai(Request $request)
    {
        $keyword = $request->query('query');
        $pegawai = DB::table('pegawai_m')
            ->where('nama_lengkap', 'ilike', "%$keyword%")
            // ->orWhere('nip', 'ilike', "%$keyword%")
            ->select('id', 'nama_lengkap')
            ->get();

        return response()->json($pegawai);
    }

    //get data pegawai options
    public function options_datapegawai()
    {
        return response()->json([
            'statusPegawai' => DB::table('status_kerja_m')->where('statusenabled', true)->get(),
            'statusKawin'   => DB::table('statuskawin_m')->where('statusenabled', true)->get(),
            'ruangan'     => DB::table('ruangan_m')->where('statusenabled', true)->select('id_ruangan', 'nama_ruangan')->get(),
            'tunjanganFungsional' => DB::table('jabatan_fungsional_m')->where('statusenabled', true)->select('id', 'jabatan_fungsional')->get(),
            'jenisPegawai'  => DB::table('jenispegawai_m')->where('statusenabled', true)->get(),
            'formasi'      => DB::table('formasi_m')->where('statusenabled', true)->get(),
            'pendidikan'   => DB::table('pendidikan_m')->where('statusenabled', true)->get(),
            'jabatan'       => DB::table('jabatan_m')->where('statusenabled', true)->select('id', 'namajabatan')->get(),
        ]);
    }

    public function store_datapegawai(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|unique:pegawai_m,nik',
            'nip' => 'required|unique:pegawai_m,nip',
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'required|string|max:100',
            'tempat_lahir' => 'required|string|max:100',
            'tgl_lahir' => 'required|date',
            'gol_mk' => 'required|string|max:50',
            'awal_masuk' => 'required|date',
            'tmt' => 'nullable|date',
            'sk_pt' => 'nullable|date',
            'jenis_kelamin' => 'required|integer',
            'alamat' => 'nullable|string',
            'alumni' => 'nullable|string|max:255',
            'nohp' => 'string|max:20',
            'email' => 'nullable|max:255',
            'pendidikan_fk' => 'required|integer',
            'program_studi' => 'nullable|string|max:255',
            'status_pegawaifk' => 'required|integer',
            'tunjangan_fungsional_fk' => 'required|integer',
            'status_kawinfk' => 'required|integer',
            'unitkerja' => 'required|integer',
            'formasi_fk' => 'required|integer',
            'jabatan_fk' => 'required|integer',
            'jenispegawai_fk' => 'required|integer',
        ]);

        $pegawai = pegawai::create($validatedData);

        return response()->json(['success' => true, 'message' => 'Data pegawai berhasil disimpan.']);
    }

    public function slipgaji()
    {
        return view('admin.kepegawaian.slipgajiIndex');
    }

    public function inputGaji()
    {
        return view('admin.kepegawaian.gaji-pegawai');
    }

    //function get_data_gaji_pegawai on index gaji-pegawai
    public function get_data_gaji_pegawai(Request $request)
    {
        $data = DB::table('komponengaji_m')
            ->leftJoin('pegawai_m', 'pegawai_m.id', '=', 'komponengaji_m.pegawai_fk')
            ->select(
                'komponengaji_m.*',
                'pegawai_m.nama_lengkap as nama_pegawai',
                'pegawai_m.nip as nip_pegawai'
            )
            // ->where('komponengaji_m.statusenabled', true)
            ->orderBy('komponengaji_m.id_komponengaji', 'asc')
            ->paginate(10);
        return response()->json([
            'datas' => $data->items(),
            'pagination' => (string) $data->links()
        ]);
    }

    public function get_komponen_gaji(Request $request)
    {
        $id = $request->query('data');
        $komponenGaji = $pegawai = DB::table('pegawai_m')
            ->leftJoin('status_kerja_m', 'status_kerja_m.id', '=', 'pegawai_m.status_pegawaifk')
            ->leftJoin('statuskawin_m', 'statuskawin_m.id', '=', 'pegawai_m.status_kawinfk')
            ->leftJoin('ruangan_m', 'ruangan_m.id_ruangan', '=', 'pegawai_m.unitkerja')
            ->leftJoin('jabatan_fungsional_m', 'jabatan_fungsional_m.id', '=', 'pegawai_m.tunjangan_fungsional_fk')
            ->leftJoin('jenispegawai_m', 'jenispegawai_m.id', '=', 'pegawai_m.jenispegawai_fk')
            ->leftJoin('formasi_m', 'formasi_m.id', '=', 'pegawai_m.formasi_fk')
            ->leftJoin('pendidikan_m', 'pendidikan_m.id', '=', 'pegawai_m.pendidikan_fk')
            ->leftJoin('jabatan_m', 'jabatan_m.id', '=', 'pegawai_m.jabatan_fk')
            ->leftJoin('komponengaji_m', 'komponengaji_m.pegawai_fk', '=', 'pegawai_m.id')
            ->select(
                'pegawai_m.*',
                DB::raw("
                    CASE 
                        WHEN pegawai_m.jenis_kelamin = 1 THEN 'Laki-laki'
                        WHEN pegawai_m.jenis_kelamin = 2 THEN 'Perempuan'
                        ELSE '-'
                    END AS jenis_kelamin_text
                "),
                DB::raw("TO_CHAR(pegawai_m.tgl_lahir, 'DD-MM-YYYY') AS tgl_lahir_formatted"),
                DB::raw("TO_CHAR(pegawai_m.awal_masuk, 'DD-MM-YYYY') AS awal_masuk_formatted"),
                DB::raw("TO_CHAR(pegawai_m.tmt, 'DD-MM-YYYY') AS tmt_formatted"),
                DB::raw("TO_CHAR(pegawai_m.sk_pt, 'DD-MM-YYYY') AS sk_pt_formatted"),
                DB::raw("EXTRACT(YEAR FROM AGE(CURRENT_DATE, pegawai_m.tgl_lahir)) AS usia"),
                DB::raw("EXTRACT(YEAR FROM AGE(CURRENT_DATE, pegawai_m.awal_masuk)) AS masa_kerja"),
                'status_kerja_m.status_kerja',
                'statuskawin_m.status_kawin',
                'ruangan_m.nama_ruangan as unitkerja',
                'jabatan_fungsional_m.jabatan_fungsional',
                'jenispegawai_m.jenispegawai',
                'formasi_m.formasi',
                'pendidikan_m.nama_pendidikan',
                'jabatan_m.namajabatan as jabatan',
                'komponengaji_m.pgpns',
                'komponengaji_m.tahunpgpns',
                'komponengaji_m.dasarbpjsks',
                'komponengaji_m.dasarbpjstk'
            )
            ->where('pegawai_m.statusenabled', '=', true)
            ->first();

        return response()->json($komponenGaji);
    }
    // function store_komponengaji
    public function store_komponengaji(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'pegawai_fk' => 'required|integer',
            'pgpns' => 'required|string|max:255',
            'tahunpgpns' => 'nullable|numeric',
            'dasarbpjsks' => 'nullable|string|max:50',
            'dasarbpjstk' => 'nullable|string|max:50',
        ]);

        $komponenGaji = DB::table('komponengaji_m')->insert($validatedData);

        return response()->json(['success' => true, 'message' => 'Komponen gaji berhasil disimpan.']);
    }

    public function komponenGajiIndex()
    {
        return view('admin.kepegawaian.komponengaji_index');
    }
}
