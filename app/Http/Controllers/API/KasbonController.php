<?php

namespace App\Http\Controllers\API;
use App\KasbonApi;
use App\PegawaiApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\KasbonCollection;
use App\Http\Resources\KasbonResource;
use App\Http\Requests\KasbonApiRequest;
use App\Jobs\SetujuMasalKasbon;

class KasbonController extends Controller
{
    public function index ()
    {
        $data = KasbonApi::selectRaw('kasbon_api.id, tanggal_diajukan, tanggal_disetujui, pegawai_api.nama as pegawai, total_kasbon')
        ->leftJoin('pegawai_api', 'pegawai_api.id', 'kasbon_api.pegawai_id')
        ->paginate(10);

        return new KasbonCollection($data);
    }

    public function store (KasbonApiRequest $request)
    {
        $bulan = date('m');
        $tahun = date('Y');
        $pegawai = PegawaiApi::select('tanggal_masuk', 'total_gaji')->where('id', $request->pegawai_id)->first();
        $masaKerja = ($pegawai == null) ? 0 : date('Y', strtotime($pegawai->tanggal_masuk));
        $totalGaji = ($pegawai == null) ? 0 : $pegawai->total_gaji;
        $persentase_kasbon = $request->total_kasbon/$totalGaji *100;

        if ($masaKerja <1):
            return response()->json(['Anda tidak bisa mengajukan kasbon karena belum 1 tahun masa kerja']);
        endif;

        if ($persentase_kasbon >=50):
            return response()->json(['Total kasbon melewati 50 persen dari gaji Anda']);
        endif;

        $kasbon = KasbonApi::where('pegawai_id', $request->pegawai_id)
        ->whereYear('tanggal_diajukan',$tahun)
        ->whereMonth('tanggal_diajukan',$bulan)
        ->count();

        $jumlah_kasbon = ($kasbon == null) ? 0 : $kasbon;

        if ($jumlah_kasbon >3):
            return response()->json(['Anda tidak bisa mengajukan kasbon karena sudah melebihi batas pengajuan']);
        endif;
        
        $rekues = $request->all();
        $rekues['tanggal_diajukan'] =date('Y-m-d');

        KasbonApi::create($rekues);

        return response()->json(['Kasbon berhasil diajukan, tunggu di disetujui']);
    }

    public function setuju(Request $request, $id)
    {
        KasbonApi::where('id', $id)->update(['tanggal_disetujui'=>date('Y-m-d')]);

        return response()->json(['Pengajuan Anda berhasil disetujui']);
    }

    public function setujuMasal (Request $request)
    {
        $rekues = $request->all();
        $total_kasbon = KasbonApi::where('tanggal_disetujui', $request->tanggal_setuju)->sum('total_kasbon');
        $status = SetujuMasalKasbon::dispatch($rekues);

        return response()->json($total_kasbon);
    }
}
