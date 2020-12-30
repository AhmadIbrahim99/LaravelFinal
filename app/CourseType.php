<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    protected $fillable = ['course_id', 'type_id'];

    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Type', 'type_id');
    }
}
/*Ahmad Ibrahim*/
