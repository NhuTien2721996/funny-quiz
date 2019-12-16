<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function quizzes(){
        return $this->hasMany('App\Quiz');
    }
}
