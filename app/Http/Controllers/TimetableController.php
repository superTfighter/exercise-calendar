<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Auth;
use App\Models\Timetable;
use Illuminate\Http\Request;
use App\Http\Requests\TimetablePostRequest;
use App\Models\ExerciseType;
use App\Models\Day;

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
        $days = Day::All();
        
        return view('timetable.edit')->with(compact('timetable','days'));
    }

    public function updateTimetable(TimetablePostRequest $request, Timetable $timetable)
    {
        $timetable->update($request->except('_token'));

        return redirect()->route('timetables');
    }

    public function addDayToTimetable(Request $request, Timetable $timetable)
    {

        $days = $request['days'];

        foreach ($days as $day) {

            $day = Day::where('id',$day)->first()->timetable()->associate($timetable)->save(); 
        }

        return redirect()->route('timetables');
    }

}
