<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPermohonanController;
use App\Http\Controllers\DashboardDataPermohonanController;
use App\Http\Controllers\DashboardManageUserController;
use App\Http\Controllers\PermohonanController;

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
    return view('landing');
});

Route::get('/permohonan', function () {
    return view('permohonan');
})->name('permohonan.form');

Route::prefix('dashboard')->group(function () {
    // login
    Route::get('/login', [DashboardController::class, 'login'])->name('login');

    // auth
    Route::post('/auth', [DashboardController::class, 'authenticate'])->name('auth');

    Route::get(
        '/',
        [DashboardController::class, 'index']
    )->name('dashboard');

    Route::get(
        '/permohonan',
        [DashboardPermohonanController::class, 'index']
    )->name('permohonan');

    Route::get(
        '/permohonan/data/{id}',
        [DashboardDataPermohonanController::class, 'show']
    )->name('permohonan.show');

    // tertunda route
    Route::get(
        '/permohonan/tertunda',
        [DashboardDataPermohonanController::class, 'indexTertunda']
    )->name('permohonan-tertunda');

    // diterima route
    Route::get(
        '/permohonan/diterima',
        [DashboardDataPermohonanController::class, 'indexDiterima']
    )->name('permohonan-diterima');

    // ditolak route
    Route::get(
        '/permohonan/ditolak',
        [DashboardDataPermohonanController::class, 'indexDitolak']
    )->name('permohonan-ditolak');

    // aksi ditolak with secure url
    Route::get(
        '/permohonan/data/{id}/tolak',
        [DashboardPermohonanController::class, 'ditolak']
    )->name('permohonan.tolak')->middleware('signed');

    // aksi diterima with secure url
    Route::get(
        '/permohonan/data/{id}/terima',
        [DashboardPermohonanController::class, 'diterima']
    )->name('permohonan.terima')->middleware('signed');

    // resouces route user
    Route::resource('user', DashboardManageUserController::class)->only([
        'index', 'create', 'store', 'destroy', 'show'
    ]);


    // store permohonan
    Route::post(
        '/permohonan/store',
        [PermohonanController::class, 'store']
    )->name('permohonan.store');
});
