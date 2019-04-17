<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scolarite extends Model
{
  protected $guarded=['id'];
  protected  $fillable=['classe_id','solde'];


public function niveau(){
      return $this->belongsTo('App\Niveau');
}
}
