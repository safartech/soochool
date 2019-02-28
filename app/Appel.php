<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Appel extends Model
{
    protected $fillable = ['seance_id','date'];

    public function seance(){
        return $this->belongsTo('App\Seance');
    }

    public function absences(){
        return $this->belongsToMany('App\Eleve','absences','appel_id','eleve_id')->withPivot(['justification']);
    }
}
