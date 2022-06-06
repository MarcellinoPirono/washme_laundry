<?php

namespace App\Http\Controllers;

use App\Models\Data_Layanan_Kiloan;
use App\Models\Data_Pelanggan;
use App\Models\Transaksi_Kiloan;
use App\Models\Nota_Kiloan;
use Illuminate\Http\Request;
use PDF;

class NotaKiloanController extends Controller
{
    public function index($no_invoice)
    {
        $transaksi = Transaksi_Kiloan::all()->where('no_invoice', $no_invoice)->first();
        $pelanggan = Data_Pelanggan::all()->where('no_invoice', $no_invoice)->first();
        $layanan = Data_Layanan_Kiloan::all()->where('jenis', $transaksi["layanan"])->where('harga', $transaksi["harga"])->first();
        $hari = $layanan["estimasi_waktu"];
        return view('nota.nota_kiloan', [
            'title' => 'Pesanan',
        ], compact('pelanggan', 'transaksi', 'hari'));
    }

    public function exportpdf($no_invoice)
    {
        $data = Nota_Kiloan::all()->where('no_invoice', $no_invoice)->first();
        
        view()->share('data', $data);
        $pdf = PDF::loadview('download_nota');
        return $pdf->download('Nota_Transaksi.pdf');
    }
}
