<?php

namespace Database\Seeders;

use App\Models\Day;
use App\Models\Exercise;
use App\Models\ExerciseType;
use Illuminate\Database\Seeder;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::create(['dayofweek' => Day::DayOfWeek[0]]);
        Day::create(['dayofweek' => Day::DayOfWeek[1]]);
        Day::create(['dayofweek' => Day::DayOfWeek[2]]);
        Day::create(['dayofweek' => Day::DayOfWeek[3]]);
        Day::create(['dayofweek' => Day::DayOfWeek[4]]);
        Day::create(['dayofweek' => Day::DayOfWeek[5]]);
        Day::create(['dayofweek' => Day::DayOfWeek[6]]);

        $mell = ExerciseType::create(['name' => 'Mell']);
        $lab = ExerciseType::create(['name' => 'Láb']);
        $kar = ExerciseType::create(['name' => 'Kar']);

        Exercise::create(['name' => 'Fekvenyomás egyenespadon', 'link' => 'https://shopbuilder.hu/fekvenyomas-egyenes-padon-a2452', 'description' => 'A fekvenyomás egyenes padon igénybe veszi a mellkasi izmokat, a deltaizmokat és a tricepszet. A legtöbb testépítőbajnok a fekve nyomást tekinti a felsőtestgyakorlatok egyik legjobbjának.', 'exercise_type_id' => $mell->id]);

        Exercise::create(['name' => 'Fekvenyomás ferdepadon', 'link' => 'https://shopbuilder.hu/fekvenyomas-ferde-padon-a2455', 'description' => 'A fekvenyomás ferde padon a felső mellizmokat, a mellső deltaizmokat és háromfejű karizmokat veszi igénybe. Nagy előnye a gyakorlatnak, hogy előnyösebb formát kölcsönöz a mellizmoknak - gyakorlatilag pólón keresztül is jobban lehet majd látni :)', 'exercise_type_id' => $mell->id]);
        Exercise::create(['name' => 'Tárogatás kábellel ferdepadon', 'link' => 'https://shopbuilder.hu/tarogatas-kabellel-ferdepadon-a2464', 'description' => 'A tárogatás kábellel ferdepadon a mellizmok felső részét és a deltaizmokat fejleszti.', 'exercise_type_id' => $mell->id]);

        Exercise::create(['name' => 'Bicepsz állva francia rúddal', 'link' => 'https://shopbuilder.hu/bicepsz-allva-francia-ruddal-a2442', 'description' => 'A bicepsz állva francia rúddal hasonlóan terheli a bicepszedet, mint az egyenes rúddal végrehajtott bicepszhajlítás, de a csuklódat kevéssé terheli, valamint picivel nagyobb terhelést kap a brachioradialis izom.', 'exercise_type_id' => $kar->id]);
        Exercise::create(['name' => 'Bicepszgép', 'link' => 'https://shopbuilder.hu/bicepszgep-a2443', 'description' => 'A bicepszgép segítségével végzett bicepszezés rendkívül koncentráltan edzi meg a célizmot, valamint az alkar izmai másodlagos terhelést kapnak.'])->exercise_type()->associate($kar);
        Exercise::create(['name' => 'Csigás letolás', 'link' => 'https://shopbuilder.hu/csigas-letolas-a2520', 'description' => 'A csigás letolás az egyik legelterjedtebb tricepsz-fejlesztő gyakorlat, bár sokan megkérdőjelezik hatásosságát. Kiválóan képes hangsúlyozni a jellegzetes "lópatkót". Elsősorban izolációs gyakorlatként érdemes rá tekinteni.', 'exercise_type_id' => $kar->id]);

        Exercise::create(['name' => 'Ülő vádligép', 'link' => 'https://shopbuilder.hu/ulo-vadligep-a2539', 'description' => 'Ezt a gyakorlatot is egy speciális gépen kell végezni. A végzett mozdulat inkább a talpemelő izmot (soleus) mozgatja meg.', 'exercise_type_id' => $lab->id]);
        Exercise::create(['name' => 'Álló vádligép', 'link' => 'https://shopbuilder.hu/allo-vadligep-a2536', 'description' => 'Ez a gyakorlat a kétfejű lábikraizmot, azaz a vádlit, valamint a talpemelő izmot fejleszti.', 'exercise_type_id' => $lab->id]);
        Exercise::create(['name' => 'Vádligyakorlat lábtológépen', 'link' => 'https://shopbuilder.hu/vadligyakorlat-labtologepen-a2538', 'description' => 'A lábtoló gépes vádligyakorlat a kétfejű lábikra izmot dolgoztatja meg leginkább.', 'exercise_type_id' => $lab->id]);

    }
}
