<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    protected $guarded = ['id'];


    public function eleve(){
        return $this->belongsTo('App\Eleve');
    }
}
