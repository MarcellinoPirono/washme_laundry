<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\Rules\Exists;

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
            ->first();

        // $riwayat2 = $riwayat;

        if ($cari == null) {
            return view('404');
        } else {
            if ($riwayat == null) {
                return view('404');
            } else {
                return view('cari', ['riwayattransaksis' => $riwayat]);
            }
        }

        // return view('cari', ['riwayattransaksis' => $riwayat]);
        // dd($riwayat, $cari, $request->all());
        // dd($riwayat->get_class_methods['items']);
    }
}
