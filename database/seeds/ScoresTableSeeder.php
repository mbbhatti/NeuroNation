<?php

use Illuminate\Database\Seeder;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $session_ids = App\Session::all('id')->pluck('id')->toArray();
        $user_id = 1;        
        foreach ($session_ids as $id) {            
            $data = ['score' => rand(0, 100), 'user_id' => $user_id, 'session_id' => $id];            
            DB::table('scores')->insert($data);
        }
    }
}
