<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Page: Trang Chủ
Route::get('/', [CustomerController::class, 'index'])->name('home');

// Page: Hiển thị Toàn Bộ Ảnh Của 1 Customer
Route::get('bo-anh/{customer:slug}', [CustomerController::class, 'showOne'])->middleware('guest');

// Page: Bảng Giá
Route::get('bang-gia', [CustomerController::class, 'showBangGia'])->middleware('guest');

// Page: Liên Hệ
Route::get('lien-he', [CustomerController::class, 'showLienHe'])->middleware('guest');
Route::post('lien-he', [CustomerController::class, 'store'])->middleware('guest');


// Route: Admin
// Page: Admin to Login
Route::get('admin', [AdminController::class, 'loginPage'])->middleware('guest');
Route::post('admin', [AdminController::class, 'store'])->middleware('guest');

Route::post('logout', [AdminController::class, 'logout'])->middleware('can:admin');

Route::get('/admin/khach-hang', [AdminController::class, 'customers'])->middleware('can:admin');

Route::get('/admin/khach-hang/them-moi', [AdminController::class, 'addCustomer'])->middleware('can:admin');
Route::post('/admin/khach-hang/them-moi', [AdminController::class, 'storeCustomer'])->middleware('can:admin');

Route::get('/admin/lien-he', [AdminController::class, 'lienHeAdmin'])->middleware('can:admin');
Route::delete('admin/contact/{contact}', [AdminController::class, 'destroyContact'])->middleware('can:admin');

Route::get('/admin/khach-hang/{customer:slug}', [AdminController::class, 'showOne'])->middleware('can:admin');
Route::post('/admin/khach-hang/{customer:slug}', [AdminController::class, 'storeImage'])->middleware('can:admin');

Route::get('/admin/khach-hang/{customer}/edit', [AdminController::class, 'showCustomer'])->middleware('can:admin');
Route::patch('/admin/khach-hang/{customer}', [AdminController::class, 'update'])->middleware('can:admin');

Route::delete('admin/khach-hang/{customer}', [AdminController::class, 'destroy'])->middleware('can:admin');
Route::delete('admin/image/{image}', [AdminController::class, 'destroyImage'])->middleware('can:admin');

Route::get('/admin/danh-muc', [AdminController::class, 'categories'])->middleware('can:admin');

Route::get('/admin/danh-muc/them-moi', [AdminController::class, 'addNewCategoryPage'])->middleware('can:admin');
Route::post('/admin/danh-muc/them-moi', [AdminController::class, 'storeCategory'])->middleware('can:admin');

Route::get('/admin/danh-muc/{category}/edit', [AdminController::class, 'editCategoryPage'])->middleware('can:admin');
Route::patch('/admin/danh-muc/{category}/edit', [AdminController::class, 'updateCategory'])->middleware('can:admin');

Route::delete('admin/danh-muc/{category}', [AdminController::class, 'destroyCategory'])->middleware('can:admin');

Route::get('/admin/carousel/', [AdminController::class, 'showCarousel'])->middleware('can:admin');
Route::post('/admin/carousel/', [AdminController::class, 'storeCarousel'])->middleware('can:admin');
Route::delete('admin/carousel/{carousel}', [AdminController::class, 'destroyCarousel'])->middleware('can:admin');
