<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
    		['name' => 'Math'],
    		['name' => 'PHP'],
    		['name' => 'Physics']
    	];
        DB::table('courses')->insert($data);
    }
}
