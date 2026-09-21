<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;

Route::get('/robots.txt', function () {
    return response(file_get_contents(public_path('robots.txt')), 200, [
        'Content-Type' => 'text/plain; charset=UTF-8',
    ]);
})->name('robots');

Route::get('/', [ContentController::class, 'home'])->name('home');
Route::get('/solucoes', [ContentController::class, 'solutions'])->name('solutions');
Route::get('/solucoes/{solution}', [ContentController::class, 'solution'])->name('solutions.show');
Route::get('/setores', [ContentController::class, 'sectors'])->name('sectors');
Route::get('/setores/{sector}', [ContentController::class, 'sector'])->name('sectors.show');
Route::get('/sobre', [ContentController::class, 'about'])->name('about');
Route::get('/resultados', [ContentController::class, 'results'])->name('results');
Route::get('/privacidade', [ContentController::class, 'privacy'])->name('privacy');
Route::get('/termos', [ContentController::class, 'terms'])->name('terms');

Route::get('/contacto', [ContactController::class, 'create'])->name('contact');
Route::post('/contacto', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');
