<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    public $fillable = ['name', 'description', 'exercise_type_id'];


    public function exercise_type()
    {
        return $this->belongsTo(ExerciseType::class);
    }

}
