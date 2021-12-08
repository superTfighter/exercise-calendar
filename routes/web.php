<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});


Route::get('/test', [Controllers\HomeController::class, 'test']);

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
    Route::post('/timetable/{timetable}/edit', [Controllers\TimetableController::class, 'updateTimetable']);
    Route::post('/timetable/{timetable}/day/add', [Controllers\TimetableController::class, 'addDayToTimetable'])->name('timetable.add.day');

    
    Route::get('/day/{day}/edit', [Controllers\DayController::class, 'editDay'])->name('day.edit');
    Route::post('/day/{day}/edit', [Controllers\DayController::class, 'updateDay'])->name('day.edit');


    Route::post('/sign-out', [Controllers\Auth\SessionController::class, 'destroy'])->name('auth.logout');
});
