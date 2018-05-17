<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_class extends Model
{
    protected $table = 'student_class';
    public $timestamps = false;

    public function student()
    {
        return $this->hasMany('App\student','account','account');
    }

    public function class()
    {
        return $this->hasMany('App\class','class_id','class_id');
    }
}