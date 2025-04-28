<?php

use Filament\Billing\Providers\Contracts\Provider;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});