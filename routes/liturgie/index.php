<?php

use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum', 'role:responsable_liturgie',
    config('jetstream.auth_session'),
    'verified',
])->prefix('liturgie')->name('liturgie.')->group(function () {
    Route::get('/', \App\Livewire\Pages\Liturgie\Dashboard\Index::class)->name('index');
    Route::get('/gerer', \App\Livewire\Pages\Liturgie\GererLiturgie\Index::class)->name('gerer');
});
