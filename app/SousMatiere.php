<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SousMatiere extends Model
{
    public function modules(){
        return $this->hasMany('App\Module');
    }

    public function matiere(){
        return $this->belongsTo('App\Matiere');
    }

    public function evaluations(){
        return $this->hasMany('App\Evaluation');
    }
}
