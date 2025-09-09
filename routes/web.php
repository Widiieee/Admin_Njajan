<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Controllers Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/katalog', function () {
    return view('katalog');
});

Route::get('/struktur', function () {
    return view('struktur');
});

Route::get('/kontak', function () {
    return view('kontak');
});

//Order
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/katalog', [ProductController::class, 'katalog'])->name('katalog');

// Default dashboard Laravel (kalau tidak dipakai bisa dihapus)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes dengan middleware auth
Route::middleware(['auth'])->group(function () {
    // Admin panel
    Route::prefix('admin')->name('admin.')->group(function () {
        
        // Semua role bisa akses dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // CEO full access
        Route::middleware('role:CEO')->group(function () {
            Route::resource('users', UserController::class);
            Route::resource('employees', EmployeeController::class);
            // Tambahkan manajemen lain khusus CEO di sini
        });

        // Manager Pemasaran
        Route::middleware('role:Manager Pemasaran')->group(function () {
            Route::resource('products', ProductController::class);
        });

        // Manager Keuangan
        Route::middleware('role:Manager Keuangan')->group(function () {
            Route::resource('expenses', ExpenseController::class);
            Route::post('orders/{order}/confirm-payment', [OrderController::class, 'confirmPayment'])
                ->name('orders.confirmPayment');
        });

        // Manager Logistik
        Route::middleware('role:Manager Logistik')->group(function () {
            Route::resource('orders', OrderController::class)->only(['index', 'show', 'update']);
        });

        // Kalau ada role lain, tambahkan di sini

        // Untuk membuka laman
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
        Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class);
        Route::resource('expenses', \App\Http\Controllers\Admin\ExpenseController::class);
        Route::resource('employees', \App\Http\Controllers\Admin\EmployeeController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class); // untuk CEO
        Route::post('orders/{order}/confirm-payment', [\App\Http\Controllers\Admin\OrderController::class,'confirmPayment'])->name('orders.confirmPayment');
    });

    // Profile routes (bawaan Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (login, register, dll)
require __DIR__ . '/auth.php';
