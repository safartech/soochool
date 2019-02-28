<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Retard extends Model
{
    protected $guarded=['id'];

    public function eleves(){
        return $this->belongsTo('App\Eleve');
    }
}
