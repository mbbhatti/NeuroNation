<?php

use Illuminate\Database\Seeder;

class UserCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course_ids = App\Course::all('id')->pluck('id')->toArray();
        $user_id = 1;
        $data = [];
        foreach ($course_ids as $id) {
            $data[] = ['user_id' => $user_id, 'course_id' => $id];
        }
        DB::table('user_course')->insert($data);
    }
}
