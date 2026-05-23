<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\Admin\RecipeController as AdminRecipeController;
use App\Http\Controllers\Userzone\ProfileController;
use App\Http\Controllers\Admin\UserController;

// 🔓 Publiek
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/faq',[\App\Http\Controllers\FaqController::class,'index'])->name('faq.index');
Route::get('/recepten', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recepten/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');
Route::get('/profiel/{user}', [ProfileController::class, 'show'])->name('profile.show');


// 🔐 gebruikers
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('userzone.dashboard'))->middleware('verified')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// 🔐🛡️ Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('recipes', AdminRecipeController::class);
    Route::resource('faq-categories', \App\Http\Controllers\Admin\FaqCategoryController::class);
    Route::resource('faq-items', \App\Http\Controllers\Admin\FaqItemController::class);
});


require __DIR__.'/auth.php';
