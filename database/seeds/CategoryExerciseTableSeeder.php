<?php

use Illuminate\Database\Seeder;

class CategoryExerciseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_ids = App\Category::all('id')->pluck('id')->toArray();
        $exercise_ids = App\Exercise::all('id')->pluck('id')->toArray();

        $data = [];
        foreach ($category_ids as $i => $id) {
            $data[] = ['exercise_id' => $exercise_ids[$i], 'category_id' => $id];
        }
        DB::table('category_exercise')->insert($data);
    }
}
