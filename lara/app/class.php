<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class class extends Model
{
    protected $table = 'class';
    public $timestamps = false;

    public function student_class()
    {
        return $this->belongsTo('App\student_class','class_id','class_id');
    }
}