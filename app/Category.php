<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exercise;

class Category extends Model
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
