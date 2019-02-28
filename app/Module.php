<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Module extends Model
{
    public function sousMatiere(){
        return $this->belongsTo('App\SousMatiere');
    }

    public function evaluations(){
        return $this->hasMany('App\Evaluation');
    }
}
