<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    //

    protected $table = 'niveaux';

    protected $fillable = [];

    public function filiere(){
        return $this->belongsTo('App\Filiere');
    }

    public function classes(){
        return $this->hasMany('App\Classe');
    }

    public function scolarite(){
        return $this->hasOne('App\Scolarite');
    }

    public function matieres(){
        return $this->belongsToMany('App\Matiere','dispenses','niveau_id','matiere_id');
    }

    public function ues(){
        return $this->hasMany(Dispense::class);
    }
}
