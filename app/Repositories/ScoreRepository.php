<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Score;

class ScoreRepository implements ScoreRepositoryInterface
{
    /**
     * Get's user history detail.
     *     
     * @return object
     */
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