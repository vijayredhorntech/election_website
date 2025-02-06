<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::post('/setFinancialYear', [AdminController::class, 'setFinancialYear'])->name('set-financial-year');

    Route::prefix('admin')->group(function () {
        Route::name('designations.')->group(function () {
            Route::get('/designations', [DesignationController::class, 'index'])->name('index');
            Route::post('/designations/store', [DesignationController::class, 'store'])->name('store');
            Route::get('/designations/edit/{id}', [DesignationController::class, 'edit'])->name('edit');
            Route::post('/designations/update/{id}', [DesignationController::class, 'update'])->name('update');
            Route::get('/designations/delete/{id}', [DesignationController::class, 'delete'])->name('delete');
        });

        Route::name('office.')->group(function () {
            Route::get('/office', [OfficeController::class, 'index'])->name('index');
            Route::post('/office/store', [OfficeController::class, 'store'])->name('store');
            Route::get('/office/edit/{id}', [OfficeController::class, 'edit'])->name('edit');
            Route::get('/office/view/{id}', [OfficeController::class, 'view'])->name('view');
            Route::post('/office/update/{id}', [OfficeController::class, 'update'])->name('update');
            Route::get('/office/delete/{id}', [OfficeController::class, 'delete'])->name('delete');
            Route::get('/office/status/{id}', [OfficeController::class, 'status'])->name('status');
        });

        Route::name('member.')->group(function () {
            Route::get('/member', [MemberController::class, 'index'])->name('index');
            Route::post('/member/store', [MemberController::class, 'store'])->name('store');
            Route::get('/member/edit/{id}', [MemberController::class, 'edit'])->name('edit');
            Route::get('/member/view/{id}', [MemberController::class, 'view'])->name('view');
            Route::post('/member/update/{id}', [MemberController::class, 'update'])->name('update');
            Route::get('/member/delete/{id}', [MemberController::class, 'delete'])->name('delete');
        });

        Route::name('employees.')->group(function () {
            Route::get('/employees', [EmployeeController::class, 'index'])->name('index');
        });

        Route::name('members.')->group(function () {
            Route::get('/members', [MemberController::class, 'index'])->name('index');
        });
    });
});

require __DIR__ . '/auth.php';
