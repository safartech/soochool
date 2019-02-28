<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taf extends Model
{
    //
    protected $fillable = [];

    public function ctexte(){
        return $this->belongsTo('App\CahierTexte','cahier_texte_id');
    }

    public function eleves(){
        return $this->belongsToMany('App\Eleve');
    }
}
