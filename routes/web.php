<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
Route::get('/', [HomeController::class,'home'])->name('index');
Route::get('/product_details/{id}', [HomeController::class,'productDetails'])->name('product_details');
Route::get('/allproducts', [HomeController::class,'allproducts'])->name('viewallproducts');



Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::get('/myorders', [HomeController::class, 'myOrders'])
    ->middleware(['auth', 'verified'])
    ->name('myorders');

    Route::get('/addtocart/{id}', [HomeController::class, 'addToCart'])
    ->middleware(['auth', 'verified'])
    ->name('add_to_cart');

    Route::get('/cartproducts', [HomeController::class, 'cartproducts'])
    ->middleware(['auth', 'verified'])
    ->name('cartproducts');

    Route::get('/removecartproducts/{id}', [HomeController::class, 'removeCartProducts'])
    ->middleware(['auth', 'verified'])
    ->name('removecartproducts');

    Route::post('/confirm_order', [HomeController::class, 'confirm_order'])
    ->middleware(['auth', 'verified'])
    ->name('confirm_order');

    

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/add_category', [AdminController::class, 'addCategory'])->name('admin.addcategory');
    Route::post('/add_category', [AdminController::class, 'postaddcategory'])->name('admin.postaddcategory');
    Route::get('/view_category', [AdminController::class, 'viewCategory'])->name('admin.viewcategory');
    Route::get('/delete_category/{id}', [AdminController::class, 'deleteCategory'])->name('admin.categorydelete');
    Route::get('/update_category/{id}', [AdminController::class, 'updateCategory'])->name('admin.updatecategory');
    Route::post('/update_category/{id}', [AdminController::class, 'postUpdateCategory'])->name('admin.postupdatecategory');
    Route::get('/add_product', [AdminController::class, 'addproduct'])->name('admin.addproduct');
    Route::post('/add_product', [AdminController::class, 'postaddproduct'])->name('admin.postaddproduct');
    Route::get('/view_product', [AdminController::class, 'viewproduct'])->name('admin.viewproduct');
    Route::get('/delete_product/{id}', [AdminController::class, 'deleteProduct'])->name('admin.deleteproduct');
    Route::get('/update_product/{id}', [AdminController::class, 'updateProduct'])->name('admin.updateproduct');
    Route::post('/update_product/{id}', [AdminController::class, 'postupdateproduct'])->name('admin.postupdateproduct');
    Route::any('/search', [AdminController::class, 'searchproduct'])->name('admin.searchproduct');
    Route::get('/view_orders', [AdminController::class, 'viewOrders'])->name('admin.vieworders');
    Route::post('/change_status/{id}', [AdminController::class, 'changeStatus'])->name('admin.change_status');
    Route::get('/downloadinvoice/{id}', [AdminController::class, 'downloadInvoice'])->name('admin.downloadinvoice');
});
require __DIR__.'/auth.php';
