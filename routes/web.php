<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/test', fn () => response()->json([
    'environment' => app()->environment(),
]))->name('no-subdomain.test');

Route::domain('test.'.config('app.domain'))->group(function () {
    Route::get('/test', fn () => response()->json([
        'environment' => app()->environment(),
    ]))->name('subdomain.test');
});
