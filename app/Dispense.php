<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispense extends Model
{
    //
    protected $fillable = ['niveau_id','matiere_id','coef'];

    public function niveau(){
        return $this->belongsTo(Niveau::class,'niveau_id');
    }

    public function matiere(){
        return $this->belongsTo(Matiere::class,'matiere_id');
    }
}
