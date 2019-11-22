<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Score;
use App\Exercise;

class Session extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date'
    ];

    /**
     * Relationship with Score
     * Many to One
     *     
     * @return object
     */
    public function scores()
    {
        return $this->belongsTo(Score::class);
    }

    /**
     * Relationship with Exercise
     * Many to Many
     *     
     * @return object
     */
    public function exercises()
    {
        return $this->belongsToMany(Exercise::class);
    }
}
