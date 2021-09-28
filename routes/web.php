<?php

use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\RatingController;
use App\Models\Teknisi;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengajuan;
use Telegram\Bot\Api;
use App\Http\Controllers\TeknisiController;

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

Route::get('/', function () {
    return view('add.index');
});

Route::middleware(['auth:sanctum', 'verified'])->get(
    '/dashboard',
    function (Request $request) {
        $key = $request->input('search');
        $Pengajuans = Pengajuan::where('id_pelanggan', 'like', "%" . $key . "%")->paginate(15);
        return view('dashboard', compact('Pengajuans'));
    }
)->name('dashboard');

//pengajuan
Route::get('add', [PengajuanController::class, 'index']);
Route::post('add', [PengajuanController::class, 'add']);
Route::get('/edit/{id}', [PengajuanController::class, 'edit']);
Route::get('kirim/{id}', [PengajuanController::class, 'kirim']);

Route::post('update', [PengajuanController::class, 'update'])->name('update');
Route::post('kirimt', [PengajuanController::class, 'kirimt'])->name('kirimt');
Route::get('/delete/{id}', [PengajuanController::class, 'delete']);
Route::get('proses', function () {
    return view('add/proses');
});
Route::get('print', [PengajuanController::class, 'print']);
Route::get('printpdf', [PengajuanController::class, 'printpdf'])->name('printpdf');
Route::get('print-excel', [PengajuanController::class, 'export'])->name('export');


// teknisi
Route::get('/teknisi/all', [TeknisiController::class, 'allTeknisi'])->name('all.teknisi');
Route::post('/teknisi/add', [TeknisiController::class, 'addTeknisi'])->name('add.teknisi');
Route::get('teknisi/edit/{id}', [TeknisiController::class, 'editTeknisi']);
Route::post('/teknisi/update/{id}', [TeknisiController::class, 'updateTeknisi']);
// Route::get('/edit/{$id}', [TeknisiController::class, 'editTeknisi']);
Route::get('teknisi/delete/{id}', [TeknisiController::class, 'delete']);

//rating
Route::get('/rating/al', [RatingController::class, 'read'])->name('rating');
Route::get('/rating/all', [RatingController::class, 'allRating'])->name('all.rating');
Route::post('/rating/add', [RatingController::class, 'create'])->name('add.rating');
