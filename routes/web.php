<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->middleware('isAdmin')->name('home');
    Route::resource('users', UserController::class);
    Route::resource('jobs', JobController::class);
    Route::get('/users/{user}/profile', [UserController::class, 'profile'])->name('users.profile');
    Route::resource('applications', ApplicationController::class);
    Route::get('payment/{application}', [ApplicationController::class, 'paymentForm'])->name('applications.form');
    Route::post('payment', [ApplicationController::class, 'payment'])->name('payment.store');
    Route::get('applications/{job}/apply', [ApplicationController::class, 'apply'])->name('applications.apply');
    Route::resource('notifications', NotificationController::class);
});

Route::middleware(['auth', 'verifyadmin'])->group(function () {
    Route::resource('admin', AdminController::class);
    Route::resource('fees', FeeController::class);
    Route::get('applicationQuery/{id}', [ApplicationController::class, 'getAdminApplications'])->name('adminapplications');
    Route::get('notificationsQuery', [NotificationController::class, 'getAdminNotifications'])->name('adminnotifications');
    Route::get('feesQuery', [FeeController::class, 'getAdminFees'])->name('adminfees');
    Route::get('applicantsQuery', [UserController::class, 'getUsers'])->name('applicants');
    Route::get('userapplications/{id}', [UserController::class, 'showUserApplications'])->name('userapplications');
    Route::get('jobssQuery', [JobController::class, 'getJobs'])->name('jobs');
    Route::get('jobapplications/{id}', [JobController::class, 'jobApplications'])->name('jobapplications');
});