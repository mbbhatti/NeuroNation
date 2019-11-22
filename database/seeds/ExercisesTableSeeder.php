<?php

use Illuminate\Database\Seeder;

class ExercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
    		['name' => 'Exercise1'],
    		['name' => 'Exercise2'],
    		['name' => 'Exercise3'],
    		['name' => 'Exercise4'],
            ['name' => 'Exercise5'],
            ['name' => 'Exercise6'],
            ['name' => 'Exercise7'],
            ['name' => 'Exercise8'],
            ['name' => 'Exercise9'],
            ['name' => 'Exercise10'],
            ['name' => 'Exercise11'],
            ['name' => 'Exercise12'],
            ['name' => 'Exercise13']
    	];
        DB::table('exercises')->insert($data);
    }
}
