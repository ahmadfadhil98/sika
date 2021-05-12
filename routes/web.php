<?php

use App\Http\Controllers\Pengeluaran;
use App\Http\Controllers\Report;
use App\Http\Livewire\AnggotaAsrama;
use App\Http\Livewire\AnggotaKelas;
use App\Http\Livewire\Asramas;
use App\Http\Livewire\DetailAsrama;
use App\Http\Livewire\DetailKelas;
use App\Http\Livewire\DetailMurids;
use App\Http\Livewire\GuruTendiks;
use App\Http\Livewire\Kelases;
use App\Http\Livewire\Murids;
use App\Http\Livewire\Pengeluarans;
use App\Http\Livewire\Barangs;
use App\Http\Livewire\CreatePengeluarans;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Neraca;
use App\Http\Livewire\Periodes;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Posts;
use App\Http\Livewire\ReportKeluar;
use App\Http\Livewire\ReportMasuk;
use App\Http\Livewire\Tagihan;
use App\Http\Livewire\UangAsramas;
use App\Http\Livewire\UasPeriodes;

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

// Route::get('/', function () {
//     return view('login');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', Dashboard::class)->name('dashboard');
    // Route::get('/', function () {
    //     return view('dashboard');
    // });
    Route::get('/murids', Murids::class)->name('murids');
    Route::get('/posts', Posts::class)->name('posts');
    Route::get('/kelas', Kelases ::class)->name('kelas');
    Route::get('/asramas', Asramas ::class)->name('asramas');
    Route::get('/periodes', Periodes ::class)->name('periodes');
    Route::get('/gurutendiks', GuruTendiks ::class)->name('gurutendiks');
    Route::get('/dkelas', DetailKelas ::class)->name('dkelas');
    Route::get('/dasrama', DetailAsrama ::class)->name('dasrama');
    Route::get('/anggota_kelas/{id}/{di}', AnggotaKelas ::class)->name('akelas');
    Route::get('/anggota_asrama/{id}/{di}', AnggotaAsrama ::class)->name('aasrama');
    Route::get('/uas', UangAsramas::class)->name('uas');
    Route::get('/dmurid/{id}/{di}',DetailMurids::class)->name('dmurid');
    Route::get('/barang', Barangs::class)->name('barangs');
    Route::get('/pengeluarans', Pengeluarans::class)->name('pengeluarans');
    Route::get('/tambah_pengeluaran',CreatePengeluarans::class)->name('create_spend');
    Route::resource('/pengeluaran', Pengeluaran::class);
    // Route::put('pengeluaran', [Pengeluaran::class,'store']);
    Route::get('report_masuk',ReportMasuk::class)->name('report_masuk');
    Route::get('report_keluar',ReportKeluar::class)->name('report_keluar');
    Route::get('neraca',Neraca::class)->name('neraca');
    Route::get('tagihan',Tagihan::class)->name('tagihan');
    Route::get('uasperiode',UasPeriodes::class)->name('uasperiode');
    Route::get('/report/{period}/{month}/{jenis}',[Report::class,'report'])->name('report');
    // Route::get('/report/{period}/{month}/{jenis}',[Report::class,'view'])->name('report');

});
