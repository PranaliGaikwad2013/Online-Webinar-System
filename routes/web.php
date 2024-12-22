<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WebinarController;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LocationController;

Route::get('/',[AdminController::class, 'home']);
Route::get('/dashboard',[AdminController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('admin/dashboard', [AdminController::class, 'index'])->middleware(['auth','admin']);
//Webinar Route

Route::get('create_webinar', [WebinarController::class, 'create_webinar'])->middleware(['auth','admin']);
Route::post('upload_webinar', [WebinarController::class, 'upload_webinar'])->middleware(['auth','admin']);
Route::get('view_webinar', [WebinarController::class, 'view_webinar'])->middleware(['auth','admin']);
Route::get('delete_webinar/{id}', [WebinarController::class, 'delete_webinar'])->middleware(['auth','admin']);
Route::get('edit_webinar/{id}', [WebinarController::class, 'edit_webinar'])->middleware(['auth','admin']);
Route::post('update_webinar/{id}', [WebinarController::class, 'update_webinar'])->middleware(['auth','admin']);
Route::get('webinar_search', [WebinarController::class, 'webinar_search'])->middleware(['auth','admin']);
//Category Route
Route::get('view_category', [CategoryController::class, 'view_category'])->middleware(['auth','admin']);
Route::post('add_category', [CategoryController::class, 'add_category'])->middleware(['auth','admin']);
Route::get('delete_category/{id}', [CategoryController::class, 'delete_category'])->middleware(['auth','admin']);
Route::get('edit_category/{id}', [CategoryController::class, 'edit_category'])->middleware(['auth','admin']);
Route::post('update_category/{id}', [CategoryController::class, 'update_category'])->middleware(['auth','admin']);

//User Route
Route::get('create_user', [WebinarController::class, 'create_user'])->middleware(['auth','admin']);
Route::post('upload_user', [WebinarController::class, 'upload_user'])->middleware(['auth','admin']);
Route::get('user_list', [WebinarController::class, 'user_list'])->middleware(['auth','admin']);
Route::get('edit_user/{id}', [WebinarController::class, 'edit_user'])->middleware(['auth','admin']);
Route::post('update_user/{id}', [WebinarController::class, 'update_user'])->middleware(['auth','admin']);
Route::get('delete_user/{id}', [WebinarController::class, 'delete_user'])->middleware(['auth','admin']);
Route::get('user_search', [WebinarController::class, 'user_search'])->middleware(['auth','admin']);

//Email Verification
Route::get('view_email', [WebinarController::class, 'view_email'])->middleware(['auth','admin']);
Route::get('delete_email/{id}', [WebinarController::class, 'delete_email'])->middleware(['auth','admin']);

//Webinar Register
Route::get('web_register/{id}', [AdminController::class, 'web_view'])->middleware(['auth', 'verified']);
Route::post('store_register', [AdminController::class, 'store']);

//Details of webinar
Route::get('web_details/{id}', [AdminController::class, 'web_details']);

//Webinar register list
Route::get('web_list', [WebinarController::class, 'view_register'])->middleware(['auth','admin']);
Route::get('delete_list/{id}', [WebinarController::class, 'delete_list'])->middleware(['auth','admin']);
Route::get('register_search', [WebinarController::class, 'register_search'])->middleware(['auth','admin']);

//Payment
Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');

//Logo and Account management
Route::get('admin/settings', [SettingController::class, 'setting'])->middleware(['auth','admin']);
Route::post('admin/settings/edit', [SettingController::class, 'setting_edit'])->middleware(['auth','admin']);

Route::get('admin/account', [SettingController::class, 'account_setting'])->middleware(['auth','admin']);


//Address------Start
Route::get('admin/countries', [LocationController::class, 'countries_index'])->middleware(['auth','admin']);
Route::get('admin/countries/add', [LocationController::class,'countries_add']);
Route::post('admin/countries/add', [LocationController::class,'countries_post']);
Route::get('admin/countries/edit/{id}', [LocationController::class,'countries_edit']);
Route::post('admin/countries/edit/{id}', [LocationController::class,'countries_update']);
Route::get('admin/countries/delete/{id}', [LocationController::class,'countries_delete']);

Route::get('admin/state', [LocationController::class, 'state_index']);
Route::get('admin/state/add', [LocationController::class,'state_add']);
Route::post('admin/state/add', [LocationController::class,'state_post']);
Route::get('admin/state/edit/{id}', [LocationController::class,'state_edit']);
Route::post('admin/state/edit/{id}', [LocationController::class,'state_update']);
Route::get('admin/state/delete/{id}', [LocationController::class,'state_delete']);

Route::get('admin/city', [LocationController::class, 'city_index']);
Route::get('admin/city/add', [LocationController::class,'city_add']);

Route::get('get-states-record/{countryId}', [LocationController::class,'get_state_name']);
Route::post('admin/city/add', [LocationController::class,'city_insert']);
//Address------End