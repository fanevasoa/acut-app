<?php

use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum', 'role:responsable_liturgie',
    config('jetstream.auth_session'),
    'verified',
])->prefix('liturgie')->name('liturgie.')->group(function () {
    Route::get('/', \App\Livewire\Pages\Liturgie\Index::class)->name('index');
});
