<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/sign-up', [Controllers\Auth\RegisterController::class, 'create'])->name('auth.register');
    Route::post('/sign-up', [Controllers\Auth\RegisterController::class, 'store']);

    Route::get('/sing-in', [Controllers\Auth\SessionController::class, 'create'])->name('auth.login');
    Route::post('/sing-in', [Controllers\Auth\SessionController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/timetables', [Controllers\TimetableController::class, 'getTimetables'])->name('timetables');
    Route::post('/timetable/create', [Controllers\TimetableController::class, 'storeTimetable'])->name('timetable.create');

    Route::get('/timetable/{timetable}/edit', [Controllers\TimetableController::class, 'editTimetable'])->name('timetable.edit');

    Route::post('/sign-out', [Controllers\Auth\SessionController::class, 'destroy'])->name('auth.logout');
});
