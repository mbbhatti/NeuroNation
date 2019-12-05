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
        $category_ids = App\Category::all('id')->pluck('id')->toArray();

        $data = [];
        foreach ($category_ids as $i => $id) {
            $data[] = ['name' => 'Exercise', 'category_id' => $id];
        }
        DB::table('exercises')->insert($data);
    }
}
