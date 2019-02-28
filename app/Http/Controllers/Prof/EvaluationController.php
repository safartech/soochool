<?php

namespace App\Http\Controllers\Prof;

use App\Classe;
use App\EvaluationType;
use App\Intervention;
use App\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    //
    public function showNotesPage(){
        return view('espaces.prof.evaluations.notes');
    }

    public function showRelevesPage(){
        return view('espaces.prof.evaluations.releves');
    }

    public function showComposPage(){
        return view('espaces.prof.evaluations.compos');
    }


    public function showBulletinsPage(){
        return view('espaces.prof.evaluations.bulletins');
    }

    public function loadNotesDatasFromProf(){
        $profId = Auth::user()->personnel_id;
        $interventions = Intervention::with('matiere','classes.eleves')->where('personnel_id',$profId)->get();
//        return $interventions;

        /*$classes = Classe::with([
            'niveau.matieres',
            'eleves',
        ])->get();*/
        $sessions = Session::get();
        $types = EvaluationType::get();

        return compact('sessions','types','interventions');
    }

    public function loadBulletinsDatasFromProf(){
        $profId=Auth::user()->personnel_id;
        $classes = Classe::with('eleves')->whereHas('interventions',function($q) use ($profId){
            $q->where('personnel_id',$profId);
        })->get();
        $sessions = Session::get();
        return compact('classes','sessions');
    }
}
