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
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\MobileVerificationController;

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/manifesto', [PageController::class, 'manifesto'])->name('manifesto');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/code-of-conduct', [PageController::class, 'codeOfConduct'])->name('code-of-conduct');
Route::get('/leadership', [PageController::class, 'leadership'])->name('leadership');
Route::get('/policies', [PageController::class, 'policies'])->name('policies');
Route::get('/events', [PageController::class, 'events'])->name('events');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/memberShipDetails', [PageController::class, 'memberShipDetails'])->name('memberShipDetails');


Route::get('/donate', [PageController::class, 'donate'])->name('donate');
Route::get('/doner_details', [PageController::class, 'donnerDetails'])->name('donnerDetails');
Route::get('/payment_method', [PageController::class, 'paymentMethod'])->name('paymentMethod');

Route::get('/what_is_membership', [PageController::class, 'whatIsMembership'])->name('whatIsMembership');

Route::get('/referral/{code}', [MemberRegistrationController::class, 'referral'])->name('referral');

Route::get('/regions/{countryCode}', [RegionController::class, 'getRegionsByCountryCode']);
Route::get('/constituencies/{countryCode}', [ConstituencyController::class, 'getConstituenciesByCountryCode']);

Route::get('/join_us', [MemberRegistrationController::class, 'index'])->name('joinUs');
Route::get('/reset_otp', [MemberRegistrationController::class, 'resetOTP'])->name('resetOTP');
Route::get('/email_verification_otp', [MemberRegistrationController::class, 'sendEmailVerificationOtp'])->name('sendEmailVerificationOtp');
Route::post('/verify_otp', [MemberRegistrationController::class, 'verifyOtp'])->name('verifyOtp');
Route::post('/verify-mobile', [MobileVerificationController::class, 'verifyMobile'])->name('verifyMobile');
Route::post('/resend-mobile-otp', [MobileVerificationController::class, 'resendOTP'])->name('resendOTP');
Route::post('/validate-mobile-otp', [MobileVerificationController::class, 'validateOTP'])->name('validateOTP');
Route::get('/select_membership_plan', [MemberRegistrationController::class, 'selectMemberShipPlan'])->name('selectMemberShipPlan');
Route::post('/payment_gateway/{email}/{id}', [MemberRegistrationController::class, 'paymentGateway'])->name('paymentGateway');

// Route to check if the email is already in the database
Route::get('/check_email', [MemberRegistrationController::class, 'checkEmail'])->name('checkEmail');

// Route to check if the primary mobile number is already in the database
Route::get('/check_primary_mobile_number', [MemberRegistrationController::class, 'checkPrimaryMobileNumber'])->name('checkPrimaryMobileNumber');

// Route to check if the alternate mobile number is already in the database
Route::get('/check_alternate_mobile_number', [MemberRegistrationController::class, 'checkAlternateMobileNumber'])->name('checkAlternateMobileNumber');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/member_basic_information', [MemberRegistrationController::class, 'memberBasicInformation'])->name('memberBasicInformation');
    Route::post('/member_basic_information', [MemberRegistrationController::class, 'storeMemberBasicInformation'])->name('storeMemberBasicInformation');
    Route::get('/member_address_information', [MemberRegistrationController::class, 'memberAddressInformation'])->name('memberAddressInformation');
    Route::post('/member_address_information', [MemberRegistrationController::class, 'storeMemberAddressInformation'])->name('storeMemberAddressInformation');
    Route::get('/members_profile', [MemberController::class, 'memberProfile'])
        ->middleware('isMember')
        ->name('memberProfile');
    Route::post('/members_security_info_update', [MemberController::class, 'securityInfoUpdate'])->name('securityInfoUpdate');

    Route::get('/countries', [CountryController::class, 'index'])->name('countries');
    Route::get('/counties', [CountyController::class, 'index'])->name('counties');
    Route::get('/counties/{countryCode}', [CountyController::class, 'getCountiesByCountryCode']);
    Route::get('/titles/{name}', [TitleController::class, 'getTitleByName']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->middleware('isAdmin')->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::post('/setFinancialYear', [AdminDashboardController::class, 'setFinancialYear'])->name('set-financial-year');

        Route::get('/account-setting', [AccountSetting::class, 'index'])->name('account-setting');

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
            Route::get('/events/status/{id}', [EventController::class, 'status'])->name('status');
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

        Route::name('news.')->group(function () {
            Route::get('/news', [NewsController::class, 'index'])->name('index');
            Route::get('/news/create', [NewsController::class, 'create'])->name('create');
            Route::post('/news/store', [NewsController::class, 'store'])->name('store');
            Route::get('/news/{id}', [NewsController::class, 'show'])->name('show');
            Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('edit');
            Route::post('/news/update/{id}', [NewsController::class, 'update'])->name('update');
            Route::get('/news/delete/{id}', [NewsController::class, 'destroy'])->name('delete');
        });

        Route::name('report.')->group(function () {
            Route::get('/report', [ReportController::class, 'index'])->name('index');
        });

        Route::name('contact.')->group(function () {
            Route::get('/contact', [ContactController::class, 'index'])->name('index');
        });

        Route::name('settings.')->prefix('settings')->group(function () {
            // Titles Management
            Route::get('/titles', [TitleController::class, 'adminIndex'])->name('titles.index');
            Route::post('/titles/store', [TitleController::class, 'store'])->name('titles.store');
            Route::put('/titles/{id}', [TitleController::class, 'update'])->name('titles.update');
            Route::delete('/titles/{id}', [TitleController::class, 'destroy'])->name('titles.destroy');

            // Countries Management
            Route::get('/countries', [CountryController::class, 'adminIndex'])->name('countries.index');
            Route::post('/countries/store', [CountryController::class, 'store'])->name('countries.store');
            Route::put('/countries/{id}', [CountryController::class, 'update'])->name('countries.update');
            Route::delete('/countries/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');

            // Counties Management
            Route::get('/counties', [CountyController::class, 'adminIndex'])->name('counties.index');
            Route::post('/counties/store', [CountyController::class, 'store'])->name('counties.store');
            Route::put('/counties/{id}', [CountyController::class, 'update'])->name('counties.update');
            Route::delete('/counties/{id}', [CountyController::class, 'destroy'])->name('counties.destroy');

            // Constituencies Management
            Route::get('/constituencies', [ConstituencyController::class, 'adminIndex'])->name('constituencies.index');
            Route::post('/constituencies/store', [ConstituencyController::class, 'store'])->name('constituencies.store');
            Route::put('/constituencies/{id}', [ConstituencyController::class, 'update'])->name('constituencies.update');
            Route::delete('/constituencies/{id}', [ConstituencyController::class, 'destroy'])->name('constituencies.destroy');

            // Professions Management
            Route::get('/professions', [ProfessionController::class, 'index'])->name('professions.index');
            Route::post('/professions/store', [ProfessionController::class, 'store'])->name('professions.store');
            Route::put('/professions/{id}', [ProfessionController::class, 'update'])->name('professions.update');
            Route::delete('/professions/{id}', [ProfessionController::class, 'destroy'])->name('professions.destroy');

            // Education Management
            Route::get('/education', [EducationController::class, 'index'])->name('education.index');
            Route::post('/education/store', [EducationController::class, 'store'])->name('education.store');
            Route::put('/education/{id}', [EducationController::class, 'update'])->name('education.update');
            Route::delete('/education/{id}', [EducationController::class, 'destroy'])->name('education.destroy');
        });
    });
});

// Contact Form Submission
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

// Newsletter Subscription
Route::post('/subscribe', [PageController::class, 'subscribe'])->name('subscribe');

// Feedback Routes
use App\Http\Controllers\FeedbackController;

Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

require __DIR__ . '/auth.php';
