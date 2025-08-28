<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserFilterController;
use App\Http\Controllers\InfoController;
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

Route::get('/', function () {
    return view('welcome');
});
  

Route::get('/user-dropdown', [InfoController::class, 'index'])->name('user-dropdown');
Route::get('/get-user-info', [InfoController::class, 'getUserInfo'])->name('user.info');


Route::get('/user-filter', [UserFilterController::class, 'index'])->name('admin.user_filter');


Route::get('/get-districts/{division}', [LocationController::class, 'getDistricts']);
Route::get('/get-upazilas/{district}', [LocationController::class, 'getUpazilas']);




//Registration
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);



//Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//profile
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');




// Post routes (available to all logged-in users)
Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('isPost','auth');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('isPost');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('isPost');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show')->middleware('isPost');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('isPost');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update')->middleware('isPost');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('isPost');


// Admin routes (check role manually in controller)
Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('{id}/users', [AdminController::class, 'listUsers'])->name('admin.users');
    Route::get('{id}/users/{userId}/edit-permissions', [AdminController::class, 'editPermissions'])->name('admin.editPermissions');
    Route::post('{id}/users/{userId}/update-permissions', [AdminController::class, 'updatePermissions'])->name('admin.updatePermissions');
});



