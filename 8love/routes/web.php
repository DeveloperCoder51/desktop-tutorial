<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\BlockListController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\CourseController;
use App\Http\Controllers\Web\DestinationController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\RequestProfileController;
use App\Http\Controllers\Web\UserController;
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

Route::get('/', [AuthController::class, 'login'])->name('login_view');
Route::post('/loginAction', [AuthController::class, 'loginAction'])->name('loginAction');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerAction', [AuthController::class, 'registerAction'])->name('registerAction');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile-edit', [ProfileController::class, 'index'])->name('profile_edit');
    Route::get('/profile', [ProfileController::class, 'show'])->name('show');
    Route::put('/profile/{id}',  [ProfileController::class, 'profile_update'])->name('profile_update');
    Route::post('/upload',[ProfileController::class, 'image_upload'])->name('image.upload');
    Route::post('/delete-media', [ProfileController::class, 'deleteMedia'])->name('delete.media');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
    Route::resource('/user',UserController::class);
    Route::patch('/user/{user}/block', [BlockListController::class, 'block'])->name('user.block');
    Route::patch('/user/{user}/unblock', [BlockListController::class, 'unblock'])->name('user.unblock');
    Route::get('/blocklist', [BlockListController::class, 'blocklist'])->name('blocklist');
    Route::get('/request-profile', [RequestProfileController::class, 'requestProfile'])->name('user.request_profile');
    Route::post('/process-requests', [RequestProfileController::class, 'processRequests'])->name('user.request_process');

    Route::get('/categories',[CategoryController::class, 'index'])->name('category.index');
    Route::get('/categories/create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories',[CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories/{id}/edit',[CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{id}delete',[CategoryController::class, 'destroy'])->name('category.destroy');
    Route::patch('/categories/{categories}/block', [CategoryController::class, 'block'])->name('category.block');
    Route::patch('/categories/{categories}/unblock', [CategoryController::class, 'unblock'])->name('category.unblock');
    Route::resource('/course',CourseController::class);
    Route::patch('/course/{course}/block', [CourseController::class, 'block'])->name('course.block');
    Route::patch('/course/{course}/unblock', [CourseController::class, 'unblock'])->name('course.unblock');
    Route::resource('/destinations',DestinationController::class);
    Route::patch('/destinations/{destinations}/block', [DestinationController::class, 'block'])->name('destinations.block');
    Route::patch('/destinations/{destinations}/unblock', [DestinationController::class, 'unblock'])->name('destinations.unblock');
});
