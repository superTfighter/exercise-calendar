<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Timetable;
use Illuminate\Http\Request;
use App\Http\Requests\TimetablePostRequest;

class TimetableController extends Controller
{
    public function getTimetables()
    {
        $timetables = Timetable::All();
        
        return view('timetable.all')->with(compact('timetables'));
    }

    public function createTimetable(TimetablePostRequest $request)
    {
        $input = $request->except('_token');

        $input['user_id'] = Auth::user()->id;

        Timetable::create($input);

        return redirect()->route('timetables');
    }
}
