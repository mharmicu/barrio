<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\BlotterController;
use App\Http\Livewire\NoticeController;
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