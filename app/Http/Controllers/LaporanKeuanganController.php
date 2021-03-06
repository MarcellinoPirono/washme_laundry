<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\LaporanKeuangan;
use DASPRiD\Enum\NullValue;
use DB;
use PDF;
use Illuminate\Http\Request;
use Mockery\Undefined;
use UnexpectedValueException;

use function PHPUnit\Framework\isEmpty;

class LaporanKeuanganController extends Controller
{
    public function index()
    {

        $request2 = DB::table('riwayattransaksis')
            ->select([
                DB::raw('tgl_transaksi as tanggal1'),
                DB::raw('sum(total_biaya) as jumlah'),
            ])
            ->groupBy('tgl_transaksi')
            ->get();

        $request3 = DB::table('riwayattransaksis')
            ->select([
                DB::raw('riwayattransaksis.tgl_transaksi as tanggal2'),
                DB::raw('pengeluaran as kurang'),
                DB::raw('keterangan as keterangan'),
            ])
            ->leftJoin('laporan_keuangans', 'laporan_keuangans.tanggal', '=', 'riwayattransaksis.tgl_transaksi')
            ->groupBy('tgl_transaksi')
            ->get();

        for ($i = 0; $i < count($request3); $i++) {
            $request3_new[$i] = [
                'tanggal' => $request3[$i]->tanggal2,
                'kurang' => $request3[$i]->kurang,
                'keterangan' => $request3[$i]->keterangan,
            ];
        }

        $tanggal = DB::select('SELECT * FROM riwayattransaksis LEFT JOIN laporan_keuangans ON riwayattransaksis.tgl_transaksi = laporan_keuangans.tanggal GROUP BY riwayattransaksis.tgl_transaksi UNION SELECT * FROM riwayattransaksis RIGHT JOIN laporan_keuangans ON riwayattransaksis.tgl_transaksi = laporan_keuangans.tanggal GROUP BY riwayattransaksis.tgl_transaksi');

        for ($i = 0; $i < count($tanggal); $i++) {
            $tanggal_laporan[$i] = [
                '0' => $tanggal[$i]->tgl_transaksi,
                '1' => $tanggal[$i]->tanggal
            ];
            for ($j = 0; $j < count($tanggal_laporan[$i]); $j++) {
                if ($tanggal_laporan[$i][$j] == NULL) {
                    unset($tanggal_laporan[$i][$j]);
                }
            }
            $tanggal_laporan_new[$i] = array_values($tanggal_laporan[$i]);
        }

        for ($j = 0; $j < count($tanggal_laporan_new); $j++) {
            $laporan_pengeluaran[$j] = [
                'tanggal' => $tanggal_laporan_new[$j][0],
                'jumlah' => $request2[$j]->jumlah,
            ];
        }

        for ($j = 0; $j < count($tanggal_laporan_new); $j++) {
            for ($k = 0; $k < count($request3_new); $k++) {
                if ($laporan_pengeluaran[$j]['tanggal'] == $request3_new[$k]['tanggal']) {
                    $laporan_pengeluaran_new[$j] = array_merge($laporan_pengeluaran[$j], $request3_new[$k]);
                }
            }
        }

        return view('laporan_keuangan', compact('laporan_pengeluaran_new'), [
            "title" => "Laporan Keuangan",
            'users' => Users::where('is_admin', '0')->get()
        ]);
    }

    public function delete($tanggal)
    {
        LaporanKeuangan::where('tanggal', $tanggal)->delete();

        return redirect('laporan_keuangan')->with('success', 'Data berhasil dihapus!');
    }

    public function exportpdf_kelola()
    {
        $request2 = DB::table('riwayattransaksis')
            ->select([
                DB::raw('tgl_transaksi as tanggal1'),
                DB::raw('sum(total_biaya) as jumlah'),
            ])
            ->groupBy('tgl_transaksi')
            ->get();

        $request3 = DB::table('riwayattransaksis')
            ->select([
                DB::raw('riwayattransaksis.tgl_transaksi as tanggal2'),
                DB::raw('pengeluaran as kurang'),
                DB::raw('keterangan as keterangan'),
            ])
            ->leftJoin('laporan_keuangans', 'laporan_keuangans.tanggal', '=', 'riwayattransaksis.tgl_transaksi')
            ->groupBy('tgl_transaksi')
            ->get();

        for ($i = 0; $i < count($request3); $i++) {
            $request3_new[$i] = [
                'tanggal' => $request3[$i]->tanggal2,
                'kurang' => $request3[$i]->kurang,
                'keterangan' => $request3[$i]->keterangan,
            ];
        }

        $tanggal = DB::select('SELECT * FROM riwayattransaksis LEFT JOIN laporan_keuangans ON riwayattransaksis.tgl_transaksi = laporan_keuangans.tanggal GROUP BY riwayattransaksis.tgl_transaksi UNION SELECT * FROM riwayattransaksis RIGHT JOIN laporan_keuangans ON riwayattransaksis.tgl_transaksi = laporan_keuangans.tanggal GROUP BY riwayattransaksis.tgl_transaksi');

        for ($i = 0; $i < count($tanggal); $i++) {
            $tanggal_laporan[$i] = [
                '0' => $tanggal[$i]->tgl_transaksi,
                '1' => $tanggal[$i]->tanggal
            ];
            for ($j = 0; $j < count($tanggal_laporan[$i]); $j++) {
                if ($tanggal_laporan[$i][$j] == NULL) {
                    unset($tanggal_laporan[$i][$j]);
                }
            }
            $tanggal_laporan_new[$i] = array_values($tanggal_laporan[$i]);
        }

        for ($j = 0; $j < count($tanggal_laporan_new); $j++) {
            $laporan_pengeluaran[$j] = [
                'tanggal' => $tanggal_laporan_new[$j][0],
                'jumlah' => $request2[$j]->jumlah,
            ];
        }

        for ($j = 0; $j < count($tanggal_laporan_new); $j++) {
            for ($k = 0; $k < count($request3_new); $k++) {
                if ($laporan_pengeluaran[$j]['tanggal'] == $request3_new[$k]['tanggal']) {
                    $laporan_pengeluaran_new[$j] = array_merge($laporan_pengeluaran[$j], $request3_new[$k]);
                }
            }
        }

        view()->share('data', $laporan_pengeluaran_new);
        $pdf = PDF::loadview('download_kelola_keuangan');
        return $pdf->download('Kelola_Keuangan.pdf');
    }
}
