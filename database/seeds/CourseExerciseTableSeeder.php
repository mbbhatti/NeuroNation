<?php

use Illuminate\Database\Seeder;

class CourseExerciseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course_ids = App\Course::all('id')->pluck('id')->toArray();
        $exercise_ids = App\Exercise::all('id')->pluck('id')->toArray();

        $data = [];
        foreach ($course_ids as $i => $id) {
            $data[] = ['exercise_id' => $exercise_ids[$i], 'course_id' => $id];
        }
        DB::table('course_exercise')->insert($data);
    }
}
