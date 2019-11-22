<?php

use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
    		['date' => date('Y-m-d H:i:s', strtotime( '-'.mt_rand(0,5).' days - 10 minute'))],
    		['date' => date('Y-m-d H:i:s', strtotime( '-'.mt_rand(0,10).' days - 15 minute'))],
    		['date' => date('Y-m-d H:i:s', strtotime( '-'.mt_rand(0,15).' days - 20 minute'))],
            ['date' => date('Y-m-d H:i:s', strtotime( '-'.mt_rand(0,20).' days - 25 minute'))],
            ['date' => date('Y-m-d H:i:s', strtotime( '-'.mt_rand(0,27).' days - 30 minute'))],
            ['date' => date('Y-m-d H:i:s', strtotime( '-'.mt_rand(0,30).' days - 35 minute'))],
            ['date' => date('Y-m-d H:i:s', strtotime( '-'.mt_rand(0,34).' days - 40 minute'))],
            ['date' => date('Y-m-d H:i:s', strtotime( '-'.mt_rand(0,36).' days - 45 minute'))],
            ['date' => date('Y-m-d H:i:s', strtotime( '-'.mt_rand(0,39).' days - 50 minute'))],
            ['date' => date('Y-m-d H:i:s', strtotime( '-'.mt_rand(0,44).' days - 55 minute'))],
            ['date' => date('Y-m-d H:i:s', strtotime( '-'.mt_rand(0,47).' days - 5 minute'))],
    		['date' => date('Y-m-d H:i:s', strtotime( '-'.mt_rand(0,55).' days - 9 minute'))],
            ['date' => date('Y-m-d H:i:s', strtotime( '-'.mt_rand(0,59).' days - 4 minute'))]
    	];
        DB::table('sessions')->insert($data);
    }
}
