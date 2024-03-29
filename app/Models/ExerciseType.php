<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function days(){

        return $this->belongsToMany(Day::class, 'day_excersise_type');
    }

}
