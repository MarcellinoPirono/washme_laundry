<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data_Pelanggan;
use App\Models\Data_Layanan_Kiloan;
use App\Models\LaporanKeuangan;
use App\Models\Waktu;
use App\Models\Transaksi_Kiloan;
use App\Models\Nota_Kiloan;
use App\Models\riwayattransaksi;
use Carbon\Carbon;
use DB;

class AfterTransaksiKiloanController extends Controller
{
    public function index(Request $request)
    {
        $tanggals = Carbon::now()->format('Y-m-d');
        $now = Carbon::now();
        $thnBulan = $now->year.$now->month;
        $invoice = Data_Pelanggan::count();
        if($invoice == 0){
            $urut = 10000001;
            $nomor = 'WL'.$thnBulan.$urut;
        } else {
            $ambil = Data_Pelanggan::all()->last();
            $urut = (int)substr($ambil->no_invoice, -8);
            $nomor = 'WL'.$thnBulan.$urut;
        }
        $pelanggan=Data_Pelanggan::all()->where('no_invoice',$nomor);
        $transaksi=Transaksi_Kiloan::all()->where('no_invoice',$nomor);
        return view('transaksi.after_transaksi_kiloan', [
            'title' => 'Pesanan',
            'active' => 'transaksi',
            
        ], compact('pelanggan', 'transaksi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => "required",
            'handphone' => 'required',
            'email' => 'email:dns',
            'alamat' => 'required',
            'layanan' => 'required',
            'jenis' => 'required',
            'berat' => 'required',
            'mulai' => 'required',
            'keterangan' => 'required',
            'via' => 'required',
            'biaya_sekarang' => 'required',
        ]);     

        if($request->sisa_biaya == 0){
            $status_pembayaran = "Sudah Lunas";
        } else {
            $status_pembayaran = "Belum Lunas";
        }
        $status_pengambilan = "Belum Diambil";
        $status_proses = "Pencucian";
        $pelanggan = [
            'no_invoice' => $request->no_invoice,
            'tgl_transaksi' => $request->mulai,
            'nama' => $request->nama,
            'handphone' => $request->handphone,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'status_pembayaran' => $status_pembayaran,
            'status_pengambilan' => $status_pengambilan,
            'status_proses' => $status_proses,
        ];

        Data_Pelanggan::create($pelanggan);

        $jenis_db = Waktu::select('waktu_cuci')->where('id', $request->jenis)->first();
        $layanan_db = Data_Layanan_Kiloan::select('jenis', 'estimasi_waktu')->where('id', $request->layanan)->first();
        $jenis = $jenis_db->waktu_cuci;
        $layanan = $layanan_db->jenis;
        $collected_by = auth()->user()->nama;
        

        $transaksi = [
            'no_invoice' => $request->no_invoice,
            'layanan' => $layanan,
            'jenis' => $jenis,
            'harga' => $request->harga,           
            'berat' => $request->berat,           
            'total_biaya' => $request->total_biaya,
            'biaya_sekarang' => $request->biaya_sekarang,
            'sisa_biaya' => $request->sisa_biaya,
            'via' => $request->via,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'keterangan' => $request->keterangan,
            'collected_by' => $collected_by,
        ];

        Transaksi_Kiloan::create($transaksi);

        $nota = [
            'no_invoice' => $request->no_invoice,
            'nama' => $request->nama,
            'status_pembayaran' => $status_pembayaran,
            'layanan' => $layanan,
            'estimasi_waktu' => $layanan_db->estimasi_waktu,           
            'berat' => $request->berat,           
            'total_biaya' => $request->total_biaya,
            'biaya_sekarang' => $request->biaya_sekarang,
            'sisa_biaya' => $request->sisa_biaya,
            'via' => $request->via,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'keterangan' => $request->keterangan,
            'collected_by' => $collected_by,
        ];

        Nota_Kiloan::create($nota);

        $riwayat_transaksi = [
            'tgl_transaksi' => $request->mulai,
            'no_invoice' => $request->no_invoice,
            'nama' => $request->nama,
            'layanan' => $layanan,
            'total_biaya' => $request->total_biaya,
            'status_pembayaran' => $status_pembayaran,
            'status_pengambilan' => $status_pengambilan,
            'status_proses' => $status_proses,
            'collected_by' => $collected_by,
        ];

        riwayattransaksi::create($riwayat_transaksi);

        // $ketrangan = DB::table('laporan_keuangans')->select('keterangan')->where('tanggal', $request->mulai)->latest()->get();
        // $laporan_keuangan = [
        //     'no_invoice' => $request->no_invoice,
        //     'tanggal' => $request->mulai,
        //     'pemasukan' => $request->total_biaya,
        // ];

        // LaporanKeuangan::create($laporan_keuangan);

        return redirect('/after_transaksi_kiloan')->with('success', 'Data berhasil ditambah!');
    }
}
