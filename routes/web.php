    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Livewire\Home;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\AdminCategoryController;
    use App\Http\Controllers\RegisterController;
    use App\Http\Controllers\DataKasirController;
    use App\Http\Controllers\TransaksiKiloanController;
    use App\Http\Controllers\TransaksiSatuanController;
    use App\Http\Controllers\AfterTransaksiKiloanController;
    use App\Http\Controllers\AfterTransaksiSatuanController;
    use App\Http\Controllers\EmailController;
    use App\Http\Controllers\InputPengeluaranController;
    use App\Http\Controllers\NotaKiloanController;
    use App\Http\Controllers\NotaSatuanController;
    use App\Http\Controllers\LayananKiloanController;
    use App\Http\Controllers\LayananSatuanController;
    use App\Http\Controllers\LayananController;
    use App\Http\Controllers\RiwayatTransaksiController;
    use App\Http\Controllers\LaporanKeuanganController;
    use App\Http\Controllers\ValidatePengeluaranController;
    use App\Http\Controllers\HomeController;

    /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    // Route::get('/', Home::class)->name('/');
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/cari', [HomeController::class, 'cari']);

    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::resource('/dashboard', AdminCategoryController::class)->middleware('admin');
    Route::resource('/pesanan', AdminCategoryController::class);
    Route::resource('/layanan', AdminCategoryController::class)->middleware('admin');

    Route::get('/tambah', [LayananKiloanController::class, 'index'])->middleware('admin');
    Route::post('/tambah', [LayananKiloanController::class, 'store'])->middleware('admin');

    Route::get('/tambah1', [LayananSatuanController::class, 'index'])->middleware('admin');
    Route::post('/tambah1', [LayananSatuanController::class, 'store'])->middleware('admin');

    Route::get('/register', [RegisterController::class, 'index'])->middleware('admin');
    Route::post('/register', [RegisterController::class, 'store'])->middleware('admin');

    Route::resource('/layanan', LayananController::class)->middleware('admin');
    Route::get('dellayanan/{jenis}', [LayananController::class, 'destroy'])->middleware('admin');
    Route::get('dellayanan1/{item}', [LayananController::class, 'destroyed'])->middleware('admin');

    Route::resource('/data_kasir', DataKasirController::class)->middleware('admin');
    Route::get('delete/{id}', [DataKasirController::class, 'destroy'])->middleware('admin');
    Route::get('put/{id}', [DataKasirController::class, 'edit'])->middleware('admin');
    Route::put('update/{id}', [DataKasirController::class, 'update'])->middleware('admin');

    Route::resource('/laporan_keuangan', LaporanKeuanganController::class)->middleware('admin');
    Route::get('/laporan', [LaporanKeuanganController::class, 'tabel'])->middleware('admin');
    Route::resource('/input_pengeluaran', InputPengeluaranController::class)->middleware('auth');
    Route::post('/pengeluaran', [ValidatePengeluaranController::class, 'store'])->middleware('auth');
    // Route::get('/input_pengeluaran', [InputPengeluaranController::class, 'store'])->middleware('auth');

    Route::get('/pesanan', function () {
        return view('pesanan', [
            "title" => "Pesanan"
        ]);
    })->middleware('auth');

    Route::resource('/transaksi_kiloan', TransaksiKiloanController::class)->middleware('auth');
    Route::get('/transaksi_kiloan', [TransaksiKiloanController::class, 'index'])->middleware('auth');
    Route::post('/getLayanan', [TransaksiKiloanController::class, 'getLayanan'])->middleware('auth');
    Route::post('/getLayanan_id', [TransaksiKiloanController::class, 'getLayanan_id'])->middleware('auth');
    Route::post('/getHarga', [TransaksiKiloanController::class, 'getHarga'])->middleware('auth');

    Route::get('/after_transaksi_kiloan', [AfterTransaksiKiloanController::class, 'index'])->middleware('auth');
    Route::post('/after_transaksi_kiloan', [AfterTransaksiKiloanController::class, 'store'])->middleware('auth');

    Route::resource('/transaksi_satuan', TransaksiSatuanController::class)->middleware('auth');
    Route::get('/transaksi_satuan', [TransaksiSatuanController::class, 'index'])->middleware('auth');
    Route::post('/getSize', [TransaksiSatuanController::class, 'getSize'])->middleware('auth');
    Route::post('/getSize_id', [TransaksiSatuanController::class, 'getSize_id'])->middleware('auth');
    Route::post('/getItemHarga', [TransaksiSatuanController::class, 'getItemHarga'])->middleware('auth');
    Route::post('/getJumlah', [TransaksiSatuanController::class, 'getJumlah'])->middleware('auth');
    Route::post('/getTotal', [TransaksiSatuanController::class, 'getTotal'])->name('getTotal')->middleware('auth');

    Route::get('/after_transaksi_satuan', [AfterTransaksiSatuanController::class, 'index'])->middleware('auth');
    Route::post('/after_transaksi_satuan', [AfterTransaksiSatuanController::class, 'store'])->middleware('auth');

    Route::get('/nota_kiloan_{no_invoice}', [NotaKiloanController::class, 'index'])->middleware('auth');
    Route::get('/nota_satuan_{no_invoice}', [NotaSatuanController::class, 'index'])->middleware('auth');

    //export PDF
    Route::get('/exportpdf_{no_invoice}', [NotaKiloanController::class, 'exportpdf'])->middleware('auth');
    Route::get('/exportpdf1_{no_invoice}', [NotaSatuanController::class, 'exportpdf'])->middleware('auth');

    //send Email
    Route::get('/sendemail_kiloan_{no_invoice}', [EmailController::class, 'index'])->middleware('auth');
    Route::get('/sendemail_satuan_{no_invoice}', [EmailController::class, 'index2'])->middleware('auth');

    Route::resource('/riwayat_transaksi', RiwayatTransaksiController::class)->middleware('auth');
    Route::get('detail_transaksi_{no_invoice}', [RiwayatTransaksiController::class, 'show'])->middleware('auth');
    Route::get('deltransaksi/{no_invoice}', [RiwayatTransaksiController::class, 'destroy'])->middleware('auth');
    Route::get('put_transaksi_{no_invoice}', [RiwayatTransaksiController::class, 'edit'])->middleware('auth');
    Route::post('edit_transaksi_{no_invoice}', [RiwayatTransaksiController::class, 'update'])->middleware('auth');
    Route::post('edit_transaksis_{no_invoice}', [RiwayatTransaksiController::class, 'updated'])->middleware('auth');

    // Route::get('/laporan_keuangan', function () {
    //     return view('laporan_keuangan', [
    //         "title" => "Laporan Keuangan"
    //     ]);
    // })->middleware('admin');

    // Route::get('/input_pengeluaran', function () {
    //     return view('input_pengeluaran', [
    //         "title" => "Input Pengeluaran"
    //     ]);
    // })->middleware('auth');

    Route::get('/pengaturan', function () {
        return view('pengaturan', [
            "title" => "Pengaturan"
        ]);
    })->middleware('auth');
