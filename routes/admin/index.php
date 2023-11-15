<?php

use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum', 'role:admin',
    config('jetstream.auth_session'),
    'verified',
])->prefix('admin')->group(function () {
    Route::get('/', \App\Livewire\Pages\Aumonier\Dashboard\Index::class)->name('dashboard');
});
