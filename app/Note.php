<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Note extends Model
{
    protected $guarded = ['id'];

    public function evaluation(){
        return $this->belongsTo('App\Evaluation');
    }

    public function eleve(){
        return $this->belongsTo('App\Eleve');
    }


}
