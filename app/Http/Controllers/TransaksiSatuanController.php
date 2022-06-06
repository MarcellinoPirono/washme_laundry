<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data_Pelanggan;
use App\Models\Data_Layanan_Satuan;
use App\Models\size;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class TransaksiSatuanController extends Controller
{
    public function index(Request $request)
    {
        $itemSize = size::all();
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
        return view('transaksi.satuan', [
            'title' => 'Pesanan',
            'active' => 'transaksi',
        ], compact('nomor', 'itemSize'));
    }

    public function getSize(Request $request)
    {
        $cid=$request->post('cid');
        $size=DB::table('data__layanan__satuans')->where('size_id',$cid)->orderBy('item')->get();
        
        $html='<option value="0">Select Item</option>';
        foreach($size as $list){
            $html.='<option value="'.$list->id.'">'.$list->item.'</option>';
        }
        echo $html;
    }

    public function getSize_id(Request $request)
    {
        $jid=$request->post('jid');
        $data=Data_Layanan_Satuan::find($request->jid)->where('id',$jid)->first();
        return response()->json($data);
    }

    public function getItemHarga(Request $request)
    {
        $wid=$request->post('wid');
        $data=Data_Layanan_Satuan::find($request->wid)->where('id',$wid)->first();
        return response()->json($data);
    }

    public function getJumlah(Request $request)
    {
        $jid=$request->post('jid');
        $data=Data_Layanan_Satuan::find($request->jid)->where('id',$jid)->first();
        return response()->json($data);
    }
}
