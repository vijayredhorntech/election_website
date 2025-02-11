<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\ConstituencyController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\TitleController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/donate', [PageController::class, 'donate'])->name('donate');
Route::get('/donner_details', [PageController::class, 'donnerDetails'])->name('donnerDetails');
Route::get('/payment_method', [PageController::class, 'paymentMethod'])->name('paymentMethod');


Route::get('/join_us', [PageController::class, 'joinUs'])->name('joinUs');
Route::get('/otp_verification', [PageController::class, 'otpVerification'])->name('otpVerification');
Route::get('/membership_plans', [PageController::class, 'membershipPlans'])->name('membershipPlans');
Route::get('/member_basic-info', [PageController::class, 'memberBasicInfo'])->name('memberBasicInfo');
Route::get('/member_address_info', [PageController::class, 'memberAddressInfo'])->name('memberAddressInfo');
Route::get('/donation_section', [PageController::class, 'donationSection'])->name('donationSection');
Route::get('/payment_section', [PageController::class, 'paymentSection'])->name('paymentSection');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/countries', [CountryController::class, 'index'])->name('countries');
    Route::get('/counties', [CountyController::class, 'index'])->name('counties');
    Route::get('/counties/{countryCode}', [CountyController::class, 'getCountiesByCountryCode']);
    Route::get('/constituencies', [ConstituencyController::class, 'index'])->name('constituencies');
    Route::get('/constituencies/{name}', [ConstituencyController::class, 'getConstituencyByName']);
    Route::get('/titles/{name}', [TitleController::class, 'getTitleByName']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::post('/setFinancialYear', [AdminDashboardController::class, 'setFinancialYear'])->name('set-financial-year');

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
            Route::get('/member/view/{id}/referred', [MemberController::class, 'referred'])->name('referred');
            Route::get('/member/view/{id}/donations', [MemberController::class, 'donations'])->name('donations');
            Route::post('/member/update/{id}', [MemberController::class, 'update'])->name('update');
            Route::get('/member/delete/{id}', [MemberController::class, 'delete'])->name('delete');
        });

        Route::name('employees.')->group(function () {
            Route::get('/employees', [EmployeeController::class, 'index'])->name('index');
            Route::post('/employees/store', [EmployeeController::class, 'store'])->name('store');
            Route::get('/employees/view/{id}', [EmployeeController::class, 'view'])->name('view');
            Route::get('/employees/status/{id}', [EmployeeController::class, 'status'])->name('status');
        });

        Route::name('members.')->group(function () {
            Route::get('/members', [MemberController::class, 'index'])->name('index');
        });


        Route::name('donation.')->group(function () {
            Route::get('/donation', [DonationController::class, 'index'])->name('index');
            Route::post('/donation/store', [DonationController::class, 'store'])->name('store');
        });

        Route::name('budget.')->group(function () {
            Route::get('/budget', [BudgetController::class, 'index'])->name('index');
            Route::post('/budget/store', [BudgetController::class, 'store'])->name('store');
            Route::get('/budget/edit/{id}', [BudgetController::class, 'edit'])->name('edit');
            Route::get('/budget/status/{id}', [BudgetController::class, 'status'])->name('status');
            Route::get('/budget/view/{id}', [BudgetController::class, 'view'])->name('view');
            // Route::get('/budget/show/{id}', [\App\Http\Controllers\BudgetController::class, 'show'])->name('show');
            Route::post('/budget/update/{id}', [BudgetController::class, 'update'])->name('update');
            Route::get('/budget/delete/{id}', [BudgetController::class, 'delete'])->name('delete');
        });
    });
});


require __DIR__ . '/auth.php';
