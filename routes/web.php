<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AboutsectionController;
use App\Http\Controllers\Backend\ApplicationController;
use App\Http\Controllers\Backend\AppointmentController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\ConcernController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GeneralsettingController;
use App\Http\Controllers\Backend\HomeofferController;
use App\Http\Controllers\Backend\HomesectionController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SocialiconController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontent\FrontendController;
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


Route::get('/', [FrontendController::class, 'index']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/service', [FrontendController::class, 'service']);
Route::get('/courses', [FrontendController::class, 'course']);
Route::get('/contact', [FrontendController::class, 'contact']);
Route::get('/apply', [FrontendController::class, 'apply']);
Route::post('/application-submit', [FrontendController::class, 'applicationsubmit'])->name('application.submit');
Route::post('/appointment-submit', [FrontendController::class, 'appointmentsubmit'])->name('appointment.submit');


Route::middleware('guest')->group(function () {
    Route::get('admin/login', [AuthController::class, 'login'])->name('login');
    Route::post('admin/login', [AuthController::class, 'login_submit']);
});


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('user/add', [UserController::class, 'add'])->name('user.add');
    Route::get('user/manage', [UserController::class, 'manage'])->name('user.manage');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('user/toggle-status/{id}', [UserController::class, 'toggleStatus'])->name('user.toggleStatus');

    Route::get('service/manage', [ServiceController::class, 'manage'])->name('service.manage');
    Route::get('service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('service/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::post('service/update/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::get('service/delete/{id}', [ServiceController::class, 'destroy'])->name('service.delete');
    Route::get('service/toggle-status/{id}', [ServiceController::class, 'toggleStatus'])->name('service.toggleStatus');

    Route::get('course/manage', [CourseController::class, 'manage'])->name('course.manage');
    Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('course/store', [CourseController::class, 'store'])->name('course.store');
    Route::get('course/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
    Route::post('course/update/{id}', [CourseController::class, 'update'])->name('course.update');
    Route::get('course/delete/{id}', [CourseController::class, 'destroy'])->name('course.delete');
    Route::get('course/toggle-status/{id}', [CourseController::class, 'toggleStatus'])->name('course.toggleStatus');

    Route::get('concern/manage', [ConcernController::class, 'manage'])->name('concern.manage');
    Route::get('concern/create', [ConcernController::class, 'create'])->name('concern.create');
    Route::post('concern/store', [ConcernController::class, 'store'])->name('concern.store');
    Route::get('concern/edit/{id}', [ConcernController::class, 'edit'])->name('concern.edit');
    Route::post('concern/update/{id}', [ConcernController::class, 'update'])->name('concern.update');
    Route::get('concern/delete/{id}', [ConcernController::class, 'destroy'])->name('concern.delete');
    Route::get('concern/toggle-status/{id}', [ConcernController::class, 'toggleStatus'])->name('concern.toggleStatus');

    Route::get('about/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('about/update/{id}', [AboutController::class, 'update'])->name('about.update');

    Route::get('aboutsection/manage', [AboutsectionController::class, 'manage'])->name('aboutsection.manage');
    Route::get('aboutsection/create', [AboutsectionController::class, 'create'])->name('aboutsection.create');
    Route::post('aboutsection/store', [AboutsectionController::class, 'store'])->name('aboutsection.store');
    Route::get('aboutsection/edit/{id}', [AboutsectionController::class, 'edit'])->name('aboutsection.edit');
    Route::post('aboutsection/update/{id}', [AboutsectionController::class, 'update'])->name('aboutsection.update');
    Route::get('aboutsection/delete/{id}', [AboutsectionController::class, 'destroy'])->name('aboutsection.delete');
    Route::get('aboutsection/toggle-status/{id}', [AboutsectionController::class, 'toggleStatus'])->name('aboutsection.toggleStatus');

    Route::get('contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::post('contact/update/{id}', [ContactController::class, 'update'])->name('contact.update');

    Route::get('generalsetting/edit', [GeneralsettingController::class, 'edit'])->name('generalsetting.edit');
    Route::post('generalsetting/update/{id}', [GeneralsettingController::class, 'update'])->name('generalsetting.update');

    Route::get('application/manage', [ApplicationController::class, 'manage'])->name('application.manage');
    Route::get('appointment/manage', [AppointmentController::class, 'manage'])->name('appointment.manage');


    Route::get('socialicon/manage', [SocialiconController::class, 'manage'])->name('socialicon.manage');
    Route::get('socialicon/create', [SocialiconController::class, 'create'])->name('socialicon.create');
    Route::post('socialicon/store', [SocialiconController::class, 'store'])->name('socialicon.store');
    Route::get('socialicon/edit/{id}', [SocialiconController::class, 'edit'])->name('socialicon.edit');
    Route::post('socialicon/update/{id}', [SocialiconController::class, 'update'])->name('socialicon.update');
    Route::get('socialicon/delete/{id}', [SocialiconController::class, 'destroy'])->name('socialicon.delete');
    Route::get('socialicon/toggle-status/{id}', [SocialiconController::class, 'toggleStatus'])->name('socialicon.toggleStatus');

    Route::get('homesection/edit', [HomesectionController::class, 'edit'])->name('homesection.edit');
    Route::post('homesection/update/{id}', [HomesectionController::class, 'update'])->name('homesection.update');

    Route::get('homeoffer/manage', [HomeofferController::class, 'manage'])->name('homeoffer.manage');
    Route::get('homeoffer/create', [HomeofferController::class, 'create'])->name('homeoffer.create');
    Route::post('homeoffer/store', [HomeofferController::class, 'store'])->name('homeoffer.store');
    Route::get('homeoffer/edit/{id}', [HomeofferController::class, 'edit'])->name('homeoffer.edit');
    Route::post('homeoffer/update/{id}', [HomeofferController::class, 'update'])->name('homeoffer.update');
    Route::get('homeoffer/delete/{id}', [HomeofferController::class, 'destroy'])->name('homeoffer.delete');
    Route::get('homeoffer/toggle-status/{id}', [HomeofferController::class, 'toggleStatus'])->name('homeoffer.toggleStatus');


    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});