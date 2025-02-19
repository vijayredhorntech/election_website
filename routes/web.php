<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\MemberRegistrationController;
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
use App\Http\Controllers\EventController;
use App\Http\Controllers\AccountSetting;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/donate', [PageController::class, 'donate'])->name('donate');
Route::get('/donner_details', [PageController::class, 'donnerDetails'])->name('donnerDetails');
Route::get('/payment_method', [PageController::class, 'paymentMethod'])->name('paymentMethod');

Route::get('/regions/{countryCode}', [RegionController::class, 'getRegionsByCountryCode']);
Route::get('/constituencies/{countryCode}', [ConstituencyController::class, 'getConstituenciesByCountryCode']);

Route::get('/join_us', [MemberRegistrationController::class, 'index'])->name('joinUs');
Route::get('/email_verification_otp', [MemberRegistrationController::class, 'sendEmailVerificationOtp'])->name('sendEmailVerificationOtp');
Route::post('/verify_otp', [MemberRegistrationController::class, 'verifyOtp'])->name('verifyOtp');
Route::get('/select_membership_plan', [MemberRegistrationController::class, 'selectMemberShipPlan'])->name('selectMemberShipPlan');
Route::post('/payment_gateway/{email}/{id}', [MemberRegistrationController::class, 'paymentGateway'])->name('paymentGateway');



Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/member_basic_information', [MemberRegistrationController::class, 'memberBasicInformation'])->name('memberBasicInformation');
    Route::post('/member_basic_information', [MemberRegistrationController::class, 'storeMemberBasicInformation'])->name('storeMemberBasicInformation');
    Route::get('/member_address_information', [MemberRegistrationController::class, 'memberAddressInformation'])->name('memberAddressInformation');
    Route::post('/member_address_information', [MemberRegistrationController::class, 'storeMemberAddressInformation'])->name('storeMemberAddressInformation');
    Route::get('/members_profile', [MemberController::class, 'memberProfile'])->name('memberProfile');
    Route::post('/members_security_info_update', [MemberController::class, 'securityInfoUpdate'])->name('securityInfoUpdate');



    Route::get('/countries', [CountryController::class, 'index'])->name('countries');
    Route::get('/counties', [CountyController::class, 'index'])->name('counties');
    Route::get('/counties/{countryCode}', [CountyController::class, 'getCountiesByCountryCode']);
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

        Route::name('donation.')->group(function () {
            Route::get('/donation', [DonationController::class, 'index'])->name('index');
            Route::post('/donation/store', [DonationController::class, 'store'])->name('store');
        });

        Route::name('budget.')->group(function () {
            Route::get('/budget', [BudgetController::class, 'index'])->name('index');
            Route::post('/budget/allot', [BudgetController::class, 'allotBudget'])->name('allot');
            Route::get('/budget/edit/{id}', [BudgetController::class, 'edit'])->name('edit');
            Route::get('/budget/status/{id}', [BudgetController::class, 'status'])->name('status');
            Route::get('/budget/view/{id}', [BudgetController::class, 'view'])->name('view');
            // Route::get('/budget/show/{id}', [\App\Http\Controllers\BudgetController::class, 'show'])->name('show');
            Route::post('/budget/update/{id}', [BudgetController::class, 'update'])->name('update');
            Route::get('/budget/delete/{id}', [BudgetController::class, 'delete'])->name('delete');
        });

        Route::name('events.')->group(function () {
            Route::get('/events', [EventController::class, 'index'])->name('index');
            Route::post('/events/store', [EventController::class, 'store'])->name('store');
        });

        Route::name('account-setting.')->group(function () {
            Route::get('/account-setting', [AccountSetting::class, 'index'])->name('index');
            Route::get('/account-setting/edit/expense/{id}', [AccountSetting::class, 'editExpenseCategory'])->name('edit.expense.category');
        });

        Route::name('expense.')->group(function () {
            Route::post('/expense/store', [ExpenseController::class, 'store'])->name('store');
            // Route::get('/expense/edit/{id}', [ExpenseController::class, 'edit'])->name('edit');
            Route::post('/expense/update/{id}', [ExpenseCategoryController::class, 'update'])->name('update');
        });

        Route::name('expense.category.')->group(function () {
            Route::post('/expense/category/store', [ExpenseCategoryController::class, 'store'])->name('store');
            Route::post('/expense/category/update/{id}', [ExpenseCategoryController::class, 'update'])->name('update');
        });

        Route::name('constituencies.')->group(function () {
            Route::get('/constituencies/next', [ConstituencyController::class, 'getPaginatedConstituency'])
                ->name('next');
            Route::post('/constituencies/store', [ConstituencyController::class, 'store'])->name('store');
            Route::post('/constituencies/update/{id}', [ConstituencyController::class, 'update'])->name('update');
        });
    });
});


require __DIR__ . '/auth.php';
