<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
         	UsersTableSeeder::class,
         	CoursesTableSeeder::class,
         	CategoriesTableSeeder::class,
         	ExercisesTableSeeder::class,
         	SessionsTableSeeder::class,
            UserCourseTableSeeder::class,
            CourseExerciseTableSeeder::class,
            CategoryExerciseTableSeeder::class,
            SessionExerciseTableSeeder::class,
            ScoresTableSeeder::class
         ]);
    }
}
