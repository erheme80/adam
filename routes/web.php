<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Route::get('admin/dashboard',function(){
//    return view('admin.dashboard');
//});

// Route::get('admin/product/create',function(){
//     return view('admin.product.create');
// });

Route::middleware(['auth',\App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Route::get('brand',function() {
    //     return view('admin.brand.index');
    // })->name('admin.brand');

    Route::controller(BrandController::class)->group(function() {
        Route::get('brands','index')->name('admin.brands.index');
        Route::get('brands/create','create')->name('admin.brands.create');
        Route::post('brands','store')->name('admin.brands.store');
        Route::get('brands/edit/{id}','edit')->name('admin.brands.edit');

    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('categories','index')->name('admin.categories.index');
        Route::get('categories/create','create')->name('admin.categories.create');
        Route::post('categories','store')->name('admin.categories.store');
        Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });

    Route::controller(ProductController::class)->group(function() {
        Route::get('products','index')->name('admin.products.index');
        Route::get('products/create','create')->name('admin.products.create');
        Route::post('products','store')->name('admin.products.store');
        
        Route::get('products/image/{id}', 'image')->name('admin.products.image');
        Route::post('products/image/{id}', 'storeImage')->name('admin.product.image.store');
        Route::delete('products/image/{id}', 'imageDestroy')->name('admin.products.image.destroy');
    });

});




