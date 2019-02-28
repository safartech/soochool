<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Evaluation extends Model
{

    protected $guarded = ['id','type'];

    public function notes(){
        return $this->hasMany(Note::class);
    }

    public function session(){
        return $this->belongsTo('App\Session');
    }

    public function classe(){
        return $this->belongsTo('App\Classe');
    }

    public function matiere(){
        return $this->belongsTo('App\Matiere');
    }

    public function sousMatiere(){
        return $this->belongsTo('App\SousMatiere');
    }
    public function module(){
        return $this->belongsTo('App\Module');
    }


    public function eleves(){
        return $this->belongsToMany('App\Eleve','notes','evaluation_id')->withPivot(['id','note']);
    }

    public function type(){
        return $this->belongsTo("App\EvaluationType",'type_id');
    }

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($ev){
            $ev->notes()->delete();
        });

        self::created(function($ev){
            $eval = Evaluation::with('classe.eleves')->find($ev->id);
            foreach ($eval->classe->eleves as $eleve){
                $eval->eleves()->attach($eleve->id,['note'=>null]);
            }
        });
    }




}
