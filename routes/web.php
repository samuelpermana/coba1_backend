<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\Admin\AspirasiAdminCtrl;
use App\Http\Controllers\Admin\JDIHAdminCtrl;
use App\Http\Controllers\Admin\RoomAdminController;
use App\Http\Controllers\JDIHController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\Admin\RoomScheduleAdminController;
use App\Models\JDIH;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/kotakaspirasi', function () {
    return view('kotakaspirasi');
});

Route::post('/aspirasi', [AspirasiController::class, 'createAspirasi'])->name('aspirasi.store');



Route::get('/peminjamanruangan', [RuanganController::class, 'index']);

Route::get('/selayangpandang', function () {
    return view('selayangpandang');
});

Route::get('/bankaspirasi', [AspirasiController::class, 'getAspirasi']);

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/komisi1', function () {
    return view('komisi1');
});

Route::get('/komisi2', function () {
    return view('komisi2');
});

Route::get('/komisi3', function () {
    return view('komisi3');
});

Route::get('/komisi4', function () {
    return view('komisi4');
});

Route::get('/badananggaran', function () {
    return view('badananggaran');
});

Route::get('/badankehormatan', function () {
    return view('badankehormatan');
});

Route::get('/badanlegislasi', function () {
    return view('badanlegislasi');
});

Route::get('/bksap', function () {
    return view('bksap');
});

Route::get('/transparansisurat3', function () {
    return view('transparansisurat3');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/ajukansurat', function () {
    return view('ajukansurat');
});
Route::get('/aaa', function () {
    return view('detailJDIH');
});


Route::get('/cobakalender', function () {
    return view('cobakalender');
});

Route::get('/aspirasi',[AspirasiController::class, 'getAspirasi']);

Route::group([
    'prefix' => 'admin',
     'as' => 'admin.'
    ], function () {
    Route::get('/bankaspirasi', [AspirasiAdminCtrl::class, 'index'])->name('index');
    Route::put('/bankaspirasi/{id}', [AspirasiAdminCtrl::class, 'update'])->name('update');
    Route::delete('/bankaspirasi/{id}', [AspirasiAdminCtrl::class, 'delete'])->name('delete');
    
    Route::get('jdih', [JDIHAdminCtrl::class, 'index'])->name('jdih.index');
    Route::get('jdih/create', [JDIHAdminCtrl::class, 'create'])->name('jdih.create');
    Route::post('jdih/store', [JDIHAdminCtrl::class, 'store'])->name('jdih.store');
    Route::get('jdih/update/{id}', [JDIHAdminCtrl::class, 'edit'])->name('jdih.edit');
    Route::post('jdih/update/{id}', [JDIHAdminCtrl::class, 'update'])->name('jdih.update');
    Route::get('jdih/delete/{id}', [JDIHAdminCtrl::class, 'delete'])->name('jdih.delete');

    Route::resource('rooms', RoomAdminController::class);
    Route::resource('room-schedules', RoomScheduleAdminController::class);
});


Route::group([
    'prefix' => 'komisi1',
     'as' => 'komisi1'
    ], function () {
    // Route
});
Route::group([
    'prefix' => 'komisi2',
     'as' => 'komisi2'
    ], function () {
    // Route
});
Route::group([
    'prefix' => 'komisi3',
     'as' => 'komisi3'
    ], function () { 
        // Route
});
Route::group([
    'prefix' => 'komisi4',
     'as' => 'komisi4'
    ], function () { 
        // Route
});
Route::group([
    'prefix' => 'ormawa',
     'as' => 'ormawa'
    ], function () { 
        // Route
});

Route::group([
    'prefix' => 'badan_anggaran',
     'as' => 'badan_anggaran'
    ], function () {
    // Route
});

Route::get('/jdih  ', [JDIHController::class, 'getJDIH']);

Route::get('jdih/show/{id}', [JDIHController::class, 'showJDIH'])->name('jdih.show');

