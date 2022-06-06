<?php

namespace App\Http\Controllers;

use App\Models\Data_Layanan_Satuan;
use App\Models\Data_Pelanggan;
use App\Models\Nota_Satuan;
use App\Models\Transaksi_Satuan;
use DB;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use PDF;

class NotaSatuanController extends Controller
{
    public function index($no_invoice)
    {
        $transaksi1 = Transaksi_Satuan::all()->where('no_invoice', $no_invoice)->first();
        $transaksi2 = Transaksi_Satuan::select('item','size','harga','jumlah')->where('no_invoice', $no_invoice)->get();
        $pelanggan = Data_Pelanggan::all()->where('no_invoice', $no_invoice)->first();
        
        $waktu = [];
        $item = [];
        $harga= [];
        for($j=0; $j<count($transaksi2); $j++){
            $item[$j] = $transaksi2[$j]->item;
            $harga[$j] = $transaksi2[$j]->harga/$transaksi2[$j]->jumlah;
        }
        
        for($k=0; $k<count($transaksi2); $k++){
            $waktu[$k] = Data_Layanan_Satuan::select('estimasi_waktu')->where('item', $item[$k])->where('harga', $harga[$k])->first(); 
        }

        $hari = $waktu[0]->estimasi_waktu;
        for($l=0; $l<count($transaksi2); $l++){
            if($hari<$waktu[$l]->estimasi_waktu){
                $hari=$waktu[$l]->estimasi_waktu;
            }
        }
        
        return view('nota.nota_satuan', [
            'title' => 'Pesanan',
        ], compact('pelanggan', 'transaksi1', 'transaksi2', 'hari'));
    }

    public function exportpdf($no_invoice)
    {
        $data = DB::table('nota__satuans')->select()->where('no_invoice', $no_invoice)->get();
        // dd($data[0]->no_invoice);
        
        view()->share('data', $data);
        $pdf = PDF::loadview('nota_satuan-pdf');
        return $pdf->download('Nota_Transaksi.pdf');
    }
}
