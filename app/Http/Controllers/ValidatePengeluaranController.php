<?php

namespace App\Http\Controllers;

use App\Models\LaporanKeuangan;
use DB;
use Illuminate\Http\Request;

class ValidatePengeluaranController extends Controller
{
    public function store(Request $request)
    {
        $pengeluaran = [
            'tanggal' => $request->tanggalinput,
            'pengeluaran' => $request->input,
            'keterangan' => $request->keterangan,
        ];

        LaporanKeuangan::create($pengeluaran);

        return redirect('/input_pengeluaran')->with('success', 'Data berhasil ditambah!');        
    }
}
