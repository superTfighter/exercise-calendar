<?php

namespace App\Http\Controllers;

use App\Models\ExerciseType;
use App\Models\Exercise;

class ExerciseTypeController extends Controller
{
    public function getRandomExercises(ExerciseType $exercise_type)
    {
        $exercises = Exercise::where('exercise_type_id', $exercise_type->id)->get();

        return view('exercise_type.random')->with(compact('exercises'));
    }
}
