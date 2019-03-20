<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoyenneCalculee extends Model
{
    //
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'moyennes_calculees';
}
