<?php

use App\Http\Controllers\mainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('product');
    })->name('product');
});

Route::get('categories',[mainController::class,'show_categories']);
Route::post('add_category',[mainController::class,'add_category']);
Route::get('remove_category/{id}',[mainController::class,'remove_category']);
Route::post('add_product',[mainController::class,'add_product'])->name('add_products');
Route::get('add_product',[mainController::class,'show_product_form'])->name('view_products');
Route::get('product',[mainController::class,'view_product'])->name('product');