<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripImportController;
use App\Http\Controllers\TripsImportController;
use App\Http\Controllers\InvoiceExportController;
use App\Http\Controllers\TripsDataTableController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function()
{
    Route::get('/invoices', \App\Http\Livewire\Invoices::class)->name('invoices.all');
    Route::get('/invoices/modify', \App\Http\Livewire\InvoiceModify::class)->name('invoices.modify');
    
    Route::post('/import', [TripsImportController::class, 'upload']);
    Route::get('/trips/upload', [TripsImportController::class, 'showUploadForm']);
    Route::get('/trips/filter', [TripsDataTableController::class, 'show'])->name('trips');
    Route::get('/trips/modify', \App\Http\Livewire\Trips::class)->name('trips.modify');

    Route::get('/export/received', [InvoiceExportController::class, 'received'])->name('received');
    Route::get('/export/pending', [InvoiceExportController::class, 'pending'])->name('pending');
});


