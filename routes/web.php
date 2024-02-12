<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AspirasiAdminCtrl;
use App\Http\Controllers\Admin\JDIHAdminCtrl;
use App\Http\Controllers\Admin\EventAdminController;
use App\Http\Controllers\Admin\RoomAdminController;
use App\Http\Controllers\Admin\RoomScheduleAdminController;
use App\Http\Controllers\Admin\AktivitasSenatAdminCtrl;
use App\Http\Controllers\AktivitasSenatController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\JDIHController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\Ormawa\AjukanDokumenController;
use App\Http\Controllers\Ormawa\TransparansiController;
use App\Http\Controllers\Komisi\TransparansiKomController;
use App\Http\Controllers\Komisi\AgendaKerjaController;
use App\Http\Controllers\Badan\AgendaKerjaBadanController;

use App\Models\AktivitasSenat;
use App\Models\JDIH;



Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ======================== WEBSITE ==================================
Route::get('/', function () {
    return view('index');
});

Route::get('/layout', function () {
    return view('layouts.layout');
});

Route::get('/{id}/file', [AktivitasSenatController::class, 'show'])->name('aktivitas-senat.file');
Route::get('/', [AktivitasSenatController::class, 'index']);

// Route::get('/index', function () {return view('index');});

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

Route::get('/aaa', function () {
    return view('detailJDIH');
});


Route::get('/cobakalender', function () {
    return view('cobakalender');
});

Route::get('/aspirasi', [AspirasiController::class, 'getAspirasi']);

Route::get('/jdih  ', [JDIHController::class, 'getJDIH']);
Route::get('/jdih/jenis/{id}', [JDIHController::class, 'jenis'])->name('jdih.jenis');

Route::get('jdih/show/{id}', [JDIHController::class, 'showJDIH'])->name('jdih.show');

// ======================== END WEBSITE ==================================

// ======================== CMS ==================================
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth']
], function () {
    Route::get('/bankaspirasi', [AspirasiAdminCtrl::class, 'index'])->name('index');
    Route::put('/bankaspirasi/{id}', [AspirasiAdminCtrl::class, 'update'])->name('update');
    Route::delete('/bankaspirasi/{id}', [AspirasiAdminCtrl::class, 'delete'])->name('delete');

    Route::get('jdih', [JDIHAdminCtrl::class, 'index'])->name('jdih.index');
    Route::get('jdih/create', [JDIHAdminCtrl::class, 'create'])->name('jdih.create');
    Route::post('jdih/store', [JDIHAdminCtrl::class, 'store'])->name('jdih.store');
    Route::get('jdih/edit/{id}', [JDIHAdminCtrl::class, 'edit'])->name('jdih.edit');
    Route::put('jdih/update/{id}', [JDIHAdminCtrl::class, 'update'])->name('jdih.update');
    Route::get('jdih/delete/{id}', [JDIHAdminCtrl::class, 'delete'])->name('jdih.delete');

    Route::resource('rooms', RoomAdminController::class);
    Route::resource('room-schedules', RoomScheduleAdminController::class);

    Route::get('/aktivitas', [AktivitasSenatAdminCtrl::class, 'index'])->name('aktivitasSenat.index');

    // Create
    Route::get('/aktivitas/create', [AktivitasSenatAdminCtrl::class, 'create'])->name('aktivitasSenat.create');
    Route::post('/aktivitas', [AktivitasSenatAdminCtrl::class, 'store'])->name('aktivitasSenat.store');

    // Show
    Route::get('/aktivitas/{id}', [AktivitasSenatAdminCtrl::class, 'show'])->name('aktivitasSenat.show');

    // Edit
    Route::get('/aktivitas/{id}/edit', [AktivitasSenatAdminCtrl::class, 'edit'])->name('aktivitasSenat.edit');
    Route::put('/aktivitas/{id}', [AktivitasSenatAdminCtrl::class, 'update'])->name('aktivitasSenat.update');

    // Delete
    Route::delete('/aktivitas/{id}', [AktivitasSenatAdminCtrl::class, 'destroy'])->name('aktivitasSenat.destroy');


    Route::get('events/list', [EventAdminController::class, 'listEvent'])->name('events.list');
    Route::resource('events', EventAdminController::class);

    Route::get('', function () {
        return view('cms.dashboard');
    })->name('dashboard');
});

// ======================== END CMS ==================================

// ======================== KOMISI==================================
Route::group([
    'prefix' => 'komisi',
    'as' => 'komisi',
    'middleware' => ['auth']
], function () {
    Route::get('/',[AgendaKerjaController::class, 'index'] );
    Route::get('/agendakerja',[AgendaKerjaController::class, 'index'] );
    
    Route::get('/transparansisurat', [TransparansiKomController::class, 'index']);
});
// ======================== END KOMIS ==================================

// ========================  ORMAWA ==================================
Route::group([
    'prefix' => 'ormawa',
    'as' => 'ormawa',
    'middleware' => ['auth']
], function () {
    Route::get('/',[AjukanDokumenController::class, 'index'] );
    Route::get('/ajukansurat',[AjukanDokumenController::class, 'index'] );
    
    Route::get('/transparansisurat', [TransparansiController::class, 'index']);
});
// ======================== END ORMAWA ==================================


// ======================== BADAN ANGGARAN ==================================
Route::group([
    'prefix' => 'badan',
    'as' => 'badan'
], function () {
    Route::get('/',[AgendaKerjaBadanController::class, 'index'] );
    Route::get('/agendakerja',[AgendaKerjaBadanController::class, 'index'] );
});
// ======================== END BADAN ANGGARAN ==================================

// ======================== PIMPINAN TINGGI ==================================
Route::group([
    'prefix' => 'pimpinan-tinggi',
    'as' => 'pimpinan-tinggi'
], function () {
    // Route
});
// ======================== END PIMPINAN TINGGI ==================================
