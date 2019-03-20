<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    //
    protected $table = "cours";

    protected $guarded = ['id'];

    public function matiere(){
        return $this->belongsTo('App\Matiere');
    }

    public function salle(){
        return $this->belongsTo('App\Salle');
    }

    public function classe(){
        return $this->belongsTo('App\Classe');
    }

    public function prof(){
        return $this->belongsTo('App\Personnel','personnel_id');
    }

    public function horaire(){
        return $this->belongsTo('App\Horaire','horaire_id');
    }

    public function seances(){
        return $this->hasMany(Seance::class,'cours_id');
    }

    public function jour(){
        return $this->belongsTo(Jour::class);
    }

    public function appels(){
        return $this->hasMany(Appel::class,'cours_id');
    }
}
