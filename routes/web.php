<?php

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

Route::get('/', function () {
    if (env('MAINTENANCE_MODE_ENABLED')) {
        return view('construction');
    } else {
        return view('home');
    }
})->name('home');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/mail', function () {
    $validated = [
        'name' => 'Humphrey Yeboah',
        'email' => 'humphreyyeboah@gmail.com',
        'message' => 'Hello Humphrey I would like to discuss us working together to build a website for my company'
    ];
    return new App\Mail\ContactMessage($validated);
});

Route::get('/under-construction', function () {
    return view('construction');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::view('admin/profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
