<?php

use App\Http\Livewire\AnggotaAsrama;
use App\Http\Livewire\AnggotaKelas;
use App\Http\Livewire\Asramas;
use App\Http\Livewire\DetailAsrama;
use App\Http\Livewire\DetailKelas;
use App\Http\Livewire\DetailMurids;
use App\Http\Livewire\GuruTendiks;
use App\Http\Livewire\Kelases;
use App\Http\Livewire\Murids;
use App\Http\Livewire\Periodes;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Posts;
use App\Http\Livewire\UangAsramas;

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
    Route::get('/', function () {
        return view('dashboard');
    });
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
});
