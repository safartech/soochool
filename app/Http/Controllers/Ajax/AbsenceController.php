<?php

namespace App\Http\Controllers\Ajax;

use App\Absent;
use App\Appel;
use App\Classe;
use App\Jour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbsenceController extends Controller
{
    //
    public function loadPlanningWithAbsences(){
        $classes = Classe::with('eleves.absences','cours.classe','cours.jour','cours.horaire','cours.matiere','cours.prof','cours.salle','cours.appels.absences')->get();
//        $jours = Jour::with('cours.classe','cours.matiere','cours.prof','cours.salle','cours.horaire')->get();
//        $horaires = Horaire::get();
//        $matieres = Matiere::get();
//        $profs = Personnel::get();
//        $salles = Salle::get();

        return compact('classes');
    }

    public function setAbsents(Request $request){
        $appel = Appel::updateOrCreate([
            'cours_id'=>$request->cours_id,
            'date'=>$request->date
        ],
            [
                'cours_id'=>$request->cours_id,
                'date'=>$request->date
            ]

            );
        $appel->absences()->sync($request->absents);
        return $appel;
    }
}
