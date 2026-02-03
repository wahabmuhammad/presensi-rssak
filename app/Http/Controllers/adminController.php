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
    public function get_datapegawai(Request $request)
    {
        $keyword = $request->keyword;

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
            ->where('pegawai_m.statusenabled', true)
            ->when($keyword, function ($query, $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('pegawai_m.nip', 'ILIKE', "%{$keyword}%")
                        ->orWhere('pegawai_m.nama_lengkap', 'ILIKE', "%{$keyword}%");
                });
            })
            ->orderBy('pegawai_m.id', 'asc')
            ->paginate(10)
            ->withQueryString();

        return response()->json([
            'datas' => $pegawai->items(),
            'pagination' => (string) $pegawai->links()
        ]);
    }
    //function edit_pegawai
    public function edit_pegawai($pegawaiId)
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
                'jabatan_m.namajabatan as jabatan',
                'ruangan_m.id_ruangan as unitkerja'
            )
            ->where('pegawai_m.statusenabled', true)
            ->where('pegawai_m.id', $pegawaiId)
            ->first();
        return response()->json($pegawai);
    }
    //function ajax get-pegawai
    public function get_pegawai(Request $request)
    {
        $keyword = $request->query('query');
        $pegawai = DB::table('pegawai_m')
            ->where('nama_lengkap', 'ilike', "%$keyword%")
            // ->orWhere('nip', 'ilike', "%$keyword%")
            // ->select('id', 'nama_lengkap')
            ->get();

        return response()->json($pegawai);
    }

    //function update_pegawai
    public function update_pegawai(Request $request)
    {
        $pegawaiId = $request->input('id_pegawai');
        $validatedData = $request->validate([
            'nik' => 'required| unique:pegawai_m,nik,' . $pegawaiId,
            'nip' => 'required|unique:pegawai_m,nip,' . $pegawaiId,
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

        $pegawai = pegawai::findOrFail($pegawaiId);
        $pegawai->update($validatedData);

        return response()->json(['success' => true, 'message' => "Data pegawai berhasil diperbarui."]);
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
        $keyword = $request->keyword;

        $data = DB::table('komponengaji_m')
            ->leftJoin('pegawai_m', 'pegawai_m.id', '=', 'komponengaji_m.pegawai_fk')
            ->select(
                'komponengaji_m.*',
                'pegawai_m.id as id_pegawai',
                'pegawai_m.nama_lengkap as nama_pegawai',
                'pegawai_m.nip as nip_pegawai'
            )
            ->when($keyword, function ($query, $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('pegawai_m.nip', 'ILIKE', "%{$keyword}%")
                        ->orWhere('pegawai_m.nama_lengkap', 'ILIKE', "%{$keyword}%")
                        ->orWhere('komponengaji_m.pgpns', 'ILIKE', "%{$keyword}%")
                        ->orWhere('komponengaji_m.tahunpgpns', 'ILIKE', "%{$keyword}%");
                });
            })
            ->orderBy('komponengaji_m.id_komponengaji', 'asc')
            ->paginate(10)
            ->withQueryString();

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
    //function edit_komponen_gaji
    public function edit_komponen_gaji($pegawaiId)
    {
        $komponenGaji = DB::table('komponengaji_m')
            ->leftJoin('pegawai_m', 'pegawai_m.id', '=', 'komponengaji_m.pegawai_fk')
            ->select(
                'komponengaji_m.*',
                'pegawai_m.id as id_pegawai',
                'pegawai_m.nama_lengkap',
                'pegawai_m.nip as nip_pegawai'
            )
            ->where('komponengaji_m.id_komponengaji', $pegawaiId)
            ->first();

        return response()->json($komponenGaji);
    }
    //function update_komponengaji
    public function update_komponengaji(Request $request)
    {
        // dd($request);
        $komponenId = $request->input('id_komponengaji');
        $validatedData = $request->validate([
            'pegawai_fk' => 'required|integer',
            'pgpns' => 'required|string|max:255',
            'tahunpgpns' => 'required|numeric',
            'dasarbpjsks' => 'nullable|string|max:50',
            'dasarbpjstk' => 'nullable|string|max:50',
        ]);

        $komponenGaji = DB::table('komponengaji_m')->where('id_komponengaji', $komponenId)->update($validatedData);

        return response()->json(['success' => true, 'message' => "Data komponen gaji berhasil diperbarui."]);
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

    public function get_data_kode_tunjangan_pangan(Request $request)
    {
        $keyword = $request->query('query');
        $kode_tunjangan_pangan = DB::table('statuskawin_m')
            ->where(function ($q) use ($keyword) {
                $q->where('kode', 'ilike', "%$keyword%")
                    ->orWhere('status_kawin', 'ilike', "%$keyword%");
            })
            ->where('statusenabled', true)
            ->get();

        return response()->json($kode_tunjangan_pangan);
    }

    public function get_data_tunjangan_pangan(Request $request)
    {
        $keyword = $request->keyword;

        $data = DB::table('tunjangan_pangan_m')
            ->leftJoin('statuskawin_m', 'statuskawin_m.id', '=', 'tunjangan_pangan_m.status_kawin_fk')
            ->select(
                'tunjangan_pangan_m.*',
                'statuskawin_m.kode as kode_status_kawin',
                'statuskawin_m.status_kawin as status_kawin'
            )
            ->when($keyword, function ($query, $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('statuskawin_m.status_kawin', 'ILIKE', "%{$keyword}%")
                        ->orWhere('tunjangan_pangan_m.tunjangan_pasangan', 'ILIKE', "%{$keyword}%")
                        ->orWhere('tunjangan_pangan_m.tunjangan_anak', 'ILIKE', "%{$keyword}%")
                        ->orWhere('tunjangan_pangan_m.tunjangan_pangan', 'ILIKE', "%{$keyword}%");
                });
            })
            ->orderBy('tunjangan_pangan_m.id', 'asc')
            ->paginate(5)
            ->withQueryString();

        return response()->json([
            'datas' => $data->items(),
            'pagination' => (string) $data->links()
        ]);
    }

    public function store_status_tunjangan_pangan(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            // 'status_kawin_fk' => 'required|unique:statuskawin_m,kode',
            'status_kawin_fk' => 'required|integer',
            'tunjangan_pasangan' => 'nullable|numeric',
            'tunjangan_anak' => 'nullable|numeric',
            'tunjangan_pangan' => 'nullable|numeric',
            'ptkp' => 'nullable|numeric',
        ]);

        $statusTunjanganPangan = DB::table('tunjangan_pangan_m')->insert($validatedData);

        return response()->json(['success' => true, 'message' => 'Status tunjangan pangan berhasil disimpan.']);
    }
    //function get_data_tunjangan_fungsional
    public function get_data_tunjangan_fungsional(Request $request)
    {
        $keyword = $request->keyword;

        $data = DB::table('tunjangan_fungsional_m')
            ->leftJoin('jabatan_fungsional_m', 'jabatan_fungsional_m.id', '=', 'tunjangan_fungsional_m.jabatan_fungsional_fk')
            ->select(
                'tunjangan_fungsional_m.*',
                'jabatan_fungsional_m.kode_fungsional as kode_jabatan_fungsional',
                'jabatan_fungsional_m.jabatan_fungsional as jabatan_fungsional'
            )
            ->when($keyword, function ($query, $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('jabatan_fungsional_m.jabatan_fungsional', 'ILIKE', "%{$keyword}%")
                        ->orWhere('tunjangan_fungsional_m.persentase_tunjangan', 'ILIKE', "%{$keyword}%")
                        ->orWhere('tunjangan_fungsional_m.indeks_tunjangan', 'ILIKE', "%{$keyword}%")
                        ->orWhere('tunjangan_fungsional_m.nilai_tunjangan', 'ILIKE', "%{$keyword}%");
                });
            })
            ->orderBy('tunjangan_fungsional_m.id', 'asc')
            ->paginate(10)
            ->withQueryString();

        return response()->json([
            'datas' => $data->items(),
            'pagination' => (string) $data->links()
        ]);
    }
    //Function Tunjangan Fungsional
    public function store_status_tunjangan_fungsional(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'jabatan_fungsional_fk' => 'required|integer|unique:tunjangan_fungsional_m,jabatan_fungsional_fk',
            'persentase_tunjangan' => 'required|numeric',
            'indeks_tunjangan' => 'required|numeric',
            'nilai_tunjangan' => 'required|numeric',
            'mkkurang5' => 'required|numeric',
            'mkkurang10' => 'required|numeric',
            'mklebih10' => 'required|numeric',
            'ifpegawaitetap' => 'nullable|numeric',
        ]);

        $statusTunjanganFungsional = DB::table('tunjangan_fungsional_m')->insert($validatedData);

        return response()->json(['success' => true, 'message' => 'Tunjangan fungsional berhasil disimpan.']);
    }

    //function get_kode_tunjangan_fungsional
    public function get_data_kode_tunjangan_fungsional(Request $request)
    {
        // dd($request->query('query'));
        $keyword = $request->query('query');
        $kode_tunjangan_fungsional = DB::table('jabatan_fungsional_m')
            ->where(function ($q) use ($keyword) {
                $q->where('kode_fungsional', 'ilike', "%$keyword%")
                    ->orWhere('jabatan_fungsional', 'ilike', "%$keyword%");
            })
            ->where('statusenabled', true)
            ->select('id', 'kode_fungsional', 'jabatan_fungsional')
            ->get();

        return response()->json($kode_tunjangan_fungsional);
    }

    //function tunjangan jabatan
    public function get_data_tunjangan_jabatan(Request $request)
    {
        $keyword = $request->keyword;

        $data = DB::table('tunjangan_jabatan_m')
            ->leftJoin('jabatan_m', 'jabatan_m.id', '=', 'tunjangan_jabatan_m.jabatan_fk')
            ->select(
                'tunjangan_jabatan_m.*',
                'jabatan_m.kode_jabatan as kode_jabatan',
                'jabatan_m.namajabatan as nama_jabatan'
            )
            ->when($keyword, function ($query, $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('jabatan_m.namajabatan', 'ILIKE', "%{$keyword}%")
                        ->orWhere('tunjangan_jabatan_m.nominal', 'ILIKE', "%{$keyword}%")
                        ->orWhere('tunjangan_jabatan_m.nominalpo', 'ILIKE', "%{$keyword}%")
                        ->orWhere('tunjangan_jabatan_m.nominalcp', 'ILIKE', "%{$keyword}%");
                });
            })
            ->orderBy('tunjangan_jabatan_m.id', 'asc')
            ->paginate(5)
            ->withQueryString();

        return response()->json([
            'datas' => $data->items(),
            'pagination' => (string) $data->links()
        ]);
    }
    //function get_data_kode_tunjangan_jabatan
    public function get_data_kode_tunjangan_jabatan(Request $request)
    {
        // dd($request->query('query'));
        $keyword = $request->query('query');
        $kode_tunjangan_jabatan = DB::table('jabatan_m')
            ->where(function ($q) use ($keyword) {
                $q->where('kode_jabatan', 'ilike', "%$keyword%")
                    ->orWhere('namajabatan', 'ilike', "%$keyword%");
            })
            ->where('statusenabled', true)
            ->select('id', 'kode_jabatan', 'namajabatan')
            ->get();

        return response()->json($kode_tunjangan_jabatan);
    }

    //function store_status_tunjangan_jabatan
    public function store_status_tunjangan_jabatan(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'jabatan_fk' => 'required|integer|unique:tunjangan_jabatan_m,jabatan_fk',
            'nominal' => 'required|numeric',
            'nominalpo' => 'required|numeric',
            'nominalcp' => 'required|numeric',
        ]);

        $statusTunjanganJabatan = DB::table('tunjangan_jabatan_m')->insert($validatedData);

        return response()->json(['success' => true, 'message' => 'Tunjangan jabatan berhasil disimpan.']);
    }
    //function get_data_tunjangan_kinerja
    public function get_data_tunjangan_kinerja(Request $request)
    {
        $keyword = $request->keyword;

        $data = DB::table('tunjangan_kinerja_m')
            ->leftJoin('jabatan_m', 'jabatan_m.id', '=', 'tunjangan_kinerja_m.jabatan_fk')
            ->select(
                'tunjangan_kinerja_m.*',
                'jabatan_m.kode_jabatan as kode_jabatan',
                'jabatan_m.namajabatan as nama_jabatan'
            )
            ->when($keyword, function ($query, $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('jabatan_m.namajabatan', 'ILIKE', "%{$keyword}%")
                        ->orWhere('tunjangan_kinerja_m.nominal', 'ILIKE', "%{$keyword}%")
                        ->orWhere('tunjangan_kinerja_m.nominalpo', 'ILIKE', "%{$keyword}%")
                        ->orWhere('tunjangan_kinerja_m.nominalcp', 'ILIKE', "%{$keyword}%");
                });
            })
            ->orderBy('tunjangan_kinerja_m.id', 'asc')
            ->paginate(5)
            ->withQueryString();

        return response()->json([
            'datas' => $data->items(),
            'pagination' => (string) $data->links()
        ]);
    }
    //function store tunjangan kinerja
    public function store_status_tunjangan_kinerja(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'jabatan_fk' => 'required|integer|unique:tunjangan_kinerja_m,jabatan_fk',
            'nominal' => 'required|numeric',
            'nominalpo' => 'required|numeric',
            'nominalcp' => 'required|numeric',
        ]);

        $statusTunjanganKinerja = DB::table('tunjangan_kinerja_m')->insert($validatedData);

        return response()->json(['success' => true, 'message' => 'Tunjangan kinerja berhasil disimpan.']);
    }

    //BPJS function index
    public function bpjs_pegawai_index()
    {
        return view('admin.kepegawaian.bpjs_pegawai_index');
    }

    //function slip gaji pegawai index
    public function slip_gaji_pegawai_index()
    {
        // dd(auth()->user());
        return view('admin.kepegawaian.slipgajipegawai_index');
    }

    //get daata slip gaji pegawai
    public function get_data_slip_gaji(Request $request)
    {
        $data = DB::table('pegawai_m')
            ->leftJoin('komponengaji_m', 'komponengaji_m.pegawai_fk', '=', 'pegawai_m.id')
            ->leftJoin('status_kerja_m', 'status_kerja_m.id', '=', 'pegawai_m.status_pegawaifk')
            ->leftJoin('jabatan_m', 'jabatan_m.id', '=', 'pegawai_m.jabatan_fk')
            ->leftJoin('statuskawin_m', 'statuskawin_m.id', '=', 'pegawai_m.status_kawinfk')
            ->leftJoin('jabatan_fungsional_m', 'jabatan_fungsional_m.id', '=', 'pegawai_m.tunjangan_fungsional_fk')
            ->leftJoin('tunjangan_jabatan_m', 'tunjangan_jabatan_m.jabatan_fk', '=', 'pegawai_m.jabatan_fk')
            ->leftJoin('tunjangan_pangan_m', 'tunjangan_pangan_m.status_kawin_fk', '=', 'pegawai_m.status_kawinfk')
            ->leftJoin('tunjangan_kinerja_m', 'tunjangan_kinerja_m.jabatan_fk', '=', 'pegawai_m.jabatan_fk')
            ->leftJoin('tunjangan_fungsional_m', 'tunjangan_fungsional_m.jabatan_fungsional_fk','=','pegawai_m.tunjangan_fungsional_fk')
            ->select(
                'pegawai_m.nip',
                'pegawai_m.nama_lengkap',
                'pegawai_m.gol_mk',
                'statuskawin_m.kode as statuskawin',
                'jabatan_fungsional_m.kode_fungsional',
                DB::raw("
                    CASE 
                        WHEN pegawai_m.jenis_kelamin = 1 THEN 'L'
                        WHEN pegawai_m.jenis_kelamin = 2 THEN 'P'
                        ELSE '-'
                    END AS jenis_kelamin_text
                "),
                DB::raw("TO_CHAR(pegawai_m.tmt, 'DD-MM-YYYY') AS tmt_formatted"),
                DB::raw("TO_CHAR(pegawai_m.sk_pt, 'DD-MM-YYYY') AS sk_pt_formatted"),
                DB::raw("EXTRACT(YEAR FROM AGE(CURRENT_DATE, pegawai_m.awal_masuk)) AS masakerja"),
                'jabatan_m.namajabatan as nama_jabatan',
                'status_kerja_m.status_kerja',
                'komponengaji_m.pgpns',
                DB::raw("
                    CASE
                        WHEN status_kerja_m.id = 1 THEN komponengaji_m.pgpns
                        WHEN status_kerja_m.id IN (2,3,4,6) THEN komponengaji_m.pgpns * 0.8
                        ELSE komponengaji_m.pgpns
                    END AS gaji_pokok
                "),
                DB::raw("
                    CASE
                        WHEN status_kerja_m.id NOT IN (1,2,3,4,6) THEN 0
                        WHEN pegawai_m.status_kawinfk = tunjangan_pangan_m.status_kawin_fk
                            THEN COALESCE(komponengaji_m.pgpns,0) 
                                * COALESCE(tunjangan_pangan_m.tunjangan_pasangan,0) / 100
                        ELSE 0
                    END AS tunjangan_pasangan
                "),
                DB::raw("
                    CASE
                        WHEN status_kerja_m.id NOT IN (1,2,3,4,6) THEN 0
                        WHEN pegawai_m.status_kawinfk = tunjangan_pangan_m.status_kawin_fk
                            THEN COALESCE(komponengaji_m.pgpns,0) 
                                * COALESCE(tunjangan_pangan_m.tunjangan_anak,0) / 100
                        ELSE 0
                    END AS tunjangan_anak
                "),
                DB::raw("
                    CASE
                        WHEN status_kerja_m.id NOT IN (1,2,3,4,6) THEN 0
                        WHEN pegawai_m.status_kawinfk = tunjangan_pangan_m.status_kawin_fk
                            THEN COALESCE(tunjangan_pangan_m.tunjangan_pangan,0)
                        ELSE 0
                    END AS tunjangan_pangan
                "),
                DB::raw("
                    CASE
                        -- TIDAK DAPAT TUNJANGAN
                        WHEN status_kerja_m.id NOT IN (1,2,3,4,6) OR jabatan_m.id IN(1,2,3) THEN 0

                        -- KHUSUS jabatan_fungsional_fk = 1 DAN status PT
                        WHEN pegawai_m.tunjangan_fungsional_fk = 1
                            AND status_kerja_m.id = 1 THEN tunjangan_fungsional_m.ifpegawaitetap

                        -- MASA KERJA < 5 TAHUN
                        WHEN EXTRACT(YEAR FROM AGE(CURRENT_DATE, pegawai_m.awal_masuk)) < 5
                            THEN COALESCE(tunjangan_fungsional_m.mkkurang5, 0)

                        -- MASA KERJA 5 - <10 TAHUN
                        WHEN EXTRACT(YEAR FROM AGE(CURRENT_DATE, pegawai_m.awal_masuk)) >= 5
                        AND EXTRACT(YEAR FROM AGE(CURRENT_DATE, pegawai_m.awal_masuk)) < 10
                            THEN COALESCE(tunjangan_fungsional_m.mkkurang10, 0)

                        -- MASA KERJA >= 10 TAHUN
                        WHEN EXTRACT(YEAR FROM AGE(CURRENT_DATE, pegawai_m.awal_masuk)) >= 10
                            THEN COALESCE(tunjangan_fungsional_m.mklebih10, 0)

                        ELSE 0
                    END AS tunjangan_fungsional
                "),
                DB::raw("
                    CASE
                        WHEN status_kerja_m.id IN (2,3,4) THEN COALESCE(tunjangan_jabatan_m.nominalcp, 0)
                        WHEN status_kerja_m.id = 6 THEN COALESCE(tunjangan_jabatan_m.nominalpo, 0)
                        ELSE tunjangan_jabatan_m.nominal
                    END AS tunjangan_jabatan
                "),
                'tunjangan_kinerja_m.nominal as tunjangan_kinerja',
                DB::raw("
                    CASE
                        WHEN status_kerja_m.id NOT IN (1,2,3,4,6) THEN 0
                        ELSE ROUND(COALESCE(komponengaji_m.dasarbpjsks, 0) * 0.04)
                    END AS bpjs_kesehatan
                "),
                DB::raw("
                    CASE
                        WHEN status_kerja_m.id NOT IN (1,2,3,4,6) THEN 0
                        ELSE ROUND(COALESCE(komponengaji_m.dasarbpjstk, 0) * 0.0624)
                    END AS bpjs_ketenagakerjaan
                "),
            )
            ->where('pegawai_m.statusenabled', true)
            ->orderBy('jabatan_m.id', 'asc')
            ->get();
        // ->paginate(10)
        // ->withQueryString();

        return response()->json([
            'datas' => $data
            // 'datas' => $data->items(),
            // 'pagination' => (string) $data->links()
        ]);
    }
}
