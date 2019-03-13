<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeAppreciation extends Model
{
    //
    public $timestamps = false;
    protected $table = 'types_appreciations';
    protected $guarded = ['id'];
}
