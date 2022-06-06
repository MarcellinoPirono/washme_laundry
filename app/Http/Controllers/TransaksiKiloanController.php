<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data_Pelanggan;
use App\Models\Data_Layanan_Kiloan;
use App\Models\Waktu;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransaksiKiloanController extends Controller
{
    public function index(Request $request)
    {
        $waktuLayanan = Waktu::all();
        $tanggals = Carbon::now()->format('Y-m-d');
        $now = Carbon::now();
        $thnBulan = $now->year.$now->month;
        $invoice = Data_Pelanggan::count();
        if($invoice == 0){
            $urut = 10000001;
            $nomor = 'WL'.$thnBulan.$urut;
        } else {
            $ambil = Data_Pelanggan::all()->last();
            $urut = (int)substr($ambil->no_invoice, -8) + 1;
            $nomor = 'WL'.$thnBulan.$urut;
        }
        return view('transaksi.kiloan', [
            'title' => 'Pesanan',
            'active' => 'transaksi',
        ], compact('nomor', 'waktuLayanan'));
    }
    
    public function getLayanan(Request $request)
    {
        $cid=$request->post('cid');
        $layanan=DB::table('data__layanan__kiloans')->where('waktu_id',$cid)->orderBy('jenis')->get();
        
        $html='<option value="0">Select Layanan</option>';
        foreach($layanan as $list){
            $html.='<option value="'.$list->id.'">'.$list->jenis.'</option>';
        }
        echo $html;
    }

    public function getLayanan_id(Request $request)
    {
        $sid=$request->post('sid');
        $table1=DB::table('data__layanan__kiloans')->select('jenis','waktu_id','estimasi_waktu','harga')->where('id',$sid)->get();
        
        foreach($table1 as $list){
            if($list->waktu_id==1){
                $waktu = "Express";
            }else {
                $waktu = "Normal";
            }
            $html='<td>'.$list->jenis.'</td>';
            $html.='<td>'.$waktu.'</td>';
            $html.='<td>'.$list->estimasi_waktu.'</td>';
            $html.='<td>'.$list->harga.'</td>';
        }
        echo $html;        
    }

    public function getHarga(Request $request)
    {
        $wid=$request->post('wid');
        $data=Data_Layanan_Kiloan::find($request->wid)->where('id',$wid)->first();
        return response()->json($data);   
    }
}