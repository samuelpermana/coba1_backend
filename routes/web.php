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

use App\Http\Controllers\Agenda\AgendaKerjaController;
use App\Http\Controllers\AgendaWeb\AgendaWebController;

use App\Models\AktivitasSenat;
use App\Models\JDIH;


// ======================== Auth ==================================
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// ======================== Auth ==================================

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

Route::get('/tentang-komisi-i', [AgendaWebController::class, 'komisi1'])->name('tentang.komisi1');

Route::get('/tentang-komisi-ii', function () {
    return view('komisi2');
});

Route::get('/tentang-komisi-iii', function () {
    return view('komisi3');
});

Route::get('/tentang-komisi-iv', function () {
    return view('komisi4');
});

Route::get('/tentang-badan-anggaran', function () {
    return view('badananggaran');
});

Route::get('/tentang-badan-kehormatan', function () {
    return view('badankehormatan');
});

Route::get('/tentang-badan-legislasi', function () {
    return view('badanlegislasi');
});

Route::get('/tentang-bksap', function () {
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

// ========================---------- KOMISI ----------==================================
// ======================== KOMISI I==================================
Route::group([
    'prefix' => 'komisi-i',
    'as' => 'komisi-i.',
    'middleware' => ['auth']
], function () {
    Route::get('/',[AgendaKerjaController::class, 'index'] );
    Route::get('/agendakerja',[AgendaKerjaController::class, 'index'] )->name('agenda.index');

    Route::get('/agendakerja/create', [AgendaKerjaController::class, 'showCreate'])->name('agenda.create');
    
    Route::post('/agendakerja', [AgendaKerjaController::class, 'store'])->name('agenda.store');
    
    Route::get('/agendakerja/{id}/edit', [AgendaKerjaController::class, 'showEdit'])->name('agenda.edit');
    
    Route::put('/agendakerja/{id}', [AgendaKerjaController::class, 'update'])->name('agenda.update');
    
    Route::delete('/agendakerja/{id}', [AgendaKerjaController::class, 'destroy'])->name('agenda.destroy');
    Route::get('/transparansisurat', [TransparansiController::class, 'index']);
});
// ======================== END KOMISi I==================================
// ======================== KOMISI II==================================
Route::group([
    'prefix' => 'komisi-ii',
    'as' => 'komisi-ii.',
    'middleware' => ['auth']
], function () {
    Route::get('/',[AgendaKerjaController::class, 'index'] );
    Route::get('/agendakerja',[AgendaKerjaController::class, 'index'] )->name('agenda.index');

    Route::get('/agendakerja/create', [AgendaKerjaController::class, 'showCreate'])->name('agenda.create');
    
    Route::post('/agendakerja', [AgendaKerjaController::class, 'store'])->name('agenda.store');
    
    Route::get('/agendakerja/{id}/edit', [AgendaKerjaController::class, 'showEdit'])->name('agenda.edit');
    
    Route::put('/agendakerja/{id}', [AgendaKerjaController::class, 'update'])->name('agenda.update');
    
    Route::delete('/agendakerja/{id}', [AgendaKerjaController::class, 'destroy'])->name('agenda.destroy');
    
    Route::get('/transparansisurat', [TransparansiController::class, 'index']);
});
// ======================== END KOMISi II==================================
// ======================== KOMISI III==================================
Route::group([
    'prefix' => 'komisi-iii',
    'as' => 'komisi-iii.',
    'middleware' => ['auth']
], function () {
    Route::get('/',[AgendaKerjaController::class, 'index'] );
    Route::get('/agendakerja',[AgendaKerjaController::class, 'index'] )->name('agenda.index');

    Route::get('/agendakerja/create', [AgendaKerjaController::class, 'showCreate'])->name('agenda.create');
    
    Route::post('/agendakerja', [AgendaKerjaController::class, 'store'])->name('agenda.store');
    
    Route::get('/agendakerja/{id}/edit', [AgendaKerjaController::class, 'showEdit'])->name('agenda.edit');
    
    Route::put('/agendakerja/{id}', [AgendaKerjaController::class, 'update'])->name('agenda.update');
    
    Route::delete('/agendakerja/{id}', [AgendaKerjaController::class, 'destroy'])->name('agenda.destroy');
    
    Route::get('/transparansisurat', [TransparansiController::class, 'index']);
});
// ======================== END KOMISi III==================================
// ======================== KOMISI IV==================================
Route::group([
    'prefix' => 'komisi-iv',
    'as' => 'komisi-iv.',
    'middleware' => ['auth']
], function () {
    Route::get('/',[AgendaKerjaController::class, 'index'] );
    Route::get('/agendakerja',[AgendaKerjaController::class, 'index'] )->name('agenda.index');

    Route::get('/agendakerja/create', [AgendaKerjaController::class, 'showCreate'])->name('agenda.create');
    
    Route::post('/agendakerja', [AgendaKerjaController::class, 'store'])->name('agenda.store');
    
    Route::get('/agendakerja/{id}/edit', [AgendaKerjaController::class, 'showEdit'])->name('agenda.edit');
    
    Route::put('/agendakerja/{id}', [AgendaKerjaController::class, 'update'])->name('agenda.update');
    
    Route::delete('/agendakerja/{id}', [AgendaKerjaController::class, 'destroy'])->name('agenda.destroy');
    
    Route::get('/transparansisurat', [TransparansiController::class, 'index']);
});
// ======================== END KOMISi IV==================================
// ======================== BADAN ANGGARAN ==================================
Route::group([
    'prefix' => 'badan-anggaran',
    'as' => 'badan-anggaran.',
    'middleware' => ['auth']
], function () {
    Route::get('/',[AgendaKerjaController::class, 'index'] );
    Route::get('/agendakerja',[AgendaKerjaController::class, 'index'] )->name('agenda.index');

    Route::get('/agendakerja/create', [AgendaKerjaController::class, 'showCreate'])->name('agenda.create');
    
    Route::post('/agendakerja', [AgendaKerjaController::class, 'store'])->name('agenda.store');
    
    Route::get('/agendakerja/{id}/edit', [AgendaKerjaController::class, 'showEdit'])->name('agenda.edit');
    
    Route::put('/agendakerja/{id}', [AgendaKerjaController::class, 'update'])->name('agenda.update');
    
    Route::delete('/agendakerja/{id}', [AgendaKerjaController::class, 'destroy'])->name('agenda.destroy');
    
    Route::get('/transparansisurat', [TransparansiController::class, 'index']);
});
// ======================== END BADAN ANGGARAN ==================================
// ========================---------- KOMISI ----------==================================


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


// ======================== PIMPINAN TINGGI ==================================
Route::group([
    'prefix' => 'pimpinan-tinggi',
    'as' => 'pimpinan-tinggi'
], function () {
    // Route
});
// ======================== END PIMPINAN TINGGI ==================================
