<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgetPasswordCtrl;
use App\Http\Controllers\Admin\AspirasiAdminCtrl;
use App\Http\Controllers\Admin\JDIHAdminCtrl;
use App\Http\Controllers\Admin\EventAdminController;
use App\Http\Controllers\Admin\RoomAdminController;
use App\Http\Controllers\Admin\RoomScheduleAdminController;
use App\Http\Controllers\Admin\AktivitasSenatAdminCtrl;
use App\Http\Controllers\Admin\ProposalController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\AktivitasSenatController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\JDIHController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\Ormawa\AjukanDokumenController;
use App\Mail\TestMail;
use App\Http\Controllers\Agenda\AgendaKerjaController;
use App\Http\Controllers\Agenda\AgendaBadanController;
use App\Http\Controllers\AgendaWeb\AgendaWebController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PersetujuanProposal\KomisiController;
use App\Http\Controllers\PersetujuanProposal\BadanAnggaranController;
use App\Http\Controllers\PersetujuanProposal\SekjenController;

use App\Models\AktivitasSenat;
use App\Models\JDIH;
use Illuminate\Support\Facades\Mail;

// ======================== Auth ==================================
Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login-user', [AuthController::class, 'login'])->middleware('guest')->name('login-users');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [ForgetPasswordCtrl::class, 'forgetPassword'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [ForgetPasswordCtrl::class, 'forgetPasswordPost'])->middleware('guest')->name('passwordPost.request');
Route::get('/reset-password/{token}', [ForgetPasswordCtrl::class, 'resetPassword'])->middleware('guest')->name('passwordReset.request');
Route::post('/reset-password/{token}', [ForgetPasswordCtrl::class, 'resetPasswordPost'])->middleware('guest')->name('passwordResetPost.request');

// ======================== END Auth ==================================

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

Route::get('/faq', [FaqController::class, 'indexWeb']);

Route::get('/tentang-komisi-i', [AgendaWebController::class, 'komisi1'])->name('tentang.komisi1');
Route::get('/tentang-komisi-ii', [AgendaWebController::class, 'komisi2'])->name('tentang.komisi2');
Route::get('/tentang-komisi-iii', [AgendaWebController::class, 'komisi3'])->name('tentang.komisi3');
Route::get('/tentang-komisi-iv', [AgendaWebController::class, 'komisi4'])->name('tentang.komisi4');
Route::get('/tentang-badan-anggaran', [AgendaWebController::class, 'badanAnggaran'])->name('tentang.badanAnggaran');
Route::get('/tentang-badan-kehormatan', [AgendaWebController::class, 'badanKehormatan'])->name('tentang.badanKehormatan');
Route::get('/tentang-badan-legislasi', [AgendaWebController::class, 'badanLegislasi'])->name('tentang.badanLegislasi');
Route::get('/tentang-bksap', [AgendaWebController::class, 'Bksap'])->name('tentang.bksap');
Route::get('/tentang-burt', [AgendaWebController::class, 'burt'])->name('tentang.burt');



Route::get('/cobakalender', function () {
    return view('cobakalender');
});

Route::get('/aspirasi', [AspirasiController::class, 'getAspirasi']);

Route::get('/jdih/jenis/{id}', [JDIHController::class, 'jenis'])->name('jdih.jenis');

Route::get('jdih/show/{id}', [JDIHController::class, 'showJDIH'])->name('jdih.show');
Route::get('events/list', [EventAdminController::class, 'listEvent'])->name('legislasi.list');

// ======================== END WEBSITE ==================================

// ======================== CMS ==================================
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'role.auth:admin']
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
    Route::delete('jdih/delete-file/{id}', 'JDIHController@deleteFile')->name('jdih.delete_file');

    Route::resource('rooms', RoomAdminController::class);
    Route::resource('room-schedules', RoomScheduleAdminController::class);

    Route::get('/aktivitas', [AktivitasSenatAdminCtrl::class, 'index'])->name('aktivitasSenat.index');
    Route::get('/aktivitas/create', [AktivitasSenatAdminCtrl::class, 'create'])->name('aktivitasSenat.create');
    Route::post('/aktivitas', [AktivitasSenatAdminCtrl::class, 'store'])->name('aktivitasSenat.store');
    Route::get('/aktivitas/{id}', [AktivitasSenatAdminCtrl::class, 'show'])->name('aktivitasSenat.show');
    Route::get('/aktivitas/{id}/edit', [AktivitasSenatAdminCtrl::class, 'edit'])->name('aktivitasSenat.edit');
    Route::put('/aktivitas/{id}', [AktivitasSenatAdminCtrl::class, 'update'])->name('aktivitasSenat.update');
    Route::delete('/aktivitas/{id}', [AktivitasSenatAdminCtrl::class, 'destroy'])->name('aktivitasSenat.destroy');

    Route::get('events/list', [EventAdminController::class, 'listEvent'])->name('legislasi.list');
    Route::resource('events', EventAdminController::class);

    Route::get('/persetujuan-proposal', [ProposalController::class, 'index']);
    Route::put('/update-komisi/{proposalId}', [ProposalController::class, 'updateKomisiCheckedBy'])->name('proposal.update-komisi');
    Route::put('/proposal/{proposal}/admin-reject', [ProposalController::class, 'adminReject'])->name('proposal.admin-reject');

    Route::get('', function () {
        return view('cms.dashboard');
    })->name('dashboard');


    Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
    Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/faq', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/faq/{faq}', [FaqController::class, 'show'])->name('faq.show');
    Route::get('/faq/{faq}/edit', [FaqController::class, 'edit'])->name('faq.edit');
    Route::put('/faq/{faq}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/faq/{faq}', [FaqController::class, 'destroy'])->name('faq.destroy');
});

// ======================== END CMS ==================================

// ========================---------- KOMISI ----------==================================
// ======================== KOMISI I==================================
Route::group([
    'prefix' => 'komisi-i',
    'as' => 'komisi-i.',
    'middleware' => ['auth', 'role.auth:komisi-i']
], function () {
    Route::get('/', [AgendaKerjaController::class, 'index']);
    Route::get('/agendakerja', [AgendaKerjaController::class, 'index'])->name('agenda.index');
    Route::get('/agendakerja/create', [AgendaKerjaController::class, 'showCreate'])->name('agenda.create');
    Route::post('/agendakerja', [AgendaKerjaController::class, 'store'])->name('agenda.store');
    Route::get('/agendakerja/{id}/edit', [AgendaKerjaController::class, 'showEdit'])->name('agenda.edit');
    Route::put('/agendakerja/{id}', [AgendaKerjaController::class, 'update'])->name('agenda.update');
    Route::delete('/agendakerja/{id}', [AgendaKerjaController::class, 'destroy'])->name('agenda.destroy');

    Route::get('/transparansisurat', [KomisiController::class, 'belumDiperiksa'])->name('proposal.belum-diperiksa');
    Route::get('/transparansisurat/revisi', [KomisiController::class, 'direvisi'])->name('proposal.direvisi');
    Route::get('/transparansisurat/disetujui', [KomisiController::class, 'disetujui'])->name('proposal.disetujui');
    Route::get('/transparansisurat/ditolak', [KomisiController::class, 'ditolak'])->name('proposal.ditolak');
    Route::put('/proposal/{proposal}/komisi-reject', [KomisiController::class, 'adminReject'])->name('proposal.komisi-reject');
    Route::put('/proposal/{proposalId}/komisi-approve', [KomisiController::class, 'adminApprove'])->name('proposal.komisi-approve');
    Route::get('/list-revisi/{proposalId}', [KomisiController::class, 'listRevisi'])->name('proposal.revisi');
    Route::get('/revisi/create/{proposalId}', [KomisiController::class, 'viewCreateRevisi'])->name('revisi.create');
    Route::post('/revisi/store/{proposalId}', [KomisiController::class, 'createRevisi'])->name('revisi.store');
});
// ======================== END KOMISi I==================================
// ======================== KOMISI II==================================
Route::group([
    'prefix' => 'komisi-ii',
    'as' => 'komisi-ii.',
    'middleware' => ['auth', 'role.auth:komisi-ii']
], function () {
    Route::get('/', [AgendaKerjaController::class, 'index']);
    Route::get('/agendakerja', [AgendaKerjaController::class, 'index'])->name('agenda.index');
    Route::get('/agendakerja/create', [AgendaKerjaController::class, 'showCreate'])->name('agenda.create');
    Route::post('/agendakerja', [AgendaKerjaController::class, 'store'])->name('agenda.store');
    Route::get('/agendakerja/{id}/edit', [AgendaKerjaController::class, 'showEdit'])->name('agenda.edit');
    Route::put('/agendakerja/{id}', [AgendaKerjaController::class, 'update'])->name('agenda.update');
    Route::delete('/agendakerja/{id}', [AgendaKerjaController::class, 'destroy'])->name('agenda.destroy');

    Route::get('/transparansisurat', [KomisiController::class, 'belumDiperiksa'])->name('proposal.belum-diperiksa');
    Route::get('/transparansisurat/revisi', [KomisiController::class, 'direvisi'])->name('proposal.direvisi');
    Route::get('/transparansisurat/disetujui', [KomisiController::class, 'disetujui'])->name('proposal.disetujui');
    Route::get('/transparansisurat/ditolak', [KomisiController::class, 'ditolak'])->name('proposal.ditolak');
    Route::put('/proposal/{proposal}/komisi-reject', [KomisiController::class, 'adminReject'])->name('proposal.komisi-reject');
    Route::put('/proposal/{proposalId}/komisi-approve', [KomisiController::class, 'adminApprove'])->name('proposal.komisi-approve');
    Route::get('/list-revisi/{proposalId}', [KomisiController::class, 'listRevisi'])->name('proposal.revisi');
    Route::get('/revisi/create/{proposalId}', [KomisiController::class, 'viewCreateRevisi'])->name('revisi.create');
    Route::post('/revisi/store/{proposalId}', [KomisiController::class, 'createRevisi'])->name('revisi.store');
});
// ======================== END KOMISi II==================================
// ======================== KOMISI III==================================
Route::group([
    'prefix' => 'komisi-iii',
    'as' => 'komisi-iii.',
    'middleware' => ['auth', 'role.auth:komisi-iii']
], function () {
    Route::get('/', [AgendaKerjaController::class, 'index']);
    Route::get('/agendakerja', [AgendaKerjaController::class, 'index'])->name('agenda.index');
    Route::get('/agendakerja/create', [AgendaKerjaController::class, 'showCreate'])->name('agenda.create');
    Route::post('/agendakerja', [AgendaKerjaController::class, 'store'])->name('agenda.store');
    Route::get('/agendakerja/{id}/edit', [AgendaKerjaController::class, 'showEdit'])->name('agenda.edit');
    Route::put('/agendakerja/{id}', [AgendaKerjaController::class, 'update'])->name('agenda.update');
    Route::delete('/agendakerja/{id}', [AgendaKerjaController::class, 'destroy'])->name('agenda.destroy');

    Route::get('/transparansisurat', [KomisiController::class, 'belumDiperiksa'])->name('proposal.belum-diperiksa');
    Route::get('/transparansisurat/revisi', [KomisiController::class, 'direvisi'])->name('proposal.direvisi');
    Route::get('/transparansisurat/disetujui', [KomisiController::class, 'disetujui'])->name('proposal.disetujui');
    Route::get('/transparansisurat/ditolak', [KomisiController::class, 'ditolak'])->name('proposal.ditolak');
    Route::put('/proposal/{proposal}/komisi-reject', [KomisiController::class, 'adminReject'])->name('proposal.komisi-reject');
    Route::put('/proposal/{proposalId}/komisi-approve', [KomisiController::class, 'adminApprove'])->name('proposal.komisi-approve');
    Route::get('/list-revisi/{proposalId}', [KomisiController::class, 'listRevisi'])->name('proposal.revisi');
    Route::get('/revisi/create/{proposalId}', [KomisiController::class, 'viewCreateRevisi'])->name('revisi.create');
    Route::post('/revisi/store/{proposalId}', [KomisiController::class, 'createRevisi'])->name('revisi.store');
});
// ======================== END KOMISi III==================================
// ======================== KOMISI IV==================================
Route::group([
    'prefix' => 'komisi-iv',
    'as' => 'komisi-iv.',
    'middleware' => ['auth', 'role.auth:komisi-iv']
], function () {
    Route::get('/', [AgendaKerjaController::class, 'index']);
    Route::get('/agendakerja', [AgendaKerjaController::class, 'index'])->name('agenda.index');
    Route::get('/agendakerja/create', [AgendaKerjaController::class, 'showCreate'])->name('agenda.create');
    Route::post('/agendakerja', [AgendaKerjaController::class, 'store'])->name('agenda.store');
    Route::get('/agendakerja/{id}/edit', [AgendaKerjaController::class, 'showEdit'])->name('agenda.edit');
    Route::put('/agendakerja/{id}', [AgendaKerjaController::class, 'update'])->name('agenda.update');
    Route::delete('/agendakerja/{id}', [AgendaKerjaController::class, 'destroy'])->name('agenda.destroy');

    Route::get('/transparansisurat', [KomisiController::class, 'belumDiperiksa'])->name('proposal.belum-diperiksa');
    Route::get('/transparansisurat/revisi', [KomisiController::class, 'direvisi'])->name('proposal.direvisi');
    Route::get('/transparansisurat/disetujui', [KomisiController::class, 'disetujui'])->name('proposal.disetujui');
    Route::get('/transparansisurat/ditolak', [KomisiController::class, 'ditolak'])->name('proposal.ditolak');
    Route::put('/proposal/{proposal}/komisi-reject', [KomisiController::class, 'adminReject'])->name('proposal.komisi-reject');
    Route::put('/proposal/{proposalId}/komisi-approve', [KomisiController::class, 'adminApprove'])->name('proposal.komisi-approve');
    Route::get('/list-revisi/{proposalId}', [KomisiController::class, 'listRevisi'])->name('proposal.revisi');
    Route::get('/revisi/create/{proposalId}', [KomisiController::class, 'viewCreateRevisi'])->name('revisi.create');
    Route::post('/revisi/store/{proposalId}', [KomisiController::class, 'createRevisi'])->name('revisi.store');
});
// ======================== END KOMISi IV==================================
// ======================== BADAN ANGGARAN ==================================
Route::group([
    'prefix' => 'badan-anggaran',
    'as' => 'badan-anggaran.',
    'middleware' => ['auth', 'role.auth:badan-anggaran']
], function () {
    Route::get('/', [AgendaKerjaController::class, 'index']);
    Route::get('/agendakerja', [AgendaKerjaController::class, 'index'])->name('agenda.index');
    Route::get('/agendakerja/create', [AgendaKerjaController::class, 'showCreate'])->name('agenda.create');
    Route::post('/agendakerja', [AgendaKerjaController::class, 'store'])->name('agenda.store');
    Route::get('/agendakerja/{id}/edit', [AgendaKerjaController::class, 'showEdit'])->name('agenda.edit');
    Route::put('/agendakerja/{id}', [AgendaKerjaController::class, 'update'])->name('agenda.update');
    Route::delete('/agendakerja/{id}', [AgendaKerjaController::class, 'destroy'])->name('agenda.destroy');

    Route::get('/transparansisurat', [BadanAnggaranController::class, 'belumDiperiksa'])->name('proposal.belum-diperiksa');
    Route::get('/transparansisurat/revisi', [BadanAnggaranController::class, 'direvisi'])->name('proposal.direvisi');
    Route::get('/transparansisurat/disetujui', [BadanAnggaranController::class, 'disetujui'])->name('proposal.disetujui');
    Route::get('/transparansisurat/ditolak', [BadanAnggaranController::class, 'ditolak'])->name('proposal.ditolak');
    Route::put('/proposal/{proposal}/komisi-reject', [BadanAnggaranController::class, 'adminReject'])->name('proposal.komisi-reject');
    Route::put('/proposal/{proposalId}/komisi-approve', [BadanAnggaranController::class, 'adminApprove'])->name('proposal.komisi-approve');
    Route::get('/list-revisi/{proposalId}', [BadanAnggaranController::class, 'listRevisi'])->name('proposal.revisi');
    Route::get('/revisi/create/{proposalId}', [BadanAnggaranController::class, 'viewCreateRevisi'])->name('revisi.create');
    Route::post('/revisi/store/{proposalId}', [BadanAnggaranController::class, 'createRevisi'])->name('revisi.store');
});
// ======================== END BADAN ANGGARAN ==================================
// ========================---------- KOMISI ----------==================================
Route::group([
    'prefix' => 'badan-kehormatan',
    'as' => 'badan-kehormatan.',
    'middleware' => ['auth', 'role.auth:badan-kehormatan']
], function () {
    Route::get('/', [AgendaBadanController::class, 'index']);
    Route::get('/agendakerja', [AgendaBadanController::class, 'index'])->name('agenda.index');
    Route::get('/agendakerja/create', [AgendaBadanController::class, 'showCreate'])->name('agenda.create');
    Route::post('/agendakerja', [AgendaBadanController::class, 'store'])->name('agenda.store');
    Route::get('/agendakerja/{id}/edit', [AgendaBadanController::class, 'showEdit'])->name('agenda.edit');
    Route::put('/agendakerja/{id}', [AgendaBadanController::class, 'update'])->name('agenda.update');
    Route::delete('/agendakerja/{id}', [AgendaBadanController::class, 'destroy'])->name('agenda.destroy');
});
// ======================== END BADAN Kehormatan ==================================
Route::group([
    'prefix' => 'badan-legislasi',
    'as' => 'badan-legislasi.',
    'middleware' => ['auth', 'role.auth:badan-legislasi']
], function () {
    Route::get('/', [AgendaBadanController::class, 'index']);
    Route::get('/agendakerja', [AgendaBadanController::class, 'index'])->name('agenda.index');
    Route::get('/agendakerja/create', [AgendaBadanController::class, 'showCreate'])->name('agenda.create');
    Route::post('/agendakerja', [AgendaBadanController::class, 'store'])->name('agenda.store');
    Route::get('/agendakerja/{id}/edit', [AgendaBadanController::class, 'showEdit'])->name('agenda.edit');
    Route::put('/agendakerja/{id}', [AgendaBadanController::class, 'update'])->name('agenda.update');
    Route::delete('/agendakerja/{id}', [AgendaBadanController::class, 'destroy'])->name('agenda.destroy');
});
// ======================== END BADAN legislasi ==================================
Route::group([
    'prefix' => 'bksap',
    'as' => 'bksap.',
    'middleware' => ['auth', 'role.auth:bksap']
], function () {
    Route::get('/', [AgendaBadanController::class, 'index']);
    Route::get('/agendakerja', [AgendaBadanController::class, 'index'])->name('agenda.index');
    Route::get('/agendakerja/create', [AgendaBadanController::class, 'showCreate'])->name('agenda.create');
    Route::post('/agendakerja', [AgendaBadanController::class, 'store'])->name('agenda.store');
    Route::get('/agendakerja/{id}/edit', [AgendaBadanController::class, 'showEdit'])->name('agenda.edit');
    Route::put('/agendakerja/{id}', [AgendaBadanController::class, 'update'])->name('agenda.update');
    Route::delete('/agendakerja/{id}', [AgendaBadanController::class, 'destroy'])->name('agenda.destroy');
});
// ======================== END BADAN legislasi ==================================
Route::group([
    'prefix' => 'burt',
    'as' => 'burt.',
    'middleware' => ['auth', 'role.auth:burt']
], function () {
    Route::get('/', [AgendaBadanController::class, 'index']);
    Route::get('/agendakerja', [AgendaBadanController::class, 'index'])->name('agenda.index');
    Route::get('/agendakerja/create', [AgendaBadanController::class, 'showCreate'])->name('agenda.create');
    Route::post('/agendakerja', [AgendaBadanController::class, 'store'])->name('agenda.store');
    Route::get('/agendakerja/{id}/edit', [AgendaBadanController::class, 'showEdit'])->name('agenda.edit');
    Route::put('/agendakerja/{id}', [AgendaBadanController::class, 'update'])->name('agenda.update');
    Route::delete('/agendakerja/{id}', [AgendaBadanController::class, 'destroy'])->name('agenda.destroy');
});
// ======================== END BADAN legislasi ==================================


// ========================  ORMAWA ==================================
Route::group([
    'prefix' => 'ormawa',
    'as' => 'ormawa.',
    'middleware' => ['auth', 'role.auth:ormawa']
], function () {
    Route::get('/', [AjukanDokumenController::class, 'index']);
    Route::get('/ajukansurat', [AjukanDokumenController::class, 'index'])->name('ajukansurat');
    Route::post('/ajukan-proposal', [AjukanDokumenController::class, 'ajukanProposal'])->name('pengajuan_proposal');

    Route::get('/transparansisurat', [AjukanDokumenController::class, 'cek_progress'])->name('cek_progress');
    Route::get('/list-revisi/{proposalId}', [AjukanDokumenController::class, 'listRevisi'])->name('proposal.revisi');
    Route::get('/proposal/{proposalId}/revisi/{revisiId}/list', [AjukanDokumenController::class, 'showCreateRevisi'])->name('create_revisi');
    Route::post('/ormawa/proposal/{proposalId}/revisi/{revisiId}/kirim', [AjukanDokumenController::class, 'kirimRevisi'])->name('kirim_revisi');
    Route::post('/proposal-final/{proposalId}/upload', [AjukanDokumenController::class, 'uploadFileFinal'])->name('upload.file.final');
});
// ======================== END ORMAWA ==================================


// ======================== PIMPINAN TINGGI ==================================
Route::group([
    'prefix' => 'pimpinan',
    'as' => 'pimpinan.',
    'middleware' => ['auth', 'role.auth:pimpinan']
], function () {
    Route::get('/transparansisurat', [SekjenController::class, 'belumDiperiksa'])->name('proposal.belum-diperiksa');
    Route::get('/transparansisurat/revisi', [SekjenController::class, 'direvisi'])->name('proposal.direvisi');
    Route::get('/transparansisurat/disetujui', [SekjenController::class, 'disetujui'])->name('proposal.disetujui');
    Route::get('/transparansisurat/ditolak', [SekjenController::class, 'ditolak'])->name('proposal.ditolak');
    Route::put('/proposal/{proposal}/komisi-reject', [SekjenController::class, 'adminReject'])->name('proposal.komisi-reject');
    Route::put('/proposal/{proposalId}/komisi-approve', [SekjenController::class, 'adminApprove'])->name('proposal.komisi-approve');
    Route::get('/list-revisi/{proposalId}', [SekjenController::class, 'listRevisi'])->name('proposal.revisi');
    Route::get('/revisi/create/{proposalId}', [SekjenController::class, 'viewCreateRevisi'])->name('revisi.create');
    Route::post('/revisi/store/{proposalId}', [SekjenController::class, 'createRevisi'])->name('revisi.store');
});
// ======================== END PIMPINAN TINGGI ==================================

// ======================== MAILING SYSTEM ==================================
Route::get('/mailtest', [MailController::class, 'index']);
