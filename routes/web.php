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
    Route::post('/timetable/create', [Controllers\TimetableController::class, 'store'])->name('timetable.create');

    Route::get('/timetable/{timetable}/view', [Controllers\TimetableController::class, 'view'])->name('timetable.view');
    Route::get('/timetable/{timetable}/events', [Controllers\TimetableController::class, 'events'])->name('timetable.events');

    Route::get('/timetable/{timetable}/edit', [Controllers\TimetableController::class, 'edit'])->name('timetable.edit');
    Route::post('/timetable/{timetable}/edit', [Controllers\TimetableController::class, 'update']);
    Route::post('/timetable/{timetable}/day/add', [Controllers\TimetableController::class, 'addDayToTimetable'])->name('timetable.add.day');

    Route::get('/days', [Controllers\DayController::class, 'getDays'])->name('days');
    Route::post('/day/create', [Controllers\DayController::class, 'store'])->name('day.create');

    Route::get('/day/{day}/edit', [Controllers\DayController::class, 'edit'])->name('day.edit');
    Route::post('/day/{day}/edit', [Controllers\DayController::class, 'update'])->name('day.edit');

    Route::post('/day/{day}/add', [Controllers\DayController::class, 'addExerciesTypeToDay'])->name('day.add.exercise_type');


    Route::get('/exercise_type/{exercise_type}/getrandom', [Controllers\ExerciseTypeController::class, 'getRandomExercises'])->name('exercise_type.random');
    


    Route::post('/sign-out', [Controllers\Auth\SessionController::class, 'destroy'])->name('auth.logout');
});
