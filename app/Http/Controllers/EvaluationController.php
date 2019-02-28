<?php

namespace App\Http\Controllers;

use App\Eleve;
use App\Evaluation;
use App\Note;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    //
    public function loadEvaluations($classeId,$matiereId,$sessionId){

        $eleves = Eleve::with(['evaluations'=>function($q) use ($classeId, $matiereId,$sessionId){
            $q->where('session_id',$sessionId)->where('matiere_id',$matiereId)->orderByDesc('id');
        }])->where('classe_id',$classeId)->get();

        $evaluations = Evaluation::with('type')->where('classe_id',$classeId)
            ->where('session_id',$sessionId)
            ->where('matiere_id',$matiereId)
            ->orderByDesc('id')
            ->get();

        return compact('eleves','evaluations');
    }

    public function deleteEvaluation($id){
        Evaluation::find($id)->delete();
        return 200;
    }

    public function updateEvaluation($id,Request $request){
        Evaluation::find($id)->update($request->input());
        return 200;
    }

    public function createEvaluation(Request $request){
        Evaluation::create($request->input());
        return 450;
    }

    public function updateNote(Request $request){
        $note = Note::find($request->id);
        $note->update($request->input());
        return $note;
    }
}
