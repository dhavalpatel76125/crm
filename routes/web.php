<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KYCController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
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
    return view('welcome');
});

// register with affilicate and without affiliate

Route::get('/register', [RegistrationController::class, 'index'])->name('register');
Route::get('/register/{code}', [RegistrationController::class, 'index'])->name('register.affiliate');


Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
Route::post('/register/{code}', [RegistrationController::class, 'store'])->name('register.store');


// login
Route::get('/login', [RegistrationController::class, 'login'])->name('login');
Route::post('/login', [RegistrationController::class, 'loginStore'])->name('login.store');

//middleware
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //my account
    Route::get('/my-account', [RegistrationController::class, 'myAccount'])->name('my.account');

    //change password
    Route::post('/change-password', [RegistrationController::class, 'changePassword'])->name('change.password');

    //logout
    Route::get('/logout', [RegistrationController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    // KYC
    Route::get('/kyc', [KYCController::class, 'index'])->name('kyc');
    //kyc datatable 
    Route::get('/kyc/datatable', [KYCController::class, 'datatable'])->name('kyc.datatable');

    //kyc edit
    Route::get('/kyc/{id}/edit', [KYCController::class, 'edit'])->name('kyc.edit');

    //kyc store
    Route::post('/kyc', [KYCController::class, 'store'])->name('kyc.store');

    //kyc update
    Route::post('/kyc/{id}', [KYCController::class, 'update'])->name('kyc.update');


    //refrell users list 
    Route::get('/referral', [DashboardController::class, 'refrellUsers'])->name('referral');
    Route::get('/referral/datatable', [DashboardController::class, 'refrellUsersDatatable'])->name('referral.datatable');


    // all users list]
    Route::get('/users', [DashboardController::class, 'users'])->name('users');

    // all users datatable
    Route::get('/users/datatable', [DashboardController::class, 'usersDatatable'])->name('users.datatable');

    // update role
    Route::post('/users/updaterole/{id}', [DashboardController::class, 'updateRole'])->name('users.update.role');

    //edit 
    Route::get('/users/{id}/edit', [DashboardController::class, 'edit'])->name('users.edit');

    //update
    Route::put('/users/{id}', [DashboardController::class, 'update'])->name('users.update');

    //delete
    Route::delete('/users/{id}/delete', [DashboardController::class, 'destroy'])->name('users.delete');

    // KYC add by admin /users/${data}/kyc
    Route::get('/users/{id}/kyc', [KYCController::class, 'addByAdmin'])->name('users.kyc.addByAdmin');

    // KYC store by admin
    Route::post('/users/kyc/byadmin', [KYCController::class, 'storeByAdmin'])->name('users.kyc.storeByAdmin');

    // all users kyc list
    Route::get('/users/kyc', [KYCController::class, 'allUsersKyc'])->name('users.kyc');

    // all users kyc datatable
    Route::get('/users/kyc/datatable', [KYCController::class, 'allUsersKycDatatable'])->name('users.kyc.datatable');

    // updateStatus
    Route::post('/users/kyc/updatestatus/{id}', [KYCController::class, 'updateStatus'])->name('users.kyc.updateStatus');

    // add money approval
    Route::get('/users/{id}/money-approval', [DashboardController::class, 'addMoneyApproval'])->name('add.money.approval');

    // add money approval store
    Route::post('/users/money-approval', [DashboardController::class, 'addMoneyApprovalStore'])->name('add.money.approval.store');

    //student list of money approval
    Route::get('/students/money-approval', [DashboardController::class, 'studentMoneyApproval'])->name('student.money.approval');

    //student list of money approval datatable
    Route::get('/students/money-approval/datatable', [DashboardController::class, 'studentMoneyApprovalDatatable'])->name('student.money.approval.datatable');


    // courses crud with datatable
    //list
    Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');

    //datatable
    Route::get('/courses/datatable', [CoursesController::class, 'coursesDatatable'])->name('courses.datatable');

    //create
    Route::get('/courses/create', [CoursesController::class, 'create'])->name('courses.create');

    //store
    Route::post('/courses', [CoursesController::class, 'store'])->name('courses.store');

    //edit
    Route::get('/courses/{id}/edit', [CoursesController::class, 'edit'])->name('courses.edit');

    //update
    Route::put('/courses/{id}', [CoursesController::class, 'update'])->name('courses.update');

    //delete
    Route::delete('/courses/{id}/delete', [CoursesController::class, 'destroy'])->name('courses.delete');


    // show all course to user
    Route::get('/allcourses', [CoursesController::class, 'showallcourses'])->name('allcourses.show');

    // show one course to user
    Route::get('/course/{id}', [CoursesController::class, 'show'])->name('course.show');


    // show referal link 
    Route::get('/referal-link', [DashboardController::class, 'referalLink'])->name('referal.link');

    // bank details
    Route::get('/bank-details', [DashboardController::class, 'bankDetails'])->name('bank.details');

    //batches index function
    Route::get('/batches', [BatchController::class, 'index'])->name('batches.index');

    //batches datatable
    Route::get('/batches/datatable', [BatchController::class, 'batchesDatatable'])->name('batches.datatable');

    //batches create
    Route::get('/batches/create', [BatchController::class, 'create'])->name('batches.create');

    //batches store
    Route::post('/batches', [BatchController::class, 'store'])->name('batches.store');

    //batches edit
    Route::get('/batches/{id}/edit', [BatchController::class, 'edit'])->name('batches.edit');

    //batches update
    Route::put('/batches/{id}', [BatchController::class, 'update'])->name('batches.update');

    //batches delete
    Route::delete('/batches/{id}/delete', [BatchController::class, 'destroy'])->name('batches.delete');

});

// Forgot password
Route::get('/forgot-password', [RegistrationController::class, 'forgotPassword'])->name('forgot.password');
//send mail to reset password
Route::post('/forgot-password', [RegistrationController::class, 'sendResetLink'])->name('forgot.password.send');

//reset password
Route::get('/reset-password', [RegistrationController::class, 'resetPassword'])->name('reset.password');

//reset password
Route::post('/reset-password', [RegistrationController::class, 'resetPasswordPost'])->name('password.update');
