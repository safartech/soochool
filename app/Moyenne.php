<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Moyenne extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }
}
