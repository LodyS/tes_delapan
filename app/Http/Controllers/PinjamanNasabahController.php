<?php

namespace App\Http\Controllers;
use DB;
use App\Nasabah;
use App\PinjamanNasabah;
use Illuminate\Http\Request;

class PinjamanNasabahController extends Controller
{
    public function nasabah ()
    {
        $array = [];
        $nasabah = Nasabah::toBase()->get([
            'id',
            'nama_nasabah',
            'pekerjaan_nasabah',
            'penghasilan_nasabah',
        ]);

        $data = $nasabah->map(function($items){
            $array['id'] = $items->id;
            $array['nama_nasabah'] = $items->nama_nasabah;
            $array['pekerjaan_nasabah'] = $items->pekerjaan_nasabah;
            $array['penghasilan_nasabah'] = 'Rp '.number_format($items->penghasilan_nasabah);
            $array['maksimal_angsuran_pinjaman'] = 'Rp '. number_format($items->penghasilan_nasabah * 30/100);

            return $array;
        });

        return view('pinjaman/nasabah', compact('data'));
    }

    public function pinjaman($id)
    {
        $pinjaman = DB::table('pinjaman_nasabah')
        ->where('pinjaman_nasabah.id', $id)
        ->leftJoin('nasabah', 'nasabah.id', 'pinjaman_nasabah.nasabah_id')
        ->get(['pinjaman_nasabah.id','nama_nasabah', 'total_pinjaman', 'suku_bunga_per_bulan', 'tenor']);

        return view('pinjaman/pinjaman-berjalan', compact('pinjaman'));
    }

    public function anuitas ($id)
    {
        $pinjaman = PinjamanNasabah::where('pinjaman_nasabah.id', $id)
        ->leftJoin('nasabah', 'nasabah.id', 'pinjaman_nasabah.nasabah_id')
        ->select('nama_nasabah', 'total_pinjaman', 'suku_bunga_per_bulan', 'tenor', 'tanggal_disetujui')
        ->firstOrFail();

        $angsuran_per_bulan = $pinjaman->total_pinjaman/$pinjaman->tenor * $pinjaman->suku_bunga_per_bulan;

        return view('pinjaman/anuitas', compact('pinjaman', 'angsuran_per_bulan'));
    }
}
