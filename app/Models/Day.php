<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    public const DayOfWeek = ['Hétfő', 'Kedd', 'Szerda', 'Csütörtök', 'Péntek', 'Szombat', 'Vasárnap'];

    public $fillable = ['dayofweek', 'timetable_id'];

    public function timetable()
    {
        return $this->belongsTo(Timetable::class);
    }

    public function exercise_types()
    {
        return $this->belongsToMany(ExerciseType::class, 'day_excersise_types');
    }

}
