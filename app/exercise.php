<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Course;
use App\Session;

class exercise extends Model
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
     * Relationship with Category
     * Many to Many
     *     
     * @return object
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Relationship with Course
     * Many to Many
     *     
     * @return object
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    /**
     * Relationship with Session
     * Many to Many
     *     
     * @return object
     */
    public function sessions()
    {
        return $this->belongsToMany(Session::class);
    }
}
