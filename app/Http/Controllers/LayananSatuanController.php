<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LayananSatuan;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\DB;

class LayananSatuanController extends Controller
{
    public function index()
    {
        return view('layanansatuan.tambah1', [
            'title' => 'Layanan Satuan',
            'active' => 'layanansatuan'
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
        // dd($request->all());
        $request->size_id;
        $requestData = $request->all();
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $requestData["image"] = '/storage/' . $path;
        
        $layanan = [];
        $item = [];
        $image = [];
        $estimasi_waktu = [];
        $keterangan = [];
        $size_id = [];

        for($i=0; $i<count($request["harga"]); $i++){
            $layanan[$i] = $requestData["layanan"]; 
            $item[$i] = $requestData["item"]; 
            $image[$i] = $requestData["image"];
            $estimasi_waktu[$i] = $requestData["estimasi_waktu"];
            $keterangan[$i] = $requestData["keterangan"]; 
            $size_id[$i] = $i + $requestData["size_id"]; 
        }

        for ($j = 0; $j < count($request["harga"]); $j++) {
            $layanans = [
                'layanan' => $layanan[$j],
                'item' => $item[$j],
                'image' => $image[$j],
                'estimasi_waktu' => $estimasi_waktu[$j],
                'keterangan' => $keterangan[$j],
                'size_id' => $size_id[$j],
                'harga' => $request->harga[$j],
            ];
            LayananSatuan::create($layanans);
        }
        $request->session()->flash('success', 'Registrasi Berhasil!');

        return redirect('/layanan');
    }
}
