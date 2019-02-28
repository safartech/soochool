<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Intervention extends Model
{
    protected $guarded = ['id'];

    public function prof(){
        return $this->belongsTo('App\Personnel','personnel_id');
    }

    public function matiere(){
        return $this->belongsTo('App\Matiere');
    }

    /*public function classes(){
        return $this->belongsToMany('App\Classe','classe_intervention')->withPivot(['classe_id']);
    }*/

    public function classe(){
        return $this->belongsTo(Classe::class);
    }

}
