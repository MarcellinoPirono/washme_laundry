<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LayananKiloan;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\DB;

class LayananKiloanController extends Controller
{
    public function index()
    {
        return view('layanankiloan.tambah', [
            'title' => 'Layanan Kiloan',
            'active' => 'layanankiloan'
        ]);
    }

    public function store(Request $request)
    {

        // $validatedData = $request->validate([
        //     'layanan1' => 'required|max:255',
        //     'gambar' => 'image|file|mimes:jpeg,jpg,png,gif',
        //     'waktu1' => 'required|max:255',
        //     'keterangan1' => 'required|max:255',
        //     'express1' => 'required|max:255',
        //     'normal1' => 'required|max:255'

        // ]);

        $requestData = $request->all();
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $requestData["image"] = '/storage/' . $path;

        $layanan = [];
        $jenis = [];
        $keterangan = [];
        $image = [];
        $waktu_id = [];


        for ($i = 0; $i < 2; $i++) {
            $layanan[$i] = $requestData["layanan"];
            $jenis[$i] = $requestData["jenis"];
            $keterangan[$i] = $requestData["keterangan"];
            $image[$i] = $requestData["image"];
            $waktu_id[$i] = $i + 1;
        }

        for ($j = 0; $j < 2; $j++) {
            $layanans = [
                'layanan' => $layanan[$j],
                'jenis' => $jenis[$j],
                'image' => $image[$j],
                'estimasi_waktu' => $request->estimasi_waktu[$j],
                'keterangan' => $keterangan[$j],
                'harga' => $request->harga[$j],
                'waktu_id' => $waktu_id[$j],
            ];
            LayananKiloan::create($layanans);
        }
        
        $request->session()->flash('success', 'Registrasi Berhasil!');

        return redirect('/layanan');
    }
}
