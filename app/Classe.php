<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    //
    protected $fillable = [];

    public function niveau(){
        return $this->belongsTo('App\Niveau','niveau_id');
    }

    public function eleves(){
        return $this->hasMany('App\Eleve')->orderBy('nom_complet');
    }

    public function salle(){
        return $this->belongsTo('App\Salle');
    }

    public function cours(){
        return $this->hasMany('App\Cours');
    }

    /*public function profs(){
        return $this->belongsToMany('App\Personnel','interventions','classe_id','personnel_id');
    }*/

    /*public function interventions(){
        return $this->belongsToMany('App\Intervention','classe_intervention');
    }*/

    public function interventions(){
        return $this->hasMany(Intervention::class,'classe_id');
    }

    public function evaluations(){
        return $this->hasMany('App\Evaluation');
    }

    public function prof(){
        return $this->belongsTo(Personnel::class,'personnel_id');
    }
    /*public function salleId(){
        return $this->belongsTo('App\Salle');
    }*/

}
