<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\NewCampuseNotification;
use Notification;

class Campuse extends Model
{
    protected static function booted()
    {
        static::created(function ($campuse) {
            //send email to school
            $school_email = $campuse->school->email;
            //Notification::send($school_email, new NewCampuseNotification($campuse->name));
            Notification::route('mail', $school_email)
                ->notify(new NewCampuseNotification($campuse->name));
        });
    }

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'school_id',
    ];

    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
//Hamza Ayman
