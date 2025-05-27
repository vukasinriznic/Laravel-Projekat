<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProizvodController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProizvodController::class, 'welcome']);


Route::get('/katalog', function () {
    return view('katalog');
});

Route::get('/glavni/katalog', function () {
    return view('user_katalog');
});

Route::get('/kontakt', function () {
    return view('kontakt');
});

Route::get('/proizvodi/{id}', [ProizvodController::class, 'show'])->name('proizvodi.show');


Route::middleware(['auth'])->get('/dashboard', function () {
    $products = \App\Models\Product::with('category')->get();
    return view('dashboard', compact('products'));
})->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/product-add', [ProductController::class, 'add'])->name('product-add');
    Route::post('/product-create', [ProductController::class, 'create'])->name('product-create');
    Route::delete('/product-delete/{id}', [ProductController::class, 'destroy'])->name('product-delete');

    Route::get('/product-edit/{id}', [ProductController::class, 'edit'])->name('product-edit');
    Route::put('/product-update/{id}', [ProductController::class, 'update'])->name('product-update');
});

Route::get('/katalog', [ProizvodController::class, "list"])->name('katalog');
Route::get('/katalog/{category?}', [ProizvodController::class, 'index'])->name('katalog');

Route::middleware('auth')->group(function() {
    Route::get('/admin/lista_proizvoda', [ProizvodController::class, 'lista'])->name("lista_proizvoda");
});



require __DIR__.'/auth.php';
