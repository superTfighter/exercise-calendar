<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimetablePostRequest;
use App\Models\Day;
use App\Models\Timetable;
use Auth;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function getTimetables()
    {
        $timetables = Timetable::All();

        return view('timetable.all')->with(compact('timetables'));
    }

    public function view(Timetable $timetable)
    {
        return view('timetable.view')->with(compact('timetable'));
    }

    public function events(Timetable $timetable)
    {
        
        $events = array();

        $TdayOfWeek = date('N');
        foreach ($timetable->days()->get() as $day) {
            $DdayOfWeek = array_search($day->dayofweek, Day::DayOfWeek) + 1;

            $difference = $DdayOfWeek - $TdayOfWeek;

            $date = date('Y-m-d', strtotime((string) $difference . ' days'));

            foreach ($day->exercise_types()->get() as $exercise_type) {

                $event = [
                    'id' => uniqid(),
                    'title' => $exercise_type->name,
                    'start' => $date,
                    'allDay' => true,
                    'display' => 'list-item',
                    'url' => route('exercise_type.random',$exercise_type)
                ];

                array_push($events, $event);

            }

        }

        return $events;
    }

    public function store(TimetablePostRequest $request)
    {
        $input = $request->except('_token');

        $input['user_id'] = Auth::user()->id;

        Timetable::create($input);

        return redirect()->route('timetables');
    }

    public function edit(Timetable $timetable)
    {
        $days = Day::where('timetable_id',null)->get();

        return view('timetable.edit')->with(compact('timetable', 'days'));
    }

    public function update(TimetablePostRequest $request, Timetable $timetable)
    {
        $timetable->update($request->except('_token'));

        return redirect()->route('timetables');
    }

    public function addDayToTimetable(Request $request, Timetable $timetable)
    {

        $days = $request['days'];

        foreach ($days as $day) {

            $day = Day::where('id', $day)->first()->timetable()->associate($timetable)->save();
        }

        return redirect()->route('timetables');
    }

}
