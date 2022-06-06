<?php

namespace App\Http\Controllers;

use App\Models\Data_Layanan_Kiloan;
use App\Models\Data_Pelanggan;
use App\Models\LaporanKeuangan;
use App\Models\Nota_Kiloan;
use App\Models\Nota_Satuan;
use App\Models\riwayattransaksi;
use App\Models\Transaksi_Kiloan;
use App\Models\Transaksi_Satuan;
use App\Models\Waktu;
use DB;
use Illuminate\Http\Request;

class RiwayatTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = DB::table('riwayattransaksis')->groupBy('no_invoice')->get();
        return view('riwayat_transaksi', [
            'title' => 'Riwayat Transaksi',
        ], compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($no_invoice)
    {
        $layanan = DB::table('riwayattransaksis')->select('layanan')->where('no_invoice', $no_invoice)->get();
        $pelanggan = Data_Pelanggan::all()->where('no_invoice', $no_invoice)->first();
        $transaksi = Transaksi_Kiloan::all()->where('no_invoice', $no_invoice);
        $transaksis = DB::table('transaksi__satuans')->select()->where('no_invoice', $no_invoice)->get();
        
        if($layanan[0]->layanan == 'Satuan')
        {
            return view('detail.detail_transaksi_satuan', [
                'title' => 'Riwayat Transaksi'
            ], compact('pelanggan', 'transaksis'));
        }
        else
        {
            return view('detail.detail_transaksi_kiloan', [
                'title' => 'Riwayat Transaksi'
            ], compact('pelanggan', 'transaksi'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($no_invoice)
    {
        $layanan = DB::table('riwayattransaksis')->select('layanan')->where('no_invoice', $no_invoice)->get();
        $pelanggan = Data_Pelanggan::all()->where('no_invoice', $no_invoice)->first();
        //Kiloan
        $transaksi = Transaksi_Kiloan::all()->where('no_invoice', $no_invoice)->first();
        $nota_kiloan = Nota_Kiloan::all()->where('no_invoice', $no_invoice)->first(); 
        //Satuan       
        $transaksis = DB::table('transaksi__satuans')->select()->where('no_invoice', $no_invoice)->get();
        $total_transaksi = count($transaksis);
        $transaksi1 = Transaksi_Satuan::all()->where('no_invoice', $no_invoice)->last();
        $nota_satuan = DB::table('nota__satuans')->select()->where('no_invoice', $no_invoice)->get();

        if($layanan[0]->layanan == 'Satuan')
        {
            $size = DB::table('sizes')->select('id')->where('size_item', $transaksi1->size)->get();
            $item_id = DB::table('data__layanan__satuans')->select('id')->where('item', $transaksi1->item)->where('size_id', $size[0]->id)->first();
            return view('partials.edit_transaksi_satuan', [
                'title' => 'Riwayat Transaksi'
            ], compact('pelanggan', 'transaksis', 'transaksi1', 'item_id', 'nota_satuan', 'total_transaksi'));
            // dd($pelanggan);
        }
        else
        {
            $jenis_id = DB::table('nota__kiloans')->select('layanan', 'estimasi_waktu')->where('no_invoice', $no_invoice)->first();
            $jenis_new_id = DB::table('data__layanan__kiloans')->select('id')->where('jenis', $jenis_id->layanan)->where('estimasi_waktu', $jenis_id->estimasi_waktu)->first();
            return view('partials.edit_transaksi_kiloan', [
                'title' => 'Riwayat Transaksi'
            ], compact('pelanggan', 'transaksi', 'nota_kiloan', 'jenis_new_id'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $no_invoice)
    {
        //Data Pelanggan
        $pelanggan = Data_Pelanggan::where('no_invoice', $no_invoice)->get();
        $pelanggan[0]->tgl_transaksi = $request->input('mulai');
        $pelanggan[0]->nama = $request->input('nama');
        $pelanggan[0]->handphone = $request->input('handphone');
        $pelanggan[0]->email = $request->input('email');
        $pelanggan[0]->alamat = $request->input('alamat');
        if($request->sisa_biaya == 0)
        {
            $status_pembayaran = 'Sudah Lunas';
        } else
        {
            $status_pembayaran = 'Belum Lunas';
        }
        $pelanggan[0]->status_pembayaran = $status_pembayaran;
        $pelanggan[0]->status_pengambilan = $request->input('status_pengambilan');
        $pelanggan[0]->status_proses = $request->input('status_proses');
        $pelanggan[0]->update();

        // Nota Kiloan
        $layanan_db = DB::table('data__layanan__kiloans')->select('jenis', 'estimasi_waktu')->where('id', $request->layanan)->get();
        $layanan = $layanan_db[0]->jenis;
        $nota = Nota_Kiloan::where('no_invoice', $no_invoice)->get();
        $nota[0]->nama = $request->input('nama');
        $nota[0]->status_pembayaran = $status_pembayaran;
        $nota[0]->layanan = $layanan;
        $nota[0]->estimasi_waktu = $request->input('waktu_id');
        $nota[0]->berat = $request->input('berat');
        $nota[0]->total_biaya = $request->input('total_biaya');
        $nota[0]->biaya_sekarang = $request->input('biaya_sekarang');
        $nota[0]->sisa_biaya = $request->input('sisa_biaya');
        $nota[0]->via = $request->input('via');
        $nota[0]->mulai = $request->input('mulai');
        $nota[0]->selesai = $request->input('selesai');
        $nota[0]->keterangan = $request->input('keterangan');
        $nota[0]->update();

        //Riwayat Transaksi
        if($request->jenis == 1)
        {
            $jenis_new = "Express";
        }
        else
        {
            $jenis_new = "Normal";
        }
        $layanan_jenis = "$layanan($jenis_new)";
        $riwayat = riwayattransaksi::where('no_invoice', $no_invoice)->get();
        $riwayat[0]->tgl_transaksi = $request->input('mulai');
        $riwayat[0]->nama = $request->input('nama');
        $riwayat[0]->layanan = $layanan_jenis;
        $riwayat[0]->total_biaya = $request->input('total_biaya');
        $riwayat[0]->status_pembayaran = $status_pembayaran;
        $riwayat[0]->status_pengambilan = $request->input('status_pengambilan');
        $riwayat[0]->status_proses = $request->input('status_proses');
        $riwayat[0]->update();

        //Transaksi Kiloan
        $jenis_db = Waktu::select('waktu_cuci')->where('id', $request->jenis)->first();
        $jenis = $jenis_db->waktu_cuci;
        $transaksi = Transaksi_Kiloan::where('no_invoice', $no_invoice)->get();
        $transaksi[0]->layanan = $layanan;
        $transaksi[0]->jenis = $jenis;
        $transaksi[0]->harga = $request->input('harga');
        $transaksi[0]->berat = $request->input('berat');
        $transaksi[0]->total_biaya = $request->input('total_biaya');
        $transaksi[0]->biaya_sekarang = $request->input('biaya_sekarang');
        $transaksi[0]->sisa_biaya = $request->input('sisa_biaya');
        $transaksi[0]->via = $request->input('via');
        $transaksi[0]->mulai = $request->input('mulai');
        $transaksi[0]->selesai = $request->input('selesai');
        $transaksi[0]->keterangan = $request->input('keterangan');
        $transaksi[0]->update();

        return redirect('/riwayat_transaksi')->with('success', 'Data berhasil diedit!');
    }

    public function updated(Request $request, $no_invoice)
    {
        //Data Pelanggan
        $pelanggan = Data_Pelanggan::where('no_invoice', $no_invoice)->get();
        $pelanggan[0]->tgl_transaksi = $request->input('mulai');
        $pelanggan[0]->nama = $request->input('nama');
        $pelanggan[0]->handphone = $request->input('handphone');
        $pelanggan[0]->email = $request->input('email');
        $pelanggan[0]->alamat = $request->input('alamat');
        if($request->sisa_biaya == 0)
        {
            $status_pembayaran = 'Sudah Lunas';
        } else
        {
            $status_pembayaran = 'Belum Lunas';
        }
        $pelanggan[0]->status_pembayaran = $status_pembayaran;
        $pelanggan[0]->status_pengambilan = $request->input('status_pengambilan');
        $pelanggan[0]->status_proses = $request->input('status_proses');
        $pelanggan[0]->update();

        //Nota Satuan
        $all_pesanan = $request->tot_pesanan;
        if($request->sisa_biaya == 0){
            $status_pembayaran = "Sudah Lunas";
        } else {
            $status_pembayaran = "Belum Lunas";
        }

        $nama_arr=[];
        $status_pembayaran_arr=[];
        $estimasi_waktu_arr=[];
        $total_biaya_arr=[];
        $biaya_sekarang_arr=[];
        $sisa_biaya_arr=[];
        $via_arr=[];
        $mulai_arr=[];
        $selesai_arr=[];
        $keterangan_arr=[];

        $nota = Nota_Satuan::where('no_invoice', $no_invoice)->get();
        // $notas = DB::table('');
        // dd($request->all());


        for($i=0; $i<$all_pesanan; $i++)
        {
            $nama_arr[$i] = $request->nama;
            $status_pembayaran_arr[$i] = $status_pembayaran;
            $estimasi_waktu_arr[$i] = $request->waktu_id;
            $total_biaya_arr[$i] = $request->total_biaya;
            $total_biaya_arr[$i] = $request->total_biaya;
            $biaya_sekarang_arr[$i] = $request->biaya_sekarang;
            $sisa_biaya_arr[$i] = $request->sisa_biaya;
            $via_arr[$i] = $request->via;
            $mulai_arr[$i] = $request->mulai;
            $selesai_arr[$i] = $request->selesai;
            $keterangan_arr[$i] = $request->keterangan;
        }

        for($j=0; $j<$all_pesanan; $j++)
        {
            $nota[$j]->nama = $nama_arr[$j];
            $nota[$j]->status_pembayaran = $status_pembayaran_arr[$j];
            $nota[$j]->item = $request->item_arr[$j+1];
            $nota[$j]->estimasi_waktu = $estimasi_waktu_arr[$j];
            $nota[$j]->jumlah = $request->jumlah_arr[$j+1];
            $nota[$j]->harga = $request->total_arr[$j+1];
            $nota[$j]->total_biaya = $total_biaya_arr[$j];
            $nota[$j]->biaya_sekarang = $biaya_sekarang_arr[$j];
            $nota[$j]->sisa_biaya = $sisa_biaya_arr[$j];
            $nota[$j]->via = $via_arr[$j];
            $nota[$j]->mulai = $mulai_arr[$j];
            $nota[$j]->selesai = $selesai_arr[$j];
            $nota[$j]->keterangan = $keterangan_arr[$j];
            $nota[$j]->update();
            // dd($nota);
        }

        //Riwayat Transaksi
        $riwayat = riwayattransaksi::where('no_invoice', $no_invoice)->get();
        $riwayat[0]->tgl_transaksi = $request->input('mulai');
        $riwayat[0]->nama = $request->input('nama');
        $riwayat[0]->layanan = $request->layanan_arr[1];
        $riwayat[0]->total_biaya = $request->input('total_biaya');
        $riwayat[0]->status_pembayaran = $status_pembayaran;
        $riwayat[0]->status_pengambilan = $request->input('status_pengambilan');
        $riwayat[0]->status_proses = $request->input('status_proses');
        $riwayat[0]->update();
        // dd($riwayat[0]);

        //Transaksi Satuan
        $transaksi = Transaksi_Satuan::where('no_invoice', $no_invoice)->get();
        for($k=0; $k<$all_pesanan; $k++)
        {
            $transaksi[$k]->layanan = $request->layanan_arr[$k+1];
            $transaksi[$k]->item = $request->item_arr[$k+1];
            $transaksi[$k]->size = $request->size_arr[$k+1];
            $transaksi[$k]->harga = $request->total_arr[$k+1];
            $transaksi[$k]->jumlah = $request->jumlah_arr[$k+1];
            $transaksi[$k]->total_biaya = $total_biaya_arr[$k];
            $transaksi[$k]->biaya_sekarang = $biaya_sekarang_arr[$k];
            $transaksi[$k]->sisa_biaya = $sisa_biaya_arr[$k];
            $transaksi[$k]->via = $via_arr[$k];
            $transaksi[$k]->mulai = $mulai_arr[$k];
            $transaksi[$k]->selesai = $selesai_arr[$k];
            $transaksi[$k]->keterangan = $keterangan_arr[$k];
            $transaksi[$k]->update();
        }
        // dd($transaksi);
        return redirect('/riwayat_transaksi')->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($no_invoice)
    {
        $layanan = DB::table('riwayattransaksis')->select('layanan')->where('no_invoice', $no_invoice)->get();
        if($layanan[0]->layanan == 'Satuan')
        {
            Data_Pelanggan::where('no_invoice', $no_invoice)->delete();
            Nota_Satuan::where('no_invoice', $no_invoice)->delete();
            riwayattransaksi::where('no_invoice', $no_invoice)->delete();
            Transaksi_Satuan::where('no_invoice', $no_invoice)->delete();
            // LaporanKeuangan::where('no_invoice', $no_invoice)->delete();
            return redirect('riwayat_transaksi')->with('success', 'Data berhasil dihapus!');
        }
        else
        {
            Data_Pelanggan::where('no_invoice', $no_invoice)->delete();
            Nota_Kiloan::where('no_invoice', $no_invoice)->delete();
            riwayattransaksi::where('no_invoice', $no_invoice)->delete();
            Transaksi_Kiloan::where('no_invoice', $no_invoice)->delete();
            // LaporanKeuangan::where('no_invoice', $no_invoice)->delete();
            return redirect('riwayat_transaksi')->with('success', 'Data berhasil dihapus!');
        }
    }
}
