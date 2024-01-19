<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AspirasiController;

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

Route::get('/index.html', function () {
    return view('index');
});

Route::get('/kotakaspirasi.html', function () {
    return view('kotakaspirasi');
});

Route::post('/aspirasi', [AspirasiController::class, 'createAspirasi'])->name('aspirasi.store');

Route::get('/selayangpandang.html', function () {
    return view('selayangpandang');
});

Route::get('/bankaspirasi.html', [AspirasiController::class, 'getAspirasi']);

Route::get('/faq.html', function () {
    return view('faq');
});

Route::get('/komisi1.html', function () {
    return view('komisi1');
});

Route::get('/komisi2.html', function () {
    return view('komisi2');
});

Route::get('/komisi3.html', function () {
    return view('komisi3');
});

Route::get('/komisi4.html', function () {
    return view('komisi4');
});

Route::get('/badananggaran.html', function () {
    return view('badananggaran');
});

Route::get('/badankehormatan.html', function () {
    return view('badankehormatan');
});

Route::get('/badanlegislasi.html', function () {
    return view('badanlegislasi');
});

Route::get('/bksap.html', function () {
    return view('bksap');
});

Route::get('/bankaspirasicms.html', function () {
    return view('bankaspirasi-cms');
});


Route::get('/aspirasi',[AspirasiController::class, 'getAspirasi']);