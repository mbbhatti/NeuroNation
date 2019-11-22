<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
}
