<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Cours;
use App\Horaire;
use App\Jour;
use App\Matiere;
use App\Personnel;
use App\Salle;
use App\Seance;
use Illuminate\Http\Request;

class PlanningController extends Controller
{
    //

    public function storeCdt(Request $request){
        Seance::create($request->input());
        return 0;
    }

    public function loadPlanningForClassesFromAdmin(){
        $classes = Classe::with('cours.classe','cours.jour','cours.horaire','cours.matiere','cours.prof','cours.salle','cours.seances')->get();
        $jours = Jour::with('cours.classe','cours.matiere','cours.prof','cours.salle','cours.horaire')->get();
        $horaires = Horaire::get();
        $matieres = Matiere::get();
        $profs = Personnel::get();
        $salles = Salle::get();

        return compact('classes','jours','horaires','matieres','profs','salles');
    }

    public function loadClasseHoraire($classeId){
        $horaires = Horaire::with(['cours.classe'=>function($q) use ($classeId) {
            $q->where('id',$classeId);
        }])->get();

        return compact('horaires');
    }

    public function createCours(Request $request){
        $cours = Cours::create($request->input());
        $cours = Cours::with('classe','jour','horaire','matiere','prof','salle','seances')->find($cours->id);
//        $cours = Cours::with('matiere','prof','salle')->find($cours->id);
        return $cours;
    }


    // public function loadPlanningForProfsFromAdmin(){}
    //add by ken
    public function loadPlanningForProfsFromAdmin(){
        $profs = Personnel::with('cours.classe','cours.jour','cours.horaire','cours.matiere','cours.prof','cours.salle','cours.seances')->get();
        $jours = Jour::with('cours.classe','cours.matiere','cours.prof','cours.salle','cours.horaire')->get();
        $horaires = Horaire::get();
        $matieres = Matiere::get();
        $classes = Classe::with('cours.classe','cours.jour','cours.horaire','cours.matiere','cours.prof','cours.salle','cours.seances')->get();
        $salles = Salle::get();

        return compact('classes','jours','horaires','matieres','profs','salles');
    }

    public function loadProfHoraire($profId){
        $horaires = Horaire::with(['cours.prof'=>function($q) use ($profId) {
            $q->where('id',$profId);
        }])->get();

        return compact('horaires');
    }


    public function loadPlanningForSallesFromAdmin(){}
}
