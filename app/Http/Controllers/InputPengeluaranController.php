<?php

namespace App\Http\Controllers;

use App\Models\LaporanKeuangan;
use DB;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class InputPengeluaranController extends Controller
{
    public function index()
    {
        return view('input_pengeluaran', [
            "title" => "Input Pengeluaran"
        ]);
    }
}
