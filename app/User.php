<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Course;
use App\Score;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
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
     * Relationship with Score
     * One to Many
     *     
     * @return object
     */
    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
