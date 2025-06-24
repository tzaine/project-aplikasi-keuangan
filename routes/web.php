<?php

use Filament\Billing\Providers\Contracts\Provider;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use Barryvdh\DomPDF\Facade\Pdf;


Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/transactions/pdf', [TransactionController::class, 'downloadPdf'])->name('transactions.pdf');
