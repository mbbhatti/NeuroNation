<?php

use Illuminate\Database\Seeder;

class SessionExerciseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $session_ids = App\Session::all('id')->pluck('id')->toArray();
        $exercise_ids = App\Exercise::all('id')->pluck('id')->toArray();

        $data = [];
        foreach ($session_ids as $i => $id) {
            $data[] = ['exercise_id' => $exercise_ids[$i], 'session_id' => $id]; 
        }
        DB::table('session_exercise')->insert($data);
    }
}
