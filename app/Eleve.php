<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    //

    protected $guarded = ['id','classe'];

    protected $dates = ['date_nsce'];

    public function responsables(){
        return $this->belongsToMany('App\Responsable','lien_parentes');
    }

    public function matieres(){
        return $this->belongsToMany('App\Matiere','notes','eleve_id','matiere_id');
    }

    public function classe(){
        return $this->belongsTo('App\Classe');
    }

    public function tafs(){
        return $this->belongsToMany('App\Taf');
    }
    /*public function user(){
        return $this->belongsTo('App\User');
    }*/

    public function evaluations(){
        return $this->belongsToMany('App\Evaluation','notes','eleve_id')->withPivot(['id','note','taken']);
    }

    public function notes(){
        return $this->belongsToMany('App\Evaluation','notes','eleve_id')->withPivot(['id','note','taken']);
    }

    public function competences(){
        return $this->belongsToMany('App\Competence','epc','eleve_id')->withPivot(['session_id','validation']);
    }

    public function retardCounts(){
        return $this->hasMany(NbreRetard::class,'eleve_id');
    }

    public function absCounts(){
        return $this->hasMany(NbreAbsence::class,'eleve_id');
    }

    public function conseils(){
        return $this->hasMany(Conseil::class);
    }

    public function abs(){
        return $this->withCount('absents');
    }

    public function absents(){
        return $this->hasMany(Absent::class);
    }

    public function absences(){
        return $this->hasMany(Absence::class,'eleve_id');
    }

    public function retards(){
        return $this->hasMany(Retard::class);
    }

    public function appreciations(){
        return $this->hasMany(Appreciation::class);
    }

    public function moyennes(){
        return $this->hasMany(Moyenne::class,'eleve_id');
    }

    public function resultats(){
        return $this->hasMany(General::class,'eleve_id');
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        /*self::created(function($el){
            User::create([
                'name'=>$el->nom_complet,
                'email'=>strtolower($el->nom).$el->id."@sigma.com",
                'password'=>bcrypt("12345678"),
                'personnel_id'=>$el->id,
                'role_id'=>13,


            ]);

        });*/

        /*self::deleted(function($delEl){
            $user= User::where("eleve_id",$delEl->id)->first();
            User::destroy($user->id);
        });*/


    }
}
