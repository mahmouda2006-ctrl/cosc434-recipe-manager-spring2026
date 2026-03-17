<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('recipes.index');
});

// login/logout
Route::get('/login-demo', function (Request $request) {
    $request->session()->put('logged_in', true);
    return redirect('/recipes')->with('success', 'You are now logged in!');
})->name('login.demo');

Route::get('/logout-demo', function (Request $request) {
    $request->session()->forget('logged_in');
    return redirect('/recipes')->with('success', 'You are now logged out!');
})->name('logout.demo');

// PUBLIC 
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->whereNumber('recipe')->name('recipes.show');

// PROTECTED 
Route::middleware(['demo.auth'])->group(function () {

    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
});

