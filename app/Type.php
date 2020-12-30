<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name'];

    public function courses()
    {
        return $this->belongsToMany('App\Course', 'course_types');
    }
}
