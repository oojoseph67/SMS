<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded = [];

    public function subcategories(){

        return $this->hasMany('App\Exam', 'exam_type');

    }
}
