<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data_Pelanggan;
use App\Models\Data_Layanan_Kiloan;
use App\Models\Data_Layanan_Satuan;
use App\Models\LaporanKeuangan;
use App\Models\Nota_Satuan;
use App\Models\riwayattransaksi;
use App\Models\Waktu;
use App\Models\Transaksi_Satuan;
use Carbon\Carbon;
use DB;

class AfterTransaksiSatuanController extends Controller
{
    
    // use Traits\Mytraits;
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
        $transaksi=Transaksi_Satuan::all()->where('no_invoice',$nomor);
        $sisa_biaya=$request->sisa_biaya;
        $total_biaya=$request->total_biaya;
        return view('transaksi.after_transaksi_satuan', [
            'title' => 'Pesanan',
            'active' => 'transaksi',
            
        ], compact('pelanggan', 'transaksi', 'sisa_biaya', 'total_biaya'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'handphone' => 'required',
            'email' => 'email:dns',
            'alamat' => 'required',
            'item' => 'required',
            'size' => 'required',
            'banyak' => 'required',
            'waktu_id' => 'required',
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
        
        $all_pesanan = $request->tot_pesanan;
        $collected_by = auth()->user()->nama;
        
        $no_invoice_arr=[];
        $nama_arr=[];
        $total_biaya_arr=[];
        $biaya_sekarang_arr=[];
        $sisa_biaya_arr=[];
        $via_arr=[];
        $mulai_arr=[];
        $selesai_arr=[];
        $keterangan_arr=[];
        $status_pembayaran_arr=[];
        $collected_by_arr=[];
        $waktu_id_arr=[];
        $total_biaya_arr=[];

        for($i=0; $i<$all_pesanan; $i++)
        {
            $no_invoice_arr[$i]=$request->no_invoice;
            $nama_arr[$i]=$request->nama;
            $total_biaya_arr[$i]=$request->total_biaya;
            $biaya_sekarang_arr[$i]=$request->biaya_sekarang;
            $sisa_biaya_arr[$i]=$request->sisa_biaya;
            $via_arr[$i]=$request->via;
            $mulai_arr[$i]=$request->mulai;
            $selesai_arr[$i]=$request->selesai;
            $keterangan_arr[$i]=$request->keterangan;
            $status_pembayaran_arr[$i]=$status_pembayaran;
            $collected_by_arr[$i]=$collected_by;
            $waktu_id_arr[$i]=$request->waktu_id;
        }

        for($j=0; $j<$all_pesanan; $j++){
            $transaksi = [
                'no_invoice' => $no_invoice_arr[$j],
                'layanan' => $request->layanan_arr[$j],
                'item' => $request->item_arr[$j],
                'size' => $request->size_arr[$j],
                'harga' => $request->total_arr[$j],           
                'jumlah' => $request->jumlah_arr[$j],           
                'total_biaya' => $total_biaya_arr[$j],
                'biaya_sekarang' => $biaya_sekarang_arr[$j],
                'sisa_biaya' => $sisa_biaya_arr[$j],
                'via' => $via_arr[$j],
                'mulai' => $mulai_arr[$j],
                'selesai' => $selesai_arr[$j],
                'keterangan' => $keterangan_arr[$j],
                'collected_by' => $collected_by_arr[$j],
            ];
            Transaksi_Satuan::create($transaksi);
        }

        for($k=0; $k<$all_pesanan; $k++)
        {
            $nota = [
                'no_invoice' => $no_invoice_arr[$k],
                'nama' => $nama_arr[$k],
                'status_pembayaran' => $status_pembayaran_arr[$k],
                'item' => $request->item_arr[$k],
                'estimasi_waktu' => $waktu_id_arr[$k],           
                'harga' => $request->total_arr[$k],           
                'jumlah' => $request->jumlah_arr[$k],           
                'total_biaya' => $total_biaya_arr[$k],
                'biaya_sekarang' => $biaya_sekarang_arr[$k],
                'sisa_biaya' => $sisa_biaya_arr[$k],
                'via' => $via_arr[$k],
                'mulai' => $mulai_arr[$k],
                'selesai' => $selesai_arr[$k],
                'keterangan' => $keterangan_arr[$k],
                'collected_by' => $collected_by_arr[$k],
            ];
            Nota_Satuan::create($nota);
        }

        $riwayat_transaksi = [
            'tgl_transaksi' => $request->mulai,
            'no_invoice' => $request->no_invoice,
            'nama' => $request->nama,
            'layanan' => $request->layanan_arr[0],
            'total_biaya' => $total_biaya_arr[0],
            'status_pembayaran' => $status_pembayaran,
            'status_pengambilan' => $status_pengambilan,
            'status_proses' => $status_proses,
            'collected_by' => $collected_by,
        ];

        riwayattransaksi::create($riwayat_transaksi);

        // $laporan_keuangan = [
        //     'no_invoice' => $request->no_invoice,
        //     'tanggal' => $request->mulai,
        //     'pemasukan' => $request->total_biaya,
        // ];

        // LaporanKeuangan::create($laporan_keuangan);

        return redirect('/after_transaksi_satuan')->with('success', 'Data berhasil ditambah!');
        
    }
}
