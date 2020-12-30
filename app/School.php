<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];


    public function campuse()
    {
        return $this->hasOne('App\campuse');
    }


    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
