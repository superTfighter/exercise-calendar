<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Auth;
use App\Models\Timetable;
use Illuminate\Http\Request;
use App\Http\Requests\TimetablePostRequest;
use App\Models\ExerciseType;

class TimetableController extends Controller
{
    public function getTimetables()
    {
        $timetables = Timetable::All();
        
        return view('timetable.all')->with(compact('timetables'));
    }

    public function storeTimetable(TimetablePostRequest $request)
    {
        $input = $request->except('_token');

        $input['user_id'] = Auth::user()->id;

        Timetable::create($input);

        return redirect()->route('timetables');
    }

    public function editTimetable(Timetable $timetable)
    {   
        $exercise_types = ExerciseType::All();
        
        return view('timetable.edit')->with(compact('timetable','exercise_types'));
    }

    public function updateTimetable(TimetablePostRequest $request, Timetable $timetable)
    {

    }


}
