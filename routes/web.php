<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::get('/register', [AuthController::class, 'registerView']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');

    Route::get('/categories', [CategoryController::class, 'index'])->middleware('admin');
    Route::get('/add-category', [CategoryController::class, 'addView'])->middleware('admin');
    Route::post('/add-category', [CategoryController::class, 'store'])->middleware('admin');
    Route::get('/edit-category/{slug}', [CategoryController::class, 'edit'])->middleware('admin');
    Route::put('/edit-category/{slug}', [CategoryController::class, 'update'])->middleware('admin');
    Route::delete('/destroy-category/{slug}', [CategoryController::class, 'destroy'])->middleware('admin');
    Route::get('/deleted-category', [CategoryController::class, 'deletedCategory'])->middleware('admin');
    Route::get('/restore-category/{slug}', [CategoryController::class, 'restore'])->middleware('admin');
    
    Route::get('/books', [BookController::class, 'index'])->middleware('admin');
    Route::get('/add-book', [BookController::class, 'add'])->middleware('admin');
    Route::post('/add-book', [BookController::class, 'store'])->middleware('admin');
    Route::get('/edit-book/{slug}', [BookController::class, 'edit'])->middleware('admin');
    Route::put('/edit-book/{slug}', [BookController::class, 'update'])->middleware('admin');
    Route::delete('/destroy-book/{slug}', [BookController::class, 'destroy'])->middleware('admin');

    Route::get('/users', [UserController::class, 'index'])->middleware('admin');
    Route::get('/user-approval', [UserController::class, 'approval'])->middleware('admin');
    Route::get('/user-approval/{slug}', [UserController::class, 'approvalUpdate'])->middleware('admin');
    Route::delete('/destroy-user/{slug}', [UserController::class, 'destroy'])->middleware('admin');
    Route::get('/user-banned', [UserController::class, 'banned'])->middleware('admin');
    Route::get('/user-unbanned/{slug}', [UserController::class, 'restore'])->middleware('admin');
    Route::get('/detail-user/{slug}', [UserController::class, 'show'])->middleware('admin');

    Route::get('/rent-logs', [RentLogController::class, 'index'])->middleware('admin');
    Route::get('/add-rent', [RentLogController::class, 'add'])->middleware('admin');
    Route::post('/add-rent', [RentLogController::class, 'store'])->middleware('admin');
    Route::put('/return-book/{id}', [RentLogController::class, 'update'])->middleware('admin');

    Route::get('/profile/{slug}',[UserController::class, 'profileView']);
    Route::put('/profile/{slug}',[UserController::class, 'updateProfile']);

    Route::get('/dashboard-client', [DashboardClientController::class, 'index'])->middleware('client');

    Route::get('/logout', [AuthController::class, 'logout']);
});


Route::get('/', [PublicController::class, 'index'])->name('books-list');