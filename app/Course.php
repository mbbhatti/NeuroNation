<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Exercise;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Relationship with User
     * Many to Many
     *     
     * @return object
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
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
