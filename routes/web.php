<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\BlotterController;
use App\Http\Livewire\NoticeController;
use App\Http\Livewire\SettlementController;
use App\Models\Blotter;

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

Route::get('/',[HomeController::class, 'index']);

Route::get('/home',[HomeController::class, 'redirect'])->middleware('auth','verified')->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// ADMIN CONTROLS - BLOTTER
Route::get('blotter/create', [BlotterController::class, 'create'])->name('blotter.create');
Route::post('blotter/store', [BlotterController::class, 'store'])->name('blotter.store');
Route::get('blotter/show', [BlotterController::class, 'show'])->name('blotter.show');
Route::get('blotter/show/list', [BlotterController::class, 'getBlotterReports'])->name('blotter.list');
Route::get('blotter/settled', [BlotterController::class, 'settledCases'])->name('blotter.settled');
Route::get('blotter/settled/list', [BlotterController::class, 'getSettledCases'])->name('blotter.settled-list');
Route::get('blotter/summary', [BlotterController::class, 'summary'])->name('blotter.summary');
Route::get('blotter/summary/complaint/{id}', [BlotterController::class, 'complaintPDF'])->name('complaint.pdf');
Route::get('blotter/summary/amicable-settlement/{id}', [BlotterController::class, 'amicablePDF'])->name('amicable.pdf');
Route::get('blotter/summary/arbitration-award/{id}', [BlotterController::class, 'arbitrationPDF'])->name('arbitration.pdf');
//EDIT BLOTTER
Route::post('edit-blotter/{id}', [BlotterController::class, 'edit'])->name('editBlotter');


//NOTICE MODULE
Route::get('notice/show', [NoticeController::class, 'show'])->name('notice.show');
Route::get('notice/show/list', [NoticeController::class, 'getNoticeList'])->name('notice.list');
Route::get('notice/schedule/{id}', [NoticeController::class, 'schedule'])->name('notice.schedule');
//EDIT HEARING SCHEDULE
Route::post('edit-hearing-schedule/{id}', [NoticeController::class, 'edit'])->name('editHearingSched');
//CREATE
Route::get('notice/create/{id}', [NoticeController::class, 'create'])->name('notice.create');
//CREATE HEARING RECORD
Route::get('notice/create/hearing/{id}', [NoticeController::class, 'hearing'])->name('notice.hearing');
//CREATE HEARING RECORD
Route::get('notice/create/summon/{id}', [NoticeController::class, 'summon'])->name('notice.summon');
//CREATE HEARING RECORD
Route::get('notice/create/constitution/{id}', [NoticeController::class, 'constitution'])->name('notice.constitution');
//NOTIFY
Route::get('notice/create/notify/{id}', [NoticeController::class, 'notify'])->name('notice.notify');
//DOWNLOAD PDF
Route::get('notice/download/hearing/{id}', [NoticeController::class, 'hearingPDF'])->name('hearing.pdf');
Route::get('notice/download/summon/{id}', [NoticeController::class, 'summonPDF'])->name('summon.pdf');
Route::get('notice/download/pangkat/{id}', [NoticeController::class, 'pangkatPDF'])->name('pangkat.pdf');
Route::get('notice/download/subpoena/{id}', [NoticeController::class, 'subpoenaPDF'])->name('subpoena.pdf');
//SUMMARY
Route::get('notice/summary', [NoticeController::class, 'summary'])->name('notice.summary');
//ADD WITNESS
Route::post('notice/add-witness/{id}', [NoticeController::class, 'addWitness'])->name('notice.addWitness');
//REMOVE WITNESS
Route::get('notice/remove-witness/{id}', [NoticeController::class, 'removeWitness'])->name('notice.removeWitness');

//SETTLEMENT
Route::get('settlement/show-mediation', [SettlementController::class, 'show_mediation'])->name('settlement.show.mediation');
Route::get('settlement/show-mediation/list', [SettlementController::class, 'getMediation'])->name('settlement.mediation.list');
Route::get('settlement/mediation/{id}', [SettlementController::class, 'mediation'])->name('settlement.mediation');
Route::post('settlement/mediation/store/{id}', [SettlementController::class, 'store_mediation'])->name('settlement.mediation.store');

Route::get('settlement/show-conciliation', [SettlementController::class, 'show_conciliation'])->name('settlement.show.conciliation');
Route::get('settlement/show-conciliation/list', [SettlementController::class, 'getConciliation'])->name('settlement.conciliation.list');
Route::get('settlement/conciliation/{id}', [SettlementController::class, 'conciliation'])->name('settlement.conciliation');
Route::post('settlement/conciliation/store/{id}', [SettlementController::class, 'store_conciliation'])->name('settlement.conciliation.store');

Route::get('settlement/show-arbitration', [SettlementController::class, 'show_arbitration'])->name('settlement.show.arbitration');
Route::get('settlement/show-arbitration/list', [SettlementController::class, 'getArbitration'])->name('settlement.arbitration.list');
Route::get('settlement/arbitration-agreement/{id}', [SettlementController::class, 'arbitration_agreement'])->name('settlement.arbitration_agreement');
Route::post('settlement/arbitration-agreement/store/{id}', [SettlementController::class, 'store_arbitration_agreement'])->name('settlement.arbitration_agreement.store');

Route::get('settlement/arbitration-award/{id}', [SettlementController::class, 'arbitration_award'])->name('settlement.arbitration_award');
Route::post('settlement/arbitration-award/store/{id}', [SettlementController::class, 'store_arbitration_award'])->name('settlement.arbitration_award.store');

Route::get('settlement/file-court-action/{id}', [SettlementController::class, 'fileCourtAction'])->name('settlement.file-court-action');

//PROCEEDS
Route::get('settlement/proceed/conciliation/{id}', [SettlementController::class, 'proceed_to_conciliation'])->name('settlement.proceed.conciliation');
Route::get('settlement/proceed/arbitration/{id}', [SettlementController::class, 'proceed_to_arbitration'])->name('settlement.proceed.arbitration');