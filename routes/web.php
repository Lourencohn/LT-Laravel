<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Developer\Index as DeveloperIndex;
use App\Livewire\Developer\Create as DeveloperCreate;
use App\Livewire\Developer\Edit as DeveloperEdit;
use App\Livewire\Article\Index as ArticleIndex;
use App\Livewire\Article\Create as ArticleCreate;
use App\Livewire\Article\Edit as ArticleEdit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rotas para Desenvolvedores
    Route::get('/developers', DeveloperIndex::class)->name('developers.index');
    Route::get('/developers/create', DeveloperCreate::class)->name('developers.create');
    Route::get('/developers/{developer}/edit', DeveloperEdit::class)->name('developers.edit');
    
    // Rotas para Artigos
    Route::get('/articles', ArticleIndex::class)->name('articles.index');
    Route::get('/articles/create', ArticleCreate::class)->name('articles.create');
    Route::get('/articles/{article}/edit', ArticleEdit::class)->name('articles.edit');
});

require __DIR__.'/auth.php';
