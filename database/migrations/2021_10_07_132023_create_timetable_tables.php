<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetableTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->foreignId('user_id');
            $table->timestamps();
        });

        Schema::create('days', function (Blueprint $table) {
            $table->id();
            $table->enum('dayofweek', ['Hétfő', 'Kedd', 'Szerda', 'Csütörtök', 'Péntek', 'Szombat', 'Vasárnap']);
            $table->foreignId('timetable_id');
            $table->timestamps();
        });

        Schema::create('day_excersise_types', function (Blueprint $table) {
            $table->foreignId('day_id');
            $table->foreignId('excersise_type_id');
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timetable');
        Schema::dropIfExists('day');
        Schema::dropIfExists('day_excersise_type');
    }
}
