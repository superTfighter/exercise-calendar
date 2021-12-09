<?php

namespace App\Http\Controllers;

use App\Models\ExerciseType;
use App\Models\Timetable;
use App\Models\Exercise;
use Auth;

class HomeController extends Controller
{

    public function test()
    {
        var_dump(Exercise::where('exercise_type_id', 1)->first());
    
        

       
      
    }

    public function index()
    {
        $user = Auth::user();

        $timetables = Timetable::where('user_id', $user->id)->get();

        return view('home.index')->with(compact('user','timetables'));
    }
}
