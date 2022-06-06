<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Models\Nota_Kiloan;
use App\Models\Nota_Satuan;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use DB;
use PDF;
use Storage;

use function GuzzleHttp\Promise\all;

class EmailController extends Controller
{
    public function index($no_invoice)
    {
        $data = Nota_Kiloan::all()->where('no_invoice', $no_invoice)->first();
        $pelanggan = DB::table('data__pelanggans')->select('email')->where('no_invoice', $no_invoice)->first();
        
        // dd($pelanggan);
        $pdf = PDF::loadview('nota_kiloan-pdf', [
            'no_invoice' => $data->no_invoice,
            'nama' => $data->nama,
            'email' => $pelanggan->email,
            'layanan' => $data->layanan,
            'mulai' => $data->mulai,
            'selesai' => $data->selesai,
            'collected_by' => $data->collected_by,
            'berat' => $data->berat,
            'total_biaya' => $data->total_biaya,
            'estimasi_waktu' => $data->estimasi_waktu,
            'keterangan' => $data->keterangan,
            'biaya_sekarang' => $data->biaya_sekarang,
            'sisa_biaya' => $data->sisa_biaya,
            'via' => $data->via,
            'status_pembayaran' => $data->status_pembayaran,
        ]);

        Nota_Kiloan::sendCustomerEmail($data, $pdf);
        // Mail::to('rajabisrafil@gmail.com')->send(new SendEmail);
        return redirect('/nota_kiloan_'.$data->no_invoice)->with('success', 'Data berhasil dikirim!');
    }

    public function index2($no_invoice)
    {
        $data = DB::table('nota__satuans')->select()->where('no_invoice', $no_invoice)->get();
        $pelanggan = DB::table('data__pelanggans')->select('email')->where('no_invoice', $no_invoice)->first();
        // dd($data);

        view()->share('data', $data);
        $pdf = PDF::loadView('nota_satuan-pdf', [
            'email' => $pelanggan->email,
        ]);

        Nota_Satuan::sendCustomerEmail($data, $pdf);

        return redirect('/nota_satuan_'.$data[0]->no_invoice)->with('success', 'Data berhasil dikirim!');
    }
}
