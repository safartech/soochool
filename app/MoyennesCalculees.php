<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoyennesCalculees extends Model
{
    //
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'moyennes_calculees';
}