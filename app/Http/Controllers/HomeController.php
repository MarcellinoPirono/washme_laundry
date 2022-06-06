<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Home',
            'active' => '/'
        ]);
    }

    public function cari(Request $request)
    {
        // return view('', [
        //     "title" => "Beranda",
        //     "active" => '',
        //     "" => Beranda::latest()->get()
        // ]);
        // dd(request('search'));

        $cari = $request->cari;

        $riwayat = DB::table('riwayattransaksis')
            ->where('no_invoice', $cari)
            ->get();

        return view('cari', ['riwayattransaksis' => $riwayat]);
        // dd($riwayat);
    }
}
