<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\riwayattransaksi;
use Carbon\Carbon;
use DB;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->guest()) {
            abort(403);
        }

        if(auth()->user()->username !== 'rajab25'){
            return view('pesanan', [
                "title" => "Pesanan"
            ]);
        }

        $now = Carbon::now();
        $now->timezone('Asia/Ujung_Pandang');
        $bulan = $now->format('F');
        $tahun = $now->year;
        $bulan_angka = $now->format('m');
        $hari = $now->format('d');
        $today = "$tahun-$bulan_angka-$hari";

        // dd($bulan);

        $random_color_utama = [];
        $random_color_secondary = [];
        $count_data = [];
        $layanan_data = [];
        $data_layanan = riwayattransaksi::groupby('layanan')->get();
        for($i=0; $i<count($data_layanan); $i++)
        {
            $layanan_data[$i] = $data_layanan[$i]->layanan;
            $count_data[$i] = count(riwayattransaksi::select('layanan')->where('layanan', $data_layanan[$i]->layanan)->get());
            $random_color_utama[$i] = '#' . dechex(rand(0,10000000));
            $random_color_secondary[$i] = '#' . dechex(rand(0,10000000));
        }

        $jumlah_transaksi = array_sum($count_data);

        $history = DB::table('riwayattransaksis')->select('nama as nama', 'tgl_transaksi as tanggal', 'total_biaya as biaya', 'collected_by as kasir')->latest()->get();
        
        for($j=0; $j<count($history); $j++)
        {
            $history_date[$j] = date("d", strtotime($history[$j]->tanggal));
            if($hari == $history_date[$j])
            {
                $history_today[$j] = $history[$j];
            }
            else
            {
                $history_previous[$j] = $history[$j];
            }
        }
        $history_previous_new = array_values($history_previous);

        $request2 = DB::table('riwayattransaksis')
        ->select([
            DB::raw('tgl_transaksi as tanggal1'),
            DB::raw('sum(total_biaya) as jumlah'),
        ])
        ->groupBy('tgl_transaksi')
        ->get(); 

        $request3 = DB::table('laporan_keuangans')
        ->select([
            DB::raw('tanggal as tanggal2'),
            DB::raw('sum(pengeluaran) as kurang'),
            DB::raw('keterangan as keterangan'),
        ])
        ->groupBy('tanggal')
        ->get();

        for($i=0; $i<count($request3); $i++)
        {
            $request3_new[$i] = [
                'tanggal' => $request3[$i]->tanggal2,
                'kurang' => $request3[$i]->kurang,
                'keterangan' => $request3[$i]->keterangan,
            ];
        }

        $tanggal = DB::select('SELECT * FROM riwayattransaksis LEFT JOIN laporan_keuangans ON riwayattransaksis.tgl_transaksi = laporan_keuangans.tanggal GROUP BY riwayattransaksis.tgl_transaksi UNION SELECT * FROM riwayattransaksis RIGHT JOIN laporan_keuangans ON riwayattransaksis.tgl_transaksi = laporan_keuangans.tanggal GROUP BY riwayattransaksis.tgl_transaksi');

        for($i=0; $i<count($tanggal); $i++)
        {
            $tanggal_laporan[$i] = [
                '0' => $tanggal[$i]->tgl_transaksi,
                '1' => $tanggal[$i]->tanggal
            ];
            for($j=0; $j<count($tanggal_laporan[$i]); $j++)
            {
                if($tanggal_laporan[$i][$j]==NULL)
                {
                    unset($tanggal_laporan[$i][$j]);
                }
            }
            $tanggal_laporan_new[$i] = array_values($tanggal_laporan[$i]);
        }

        for($j=0; $j<count($tanggal_laporan_new); $j++)
        {
            $laporan_pengeluaran[$j] = [
                'tanggal' => $tanggal_laporan_new[$j][0],
                'jumlah' => $request2[$j]->jumlah,
                // 'kurang' => $request2[$j]->kurang,
                // 'keterangan' => $request2[$j]->keterangan,
            ];
        }

        for($j=0; $j<count($tanggal_laporan_new); $j++)
        {
            for($k=0; $k<count($request3_new); $k++) 
            {
                if($laporan_pengeluaran[$j]['tanggal'] == $request3_new[$k]['tanggal'])
                {
                    $laporan_pengeluaran_new[$j] = array_merge($laporan_pengeluaran[$j], $request3_new[$k]);
                }
                else
                {
                    $laporan_pengeluaran_new[$j] = [
                        'tanggal' => $tanggal_laporan_new[$j][0],
                        'jumlah' => $request2[$j]->jumlah,
                        'kurang' => NULL,
                        'keterangan' => NULL,
                    ];
                }
            }
        }


        $tanggal_new = riwayattransaksi::select('tgl_transaksi')->get()->groupBy(function($tanggal_new){
            return Carbon::parse($tanggal_new->tgl_transaksi)->format('d');     
        });
        $tanggal_new2 = riwayattransaksi::select('tgl_transaksi')->get()->groupBy(function($tanggal_new){
            return Carbon::parse($tanggal_new->tgl_transaksi)->format('m');     
        });
        $tanggal_new3 = riwayattransaksi::select('tgl_transaksi')->get()->groupBy(function($tanggal_new){
            return Carbon::parse($tanggal_new->tgl_transaksi)->format('Y');     
        });

        $days=[];
        foreach($tanggal_new as $hari_new => $values)
        {
            $days[]=$hari_new;
        }

        $bulans=[];
        foreach($tanggal_new2 as $bulan_new => $values2)
        {
            $bulans[]=$bulan_new;
        }

        $tahuns=[];
        foreach($tanggal_new3 as $tahun_new => $values3)
        {
            $tahuns[]=$tahun_new;
        }
        
        for($j=0; $j<count($tanggal_laporan_new); $j++)
        {
            $pemasukan[$j] = $laporan_pengeluaran_new[$j]['jumlah'];

            $pengeluaran[$j] = $laporan_pengeluaran_new[$j]['kurang'];
        }
        $tot_pemasukan = array_sum($pemasukan);
        $tot_pengeluaran = array_sum($pengeluaran);
        $keuntungan = $tot_pemasukan-$tot_pengeluaran;

        for($j=0; $j<count($tanggal_laporan_new); $j++)
        {
            if($today == $tanggal_laporan_new[$j][0])
            {
                $pemasukan_hari_ini[$j] = $request2[$j]->jumlah;
            }
            else
            {
                $pemasukan_hari_ini[$j] = '0';
            }

        }
        $pemasukan_hari_ini_new = array_values($pemasukan_hari_ini);
        $pemasukan_hari_ini_new = array_sum($pemasukan_hari_ini);

        for($j=0; $j<count($tanggal_laporan_new); $j++)
        {
            if($bulan_angka == $bulans[0] and $tahun == $tahuns[0])
            {
                $pemasukan_bulan_ini[$j] = $request2[$j]->jumlah;
            }
            else
            {
                $pemasukan_bulan_ini[$j] = '0';
            }

        }
        $pemasukan_bulan_ini_new = array_values($pemasukan_bulan_ini);
        $pemasukan_bulan_ini_new = array_sum($pemasukan_bulan_ini);

        for($j=0; $j<count($tanggal_laporan_new); $j++)
        {
            if($tahun == $tahuns[0])
            {
                $pemasukan_tahun_ini[$j] = $request2[$j]->jumlah;
            }
            else
            {
                $pemasukan_tahun_ini[$j] = '0';
            }

        }
        $pemasukan_tahun_ini_new = array_values($pemasukan_tahun_ini);
        $pemasukan_tahun_ini_new = array_sum($pemasukan_tahun_ini);

        // dd($request3_new, $request2, $laporan_pengeluaran_new, $pemasukan, $pengeluaran, $lapor);
        return view('dashboard', [
            "title" => "Dashboard"
        ], compact('random_color_utama', 'random_color_secondary', 'count_data', 'layanan_data', 'jumlah_transaksi', 'bulan', 'history_today', 'history_previous_new', 'days', 'pemasukan', 'pengeluaran', 'keuntungan', 'tot_pemasukan', 'pemasukan_hari_ini_new','pemasukan_bulan_ini_new', 'pemasukan_tahun_ini_new'));
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
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
    }
}
