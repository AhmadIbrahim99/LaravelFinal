<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'price',
        'campuse_id',
    ];

    public function campuse()
    {
        return $this->belongsTo('App\Campuse');
    }

    public function types()
    {
        return $this->belongsToMany('App\Type', 'course_types');
    }
}
