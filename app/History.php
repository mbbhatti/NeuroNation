<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class History extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'score', 
        'date', 
        'category'
    ];

    /**
     * Get user progress history detail
     * Get user recent session categories     
     *     
     * @param int   $id     optional user id
     * @return object
     */
    public function getUserHistory(int $id = 0): object
    {
        $id = ($id == 0) ? Auth::user()->id : $id;

        $history = History::select(
                DB::raw('score, date, GROUP_CONCAT(category) AS category')
                )->where('user_id', $id)
                ->groupBy('session_id')
                ->orderBy('date', 'DESC')
                ->offset(0)
                ->limit(12)
                ->get();

        return $history;
    }
}
