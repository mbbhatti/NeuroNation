<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
    		['name' => 'Memory'],
    		['name' => 'Reasoning'],
    		['name' => 'Perception'],
    		['name' => 'Concentration'],
            ['name' => 'Admin'],
            ['name' => 'Finance'],
            ['name' => 'Marketing'],
            ['name' => 'Development'],
            ['name' => 'Networking'],
            ['name' => 'Sale'],
            ['name' => 'Operation'],
            ['name' => 'Service'],
            ['name' => 'Social']
    	];
        DB::table('categories')->insert($data);
    }
}
