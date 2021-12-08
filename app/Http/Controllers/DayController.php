<?php

namespace App\Http\Controllers;

use App\Http\Requests\DayPostRequest;
use App\Models\Day;
use App\Models\ExerciseType;
use Illuminate\Http\Request;

class DayController extends Controller
{

    public function getDays()
    {
        $days = Day::All();

        $daysofweek = Day::DayOfWeek;

        return view('day.all')->with(compact('daysofweek', 'days'));

    }

    public function store(DayPostRequest $request)
    {
        $data = $request->except('_token');

        Day::create(['dayofweek' => $data['dayofweek']]);

        return redirect()->route('days');
    }

    public function edit(Day $day)
    {
        $daysofweek = Day::DayOfWeek;

        $exercise_types = ExerciseType::All();

        return view('day.edit')->with(compact('exercise_types', 'daysofweek', 'day'));
    }

    public function update(DayPostRequest $request, Day $day)
    {
        $day->update($request->except('_token'));

        return redirect()->route('days');
    }

    public function addExerciesTypeToDay(Request $request, Day $day)
    {
        $exercise_types = $request['exercise_types'];

        foreach ($exercise_types as $exercise_type) {

            ExerciseType::where('id', $exercise_type)->first()->days()->attach($day);
        }

        return redirect()->route('days');

    }

}
