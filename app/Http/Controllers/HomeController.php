<?php

namespace App\Http\Controllers;

use App\Models\ExerciseType;
use App\Models\Exercise;
use Auth;

class HomeController extends Controller
{

    public function test()
    {
      
    }

    public function index()
    {
        $user = Auth::user();

        return view('home.index')->with(compact('user'));
    }
}
