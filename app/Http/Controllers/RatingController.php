<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rating;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    //
    public function allRating()
    {
        $rati = DB::table('ratings')->get();
        $ratinges = $rati->sortByDesc('id');
        return view('rating.index', compact('ratinges'));
    }

    public function read()
    {
        $i = 1;
        $rati = DB::table('ratings')->get();
        $ratinges = $rati->sortByDesc('id');
        return view('rating.all', compact('ratinges', 'i'));
    }

    public function create(Request $request)
    {

        $request->validate(
            [
                'rating' => 'required',
                'name_pelanggan' => 'required',
                'komentar' => 'required',

            ],
            [
                'rating.required' => 'Please Input ID Telegram',
                'name_pelanggan.required' => 'Please Input Name Teknisi',
                'komentar.required' => 'Please Input komentar',
            ]
        );
        $ra = $request->input('rating');
        $nama = $request->input('name_pelanggan');
        $jenis_l = $request->input('jenis_l');
        $komentar = $request->input('komentar');
        $date = date('Y-m-d H:i');
        $query = DB::table('ratings')->insert([
            'rating' => $ra,
            'nama_pelanggan' => $nama,
            'jenis_layanan' => $jenis_l,
            'komentar' => $komentar,
            'tanggal' => $date,
        ]);
        if ($query) {
            return back()->with('Success', 'Terima Kasih, Jika Ada Masalah Silakan Ajukan Pemasalahan Kembali');
        } else {
            return back()->with('Failed', 'Terjadi Kesalahan Sistem, Ulangi Nanti');
        }
    }
}
