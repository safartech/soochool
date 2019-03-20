<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatiereArretee extends Model
{
    //
    protected $table = 'matieres_arretees';
    public $timestamps = false;
    protected $guarded = ['id'];
}
