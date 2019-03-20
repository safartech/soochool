<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    //

   // protected $fillable = [];
    protected $guarded = ['id'];

    public function groupe(){
        return $this->belongsTo('App\MatiereGroupe');
    }

    /*public function profs(){
        return $this->belongsToMany('App\Personnel','enseignes','matiere_id','personnel_id');
    }*/

    public function profs(){
        return $this->belongsToMany('App\Personnel','interventions','matiere_id','personnel_id');
    }

    public function niveaux(){
        return $this->belongsToMany('App\Niveau','dispenses','matiere_id','niveau_id')->withPivot(['id','coef']);
    }

    public function dispenses(){
        return $this->hasMany('App\Dispense');
    }

    public function eleves(){
        return $this->belongsToMany('App\Eleve','notations','matiere_id','eleve_id');
    }

    public function interventions(){
        return $this->hasMany('App\Intervention');
    }

    public function sousMatieres(){
        return $this->hasMany('App\SousMatiere');
    }

    public function evaluations(){
        return $this->hasMany('App\Evaluation');
    }

    public function domaines(){
        return $this->hasMany('App\Domaine');
    }

    public function interros(){
        return $this->hasMany(Evaluation::class)->where('type_id',1);
    }

    public function ds(){
        return $this->hasMany(Evaluation::class)->where('type_id',2);
    }
    public function dms(){
        return $this->hasMany(Evaluation::class)->where('type_id',4);
    }
    public function compos(){
        return $this->hasMany(Evaluation::class)->where('type_id',3);
    }

    public function appreciations(){
        return $this->hasMany(Appreciation::class);
    }

    public function moyennes(){
        return $this->hasMany(Moyenne::class);
    }

}
