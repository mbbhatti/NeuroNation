<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("            
            CREATE TRIGGER history_trigger AFTER INSERT 
            ON `scores` FOR EACH ROW 
            BEGIN              
              INSERT INTO histories (`user_id`, `session_id`, `score`, `date`, `category`)
              SELECT 
                users.id AS user_id,
                sessions.id,
                scores.score,
                sessions.date,
                c.name AS category
              FROM
                users 
              LEFT JOIN scores 
                ON scores.user_id = users.id
              LEFT JOIN sessions 
                ON sessions.id = scores.session_id
              LEFT JOIN session_exercise AS se 
                ON se.session_id = sessions.id 
              LEFT JOIN `category_exercise` AS ce 
                ON ce.exercise_id = se.exercise_id
              LEFT JOIN categories AS c 
                ON c.id = ce.category_id;                  
            END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `history_trigger`');
    }
}
