<?php
use App\Http\Controllers\ScanController;
use App\Http\Controllers\Scan1Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\Peminjam1Controller;

// Redirect ke halaman login jika membuka root domain
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/navbar', function () {
    return view('navigasi.navbar');
});

// Login & Logout
Route::middleware(['web'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// Middleware untuk membatasi akses berdasarkan guard
Route::middleware('auth:guru')->group(function () {
    Route::resource('/barang', BarangController::class);
    Route::resource('peminjams', PeminjamController::class);
    Route::get('/pengembalian', [PeminjamController::class, 'pengembalian'])->name('pengembalian.index');
Route::get('/daftarpengembalian', [PeminjamController::class, 'daftarpengembalian']);
Route::get('/daftarpeminjaman', [PeminjamController::class, 'daftarpeminjaman']);
Route::resource('scan', ScanController::class);
Route::get('/scan/check/{kode}', [ScanController::class, 'check']);
Route::get('/crdpeminjam/showbrng/{barang}', [ScanController::class, 'show']);
Route::resource('peminjam', PeminjamController::class);
Route::post('/crdpeminjam/store', [PeminjamController::class, 'store']);
});

Route::middleware('auth:web')->group(function () {
    Route::get('/barangsiswa', [BarangController::class, 'indexs']);
    Route::resource('peminjamsiswa', Peminjam1Controller::class);
    Route::resource('scans', Scan1Controller::class);
    Route::get('/scans/check/{kode}', [Scan1Controller::class, 'check']);
    Route::get('/crdpeminjams/showbrng/{barang}', [Scan1Controller::class, 'show']); 
    Route::post('/crdpeminjams/store', [Peminjam1Controller::class, 'store']);
    Route::get('/pengembalians', [Peminjam1Controller::class, 'pengembalian']);

});




