<?php

namespace App\Http\Controllers;

use App\Models\LayananKiloan;
use App\Models\LayananSatuan;
use App\Models\Users;
use DB;

class LayananController extends Controller
{
    public function index()
    {
        $results = DB::table('data__layanan__kiloans')->groupBy('jenis')->get();
        $result = DB::table('data__layanan__satuans')->groupBy('item')->get();

        return view('layanan', compact('results', 'result'), [
            "title" => "Layanan",
            'users' => Users::where('is_admin', '0')->get()
        ]);
    }

    public function destroy($jenis)
    {
        LayananKiloan::where('jenis', $jenis)->delete();

        return redirect('layanan')->with('success', 'Data berhasil dihapus!');
    }

    public function destroyed($item)
    {
        LayananSatuan::where('item', $item)->delete();

        return redirect('layanan')->with('success', 'Data berhasil dihapus!');
    }
}
