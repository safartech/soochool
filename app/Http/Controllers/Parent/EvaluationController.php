<?php

namespace App\Http\Controllers\Parent;

use App\Classe;
use App\Eleve;
use App\Evaluation;
use App\EvaluationType;
use App\Responsable;
use App\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{

    public function showNotesPage(){
        return view('espaces.parent.evaluations.notes');
    }

    public function showRelevesPage(){
        return view('espaces.parent.evaluations.releves');
    }

    public function showComposPage(){
        return view('espaces.parent.evaluations.compos');
    }

    public function showBulletinsPage(){
        return view('espaces.parent.evaluations.bulletins');
    }

    public function loadNotesDatasFromParent(){
        $responsable_id= Auth::user()->responsable_id; //get the  responsable id
        $responsable=  Responsable::with('eleves.classe.niveau.matieres','eleves.evaluations')->find($responsable_id);
      //  $eleves=$responsable->eleves;
        $classes = Classe::with([
            'niveau.matieres',
            'eleves.responsables'
        ])->get();


     $eleves=$responsable->eleves;
     //$classes=$responsable->eleves->classe;

        $sessions = Session::get();
        $types = EvaluationType::get();

        return compact('eleves','classes','sessions','types');
    }

    public function loadBulletinsDatasFromParent(){
        $responsable_id= Auth::user()->responsable_id; //get the  responsable id
        $responsable=  Responsable::with('eleves.classe')->where('id',$responsable_id)->find($responsable_id);
        $eleves = $responsable->eleves;
        $sessions = Session::get();
        return compact('eleves','sessions');
    }

    public function loadEvaluations($eleveId,$matiereId,$sessionId){
        $classe = Eleve::with('classe')->find($eleveId)->classe;

        $evaluations = Evaluation::with([
            'type',
            'notes'=>function($q) use ($eleveId){
            $q->where('eleve_id',$eleveId);
        }
        ])->where('classe_id',$classe->id)
            ->where('classe_id',$classe->id)
            ->where('session_id',$sessionId)
            ->where('matiere_id',$matiereId)
            ->orderByDesc('id')
            ->get();

        return compact('evaluations');
    }


}
