<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Session;

class Score extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'score'
    ];

    /**
     * Relationship with User
     * Many to One
     *     
     * @return object
     */
    public function users()
    {
        return $this->belongsTo(Score::class);
    }

    /**
     * Relationship with Session
     * One to Many
     *     
     * @return object
     */
    public function sessions()
    {
        return $this->belongsToMany(Session::class);
    }

    public function getHistory(int $id = 0): object
    {
        $id = ($id == 0) ? Auth::user()->id : $id;

        $result = User::select(
                DB::raw(
                    'scores.score, 
                     sessions.date, 
                     GROUP_CONCAT(categories.name) AS category'
                ))
                ->leftJoin('scores', 'scores.user_id', '=', 'users.id')
                ->leftJoin('sessions', 'sessions.id', '=', 'scores.session_id')                
                ->leftJoin('session_exercise', 'session_exercise.session_id', '=', 'sessions.id')
                ->leftJoin('exercises', 'exercises.id', '=', 'session_exercise.exercise_id')
                ->leftJoin('categories', 'categories.id', '=', 'exercises.category_id')
                ->where('users.id', $id)
                ->groupBy('sessions.id')
                ->orderBy('sessions.date', 'DESC')
                ->offset(0)
                ->limit(12)
                ->get();

        return $result;
    }
}
