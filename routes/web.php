<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Default routes
Route::view('/default', 'about')->name('about');
Route::view('/default-auth', 'about')->middleware(['auth', 'verified'])->name('about');
Route::view('/contact', 'contact')->middleware(['auth', 'verified'])->name('contact');
Route::view('/about', 'about')->middleware(['auth', 'verified'])->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// User login related
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::view('/', 'admin.index')->name('admin.dashboard');
    Route::redirect('/admin', '/admin/companies')->name('admin.dashboard');
    Route::get('/companies', [CompanyController::class, 'index'])->name('admin.companies');
    Route::get('/courses', [CourseController::class, 'admin'])->name('admin.courses');
    Route::get('/laptops', [LaptopController::class, 'admin'])->name('admin.laptops');
    Route::view('/users', 'admin.users')->name('admin.users');
});

// Company routes
Route::prefix('company')->group(function (): void {
    Route::get('/company', [CompanyController::class, 'index'])->middleware(['auth', 'admin'])->name('company.index');
    Route::post('/company/create', [CompanyController::class, 'create'])->middleware(['auth', 'admin'])->name('company.create');
    Route::put('/company/{id}/update', [CompanyController::class, 'update'])->middleware(['auth', 'admin'])->name('company.update');
    Route::delete('/company/{id}/delete', [CompanyController::class, 'delete'])->middleware(['auth', 'admin'])->name('company.delete');
});

// Course routes
Route::prefix('course')->group(function (): void {
    Route::get('/', [CourseController::class, 'index'])->middleware(['auth', 'verified'])->name('course.index');
    Route::get('/laptop/{course_id}', [LaptopController::class, 'index'])->middleware(['auth', 'verified'])->name('course.laptop');

    Route::post('/course/create', [CourseController::class, 'create'])->middleware(['auth', 'admin'])->name('course.create');
    Route::put('/course/{id}/update', [CourseController::class, 'update'])->middleware(['auth', 'admin'])->name('course.update');
    Route::delete('/course/{id}/delete', [CourseController::class, 'delete'])->middleware(['auth', 'admin'])->name('course.delete');

});

// Laptop routes
Route::prefix('laptop')->group(function (): void {
    Route::get('/details/{laptop_id}', [LaptopController::class, 'details'])->middleware(['auth', 'verified'])->name('laptop.details');

    Route::post('/create', [LaptopController::class, 'create'])->middleware(['auth', 'admin'])->name('laptop.create');
    Route::get('/{id}/edit', [LaptopController::class, 'edit'])->middleware(['auth', 'admin'])->name('laptop.edit');
    Route::put('/{id}/update', [LaptopController::class, 'update'])->middleware(['auth', 'admin'])->name('laptop.update');
    Route::delete('/{id}/delete', [LaptopController::class, 'destroy'])->middleware(['auth', 'admin'])->name('laptop.delete');
});

// Review routes
Route::prefix('review')->group(function (): void {
    Route::post('/review/{laptop_id}/create', [ReviewController::class, 'create'])->middleware(['auth', 'verified'])->name('review.create');
    Route::delete('/review/{review_id}/delete', [ReviewController::class, 'destroy'])->name('review.destroy');
});


require __DIR__ . '/auth.php';
