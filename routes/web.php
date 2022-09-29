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

Route::middleware('can:admin')->group(function () {
    Route::post('logout', [AdminController::class, 'logout']);

    Route::get('/admin/khach-hang', [AdminController::class, 'customers']);

    Route::get('/admin/khach-hang/them-moi', [AdminController::class, 'addCustomer']);
    Route::post('/admin/khach-hang/them-moi', [AdminController::class, 'storeCustomer']);

    Route::get('/admin/lien-he', [AdminController::class, 'lienHeAdmin']);
    Route::delete('admin/contact/{contact}', [AdminController::class, 'destroyContact']);

    Route::get('/admin/khach-hang/{customer:slug}', [AdminController::class, 'showOne']);
    Route::post('/admin/khach-hang/{customer:slug}', [AdminController::class, 'storeImage']);

    Route::get('/admin/khach-hang/{customer}/edit', [AdminController::class, 'showCustomer']);
    Route::patch('/admin/khach-hang/{customer}', [AdminController::class, 'update']);

    Route::delete('admin/khach-hang/{customer}', [AdminController::class, 'destroy']);
    Route::delete('admin/image/{image}', [AdminController::class, 'destroyImage']);

    Route::get('/admin/danh-muc', [AdminController::class, 'categories']);

    Route::get('/admin/danh-muc/them-moi', [AdminController::class, 'addNewCategoryPage']);
    Route::post('/admin/danh-muc/them-moi', [AdminController::class, 'storeCategory']);

    Route::get('/admin/danh-muc/{category}/edit', [AdminController::class, 'editCategoryPage']);
    Route::patch('/admin/danh-muc/{category}/edit', [AdminController::class, 'updateCategory']);

    Route::delete('admin/danh-muc/{category}', [AdminController::class, 'destroyCategory']);

    Route::get('/admin/carousel/', [AdminController::class, 'showCarousel']);
    Route::post('/admin/carousel/', [AdminController::class, 'storeCarousel']);
    Route::delete('admin/carousel/{carousel}', [AdminController::class, 'destroyCarousel']);
});
