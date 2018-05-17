<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table = 'student';
    public $timestamps = false;

    public function student_class()
    {
        return $this->belongsTo('App\student_class','account','account');
    }
}