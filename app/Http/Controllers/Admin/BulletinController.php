<?php

namespace App\Http\Controllers\Admin;

use App\Classe;
use App\Conseil;
use App\Dispense;
use App\Eleve;
use App\General;
use App\Intervention;
use App\Matiere;
use App\MatiereArretee;
use App\Moyenne;
use App\MoyenneCalculee;
use App\Niveau;
use App\Note;
use App\Session;
use App\TypeAppreciation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class BulletinController extends Controller
{
    //
    public function showMoyennesPage(){
        return view('espaces.admin.bulletins.moy-bloc');
    }


    public function loadDatasForBlocMoy(){
        $sessions = Session::get();
        $appreciations = TypeAppreciation::get();
        $niveaux = Niveau::with(['classes'=>function($q){$q->orderBy('nom');},'matieres'])->get();
        $eleves = Eleve::with('classe.niveau.matieres','appreciations','moyennes.matiere','resultats','conseils')->orderBy('nom_complet')->get();
        $classes = Classe::with(['matieresArretees','niveau.matieres','moyennesCalculees'])->orderBy('nom')->get();
        return compact('sessions','niveaux','eleves','classes','appreciations');
    }

    public function processBlocMoyennes(Request $request){

    }

    public function processBlocMoyennesForClasses(Request $request){
//        return $request->input();
        $classesIds = $request->classes;
        $sessionId = $request->session_id;
        $classes = Classe::with('eleves','niveau.matieres')->whereIn('id',$classesIds)->get();
        foreach ($classes as $classe){
            $eleves = $classe->eleves;
            $matieres = $classe->niveau->matieres;
            foreach ($eleves as $eleve){
                foreach ($matieres as $matiere){
                    $coef = Dispense::where('niveau_id',$eleve->classe->niveau->id)->where('matiere_id',$matiere->id)->first()->coef;
                    $coef = $coef!=null?$coef:$matiere->coef;
                    $profId = Intervention::where('classe_id',$eleve->classe->id)->where('matiere_id',$matiere->id)->first()->prof->id??null;
//            return $prof;

                    $interros = Note::where('eleve_id',$eleve->id)
                        ->where('sess_id',$sessionId)
                        ->where('mat_id', $matiere->id)
                        ->where('typ_id',1)
                        ->where('taken',1)
                        ->whereNotNull('note')
                        ->get();



                    $devoirs = Note::where('eleve_id',$eleve->id)
                        ->where('sess_id',$sessionId)
                        ->where('mat_id', $matiere->id)
                        ->where('typ_id',2)
                        ->where('taken',1)
                        ->whereNotNull('note')
                        ->get();


//            return $devoirs;
                    $compo = Note::where('eleve_id',$eleve->id)
                        ->where('sess_id',$sessionId)
                        ->where('mat_id', $matiere->id)
                        ->where('typ_id',3)
                        ->where('taken',1)
                        ->whereNotNull('note')
                        ->first();
//            return $compo;


                    /*$moy_interro = ($interros->count()!=0)?$interros->sum('note')/$interros->count():$interros->sum('note')/1;
                    $moy_devoir = ($devoirs->count()!=0)?$devoirs->sum('note')/$devoirs->count():$devoirs->sum('note')/1;
                    $note_compo = ($compo->count()!=0)?$compo->sum('note')/$compo->count():$compo->sum('note')/1;
                    $moy_classe = number_format(($moy_interro+$moy_devoir)/2,2);
                    $moy_gen = number_format(($note_compo+$moy_classe)/2,2);*/

                    $moy_interro = ($interros->count()!=0)?$interros->sum('note')/$interros->count():null;
                    $moy_devoir = ($devoirs->count()!=0)?$devoirs->sum('note')/$devoirs->count():null;
                    $note_compo = $compo->note??null;
                    $moy_classe = ($moy_interro!=null && $moy_devoir !=null)?number_format(($moy_interro+$moy_devoir)/2,2):null;
                    $moy_gen = ($note_compo!=null && $moy_classe!=null)?number_format(($note_compo+$moy_classe)/2,2):null;

                    Moyenne::updateOrCreate(
                        [
                        'eleve_id'=>$eleve->id,
                        'matiere_id'=>$matiere->id,
                        'session_id'=>$sessionId,
                    ],
                        [
                            "eleve_id" => $eleve->id,
                            "matiere_id" => $matiere->id,
                            "classe_id" => $eleve->classe->id,
                            "prof_id" => $profId,
                            "session_id" => $sessionId,
                            "coef" => $coef,
                            "moy_classe" => $moy_classe,
                            "moy_classe_coef" => ($moy_classe!=null)?$moy_classe*$coef:null,
                            "note_compo" => $note_compo,
                            "note_compo_coef" => ($note_compo!=null)?$note_compo*$coef:null,
                            "moy_gen" => $moy_gen,
                            "moy_gen_coef" => ($moy_gen!=null)?$moy_gen*$coef:null,
                            "moy_interro" => $moy_interro,
                            "moy_devoir" => $moy_devoir,
                        ]
                    );

                }
            }
            foreach ($matieres as $matiere){
                $gen_moyennes = Moyenne::where('classe_id',$classe->id)
                    ->where('matiere_id',$matiere->id)
                    ->where('session_id',$sessionId)
                    ->orderByDesc('moy_gen')
                    ->get();
                foreach ($gen_moyennes as $i=>$moyenne){
                    $moyenne->rang_gen = $i+1;
                    $moyenne->save();
                }
            }
            foreach ($matieres as $matiere){
                $gen_moyennes = Moyenne::where('classe_id',$classe->id)
                    ->where('matiere_id',$matiere->id)
                    ->where('session_id',$sessionId)
                    ->orderByDesc('note_compo')
                    ->get();
                foreach ($gen_moyennes as $i=>$moyenne){
                    $moyenne->rang_compo = $i+1;
                    $moyenne->save();
                }
            }

            foreach ($matieres as $matiere){
                MatiereArretee::updateOrCreate(
                  [
                      'classe_id'=>$classe->id,
                      'matiere_id'=>$matiere->id,
                      'session_id'=>$sessionId,
                  ],
                  [
                      'classe_id'=>$classe->id,
                      'matiere_id'=>$matiere->id,
                      'session_id'=>$sessionId,
                  ]
                );
            }
        }

        return 200;
    }

    public function processBlocMoyennesForEleve($eleveId,$sessionId){

        $eleve = Eleve::with(['classe.niveau.matieres.dispenses',
            'classe.niveau.matieres.interventions'])->find($eleveId);
        $matieres = $eleve->classe->niveau->matieres;
        foreach ($matieres as $matiere){
            $coef = Dispense::where('niveau_id',$eleve->classe->niveau->id)->where('matiere_id',$matiere->id)->first()->coef;
            $coef = $coef!=null?$coef:$matiere->coef;
            $profId = Intervention::where('classe_id',$eleve->classe->id)->where('matiere_id',$matiere->id)->first()->prof->id??null;
//            return $prof;

            $interros = Note::where('eleve_id',$eleveId)
                ->where('sess_id',$sessionId)
                ->where('mat_id', $matiere->id)
                ->where('typ_id',1)
                ->where('taken',1)
                ->whereNotNull('note')
                ->get();

            $devoirs = Note::where('eleve_id',$eleveId)
                ->where('sess_id',$sessionId)
                ->where('mat_id', $matiere->id)
                ->where('typ_id',2)
                ->where('taken',1)
                ->whereNotNull('note')
                ->get();

//            return $devoirs;
            $compo = Note::where('eleve_id',$eleveId)
                ->where('sess_id',$sessionId)
                ->where('mat_id', $matiere->id)
                ->where('typ_id',3)
                ->where('taken',1)
                ->whereNotNull('note')
                ->first();
//            return $compos;

            $moy_interro = ($interros->count()!=0)?$interros->sum('note')/$interros->count():null;
            $moy_devoir = ($devoirs->count()!=0)?$devoirs->sum('note')/$devoirs->count():null;
            $note_compo = $compo->note??null;
            $moy_classe = ($moy_interro!=null && $moy_devoir !=null)?number_format(($moy_interro+$moy_devoir)/2,2):null;
            $moy_gen = ($note_compo!=null && $moy_classe!=null)?number_format(($note_compo+$moy_classe)/2,2):null;

            Moyenne::updateOrCreate(
                [
                'eleve_id'=>$eleveId,
                'matiere_id'=>$matiere->id,
                'session_id'=>$sessionId,
            ],
                [
                    "eleve_id" => $eleveId,
                    "matiere_id" => $matiere->id,
                    "classe_id" => $eleve->classe->id,
                    "prof_id" => $profId,
                    "session_id" => $sessionId,
                    "coef" => $coef,
                    "moy_classe" => $moy_classe,
                    "moy_classe_coef" => ($moy_classe!=null)?$moy_classe*$coef:null,
                    "note_compo" => $note_compo,
                    "note_compo_coef" => ($note_compo!=null)?$note_compo*$coef:null,
                    "moy_gen" => $moy_gen,
                    "moy_gen_coef" => ($moy_gen!=null)?$moy_gen*$coef:null,
                    "moy_interro" => $moy_interro,
                    "moy_devoir" => $moy_devoir,
                ]
            );
        }
        return 200;
    }

    public function processBlocMoyennesGenForEleve($eleveId,$sessionId){
        $eleve = Eleve::with('classe')->find($eleveId);
        $classeId = $eleve->classe->id??null;
        $moyennes = Moyenne::where('eleve_id',$eleveId)
            ->where('session_id',$sessionId)
            ->whereNotNull('moy_gen_coef')
            ->get();

        $total_moy_coef = $moyennes->sum('moy_gen_coef');
        $total_coef = $moyennes->sum('coef');
        $moy_gen = number_format(($total_moy_coef/$total_coef),2);

        General::updateOrCreate(
            [
                'eleve_id'=>$eleveId,
                'session_id'=>$sessionId
            ],
            [
                'eleve_id'=>$eleveId,
                'session_id'=>$sessionId,
                'classe_id'=>$classeId,
                'moyenne'=>$moy_gen
            ]
        );

        return 200;
    }

    public function processBlocMoyennesGenForClasses(Request $request){
        $classesIds = $request->classes;
        $sessionId = $request->session_id;
        $classes = Classe::with('eleves')->whereIn('id',$classesIds)->get();

        foreach ($classes as $classe){
            $eleves = $classe->eleves;
            foreach ($eleves as $eleve){
                $moyennes = Moyenne::where('eleve_id',$eleve->id)
                    ->where('session_id',$sessionId)
                    ->whereNotNull('moy_gen_coef')
                    ->get();

                $total_moy_coef = $moyennes->sum('moy_gen_coef');
                $total_coef = $moyennes->sum('coef');
                $moy_gen = number_format(($total_moy_coef/$total_coef),2);

                General::updateOrCreate(
                    [
                        'eleve_id'=>$eleve->id,
                        'session_id'=>$sessionId
                    ],
                    [
                        'eleve_id'=>$eleve->id,
                        'session_id'=>$sessionId,
                        'classe_id'=>$classe->id,
                        'moyenne'=>$moy_gen
                    ]
                );
            }
        }

        foreach ($classesIds as $classesId){
            $generals = General::where('classe_id',$classesId)
                ->where('session_id',$sessionId)
                ->orderByDesc('moyenne')
                ->get();
            foreach ($generals as $i=>$line){
                $line->rang = $i+1;
                $line->save();
            }
        }

        foreach ($classes as $classe){
            MoyenneCalculee::updateOrCreate(
                [
                    'classe_id'=>$classe->id,
                    'session_id'=>$sessionId
                ],
                [
                    'classe_id'=>$classe->id,
                    'session_id'=>$sessionId
                ]
            );
        }

        return 200;
    }

    public function determineRanksInClasses(Request $request){
        $classesIds = $request->classes;
        $sessionId = $request->session_id;
         foreach ($classesIds as $classesId){
             $generals = General::where('classe_id',$classesId)
                 ->where('session_id',$sessionId)
                 ->orderByDesc('moyenne')
                 ->get();
             foreach ($generals as $i=>$line){
                 $line->rang = $i+1;
                 $line->save();
             }
         }

         return 200;
    }

    public function generateAppreciationsForClasses(Request $request){
//        $apprs = TypeAppreciation::get();
        $apprs = $request->appreciations;
//        return $apprs;
        $classesIds = $request->classes;
        $sessionId = $request->session_id;
        $moyennes = Moyenne::whereIn('classe_id',$classesIds)->where('session_id',$sessionId)->get();

        foreach ($moyennes as $moyenne){
            foreach ($apprs as $appr){
                if (ceil($moyenne->moy_gen) == $appr["note"]){
                    $moyenne->appreciation = $appr["appreciation"];
                    $moyenne->save();
                }
            }
        }

        return 200;

    }

    public function updateAppreciationGenerale(Request $request, $resId){
        General::find($resId)->update($request->input());
        $g = General::find($resId);
        return $g;
    }

    public function printBulletinOfEleve($eleveId, $sessionId){
        $session = Session::find($sessionId);
        $eleve = Eleve::find($eleveId);
        $classe = Classe::with('prof')->withCount('eleves')->find($eleve->classe_id);
        $classeId = $classe->id;
        $niveauId = $classe->niveau_id;
//        $moyennes = Moyenne::with('mat');
        /*$obligatoires = Matiere::with([
            'moyennes'=>function($q) use ($eleveId,$sessionId){
            $q->where('eleve_id',$eleveId)->where('session_id',$sessionId);
        },
            'profs'=>function($q) use ($classeId){
                $q->where('classe_id',$classeId);
            }
        ])->whereHas('niveaux',function($q) use ($niveauId){
            $q->where('niveau_id',$niveauId);
        })->where('obligatoire',1)->get();*/

        $obligatoires = Moyenne::with(['matiere.profs'=>function($q) use ($classeId){
            $q->where('classe_id',$classeId);
        }])->whereHas('matiere',function ($q){
            $q->where('obligatoire',1);
        })->where('eleve_id',$eleveId)->where('session_id',$sessionId)->get();

        $facultatives = Moyenne::with(['matiere.profs'=>function($q) use ($classeId){
            $q->where('classe_id',$classeId);
        }])->whereHas('matiere',function ($q){
            $q->where('obligatoire',0);
        })->where('eleve_id',$eleveId)->where('session_id',$sessionId)->get();

//        dd($obligatoires[0]->profs[0]->nom);

        /*$facultatives = Matiere::with([
            'moyennes'=>function($q) use ($eleveId,$sessionId){
            $q->where('eleve_id',$eleveId)->where('session_id',$sessionId);
        },
            'profs'=>function($q) use ($classeId){
                $q->where('classe_id',$classeId);
            }
        ])->whereHas('niveaux',function($q) use ($niveauId){
            $q->where('niveau_id',$niveauId);
        })->where('obligatoire',0)->get();
        */

        $prof = $classe->prof;
        $resultats = General::where('classe_id',$classeId)->where('session_id',$sessionId)->get();
        $resultat = General::where('eleve_id',$eleveId)->where('session_id',$sessionId)->first();
        $conseil = Conseil::where('eleve_id',$eleveId)->where('session_id',$sessionId)->first();


//        dd(number_format($obligatoires->sum('moy_gen'),2));
//        dd(number_format($obligatoires[0]->moyennes->sum('moy_gen'),2));

        $pdf = App::make('dompdf.wrapper');
        $pdf = $pdf->loadView('templates.bulletins.modele_1',compact("eleve",'moyennes','conseil','obligatoires','facultatives','prof','resultats','resultat','session','classe'));
        return $pdf->download($eleve->nom_complet.'.pdf');
//        return view('templates.bulletins.modele_1',compact("eleve",'moyennes','conseil','obligatoires','facultatives','prof','resultats','resultat','session','classe'));
    }

    public function generateMultipleBulletin(Request $request){
//        return dd($request->input());
        $classesIds = $request->classes;
        $sessionId = $request->session_id;
        $session = Session::find($sessionId);
        $classes = Classe::with('eleves','niveau.matieres')->whereIn('id',$classesIds)->get();
//        dd($classes);
        foreach ($classes as $classe){
            foreach ($classe->eleves as $eleve){
                $eleveId = $eleve->id;
                $eleve = Eleve::find($eleveId);
                $classe = Classe::with('prof')->withCount('eleves')->find($eleve->classe_id);
                $classeId = $classe->id;
                $niveauId = $classe->niveau_id;

                $obligatoires = Moyenne::with(['matiere.profs'=>function($q) use ($classeId){
                    $q->where('classe_id',$classeId);
                }])->whereHas('matiere',function ($q){
                    $q->where('obligatoire',1);
                })->where('eleve_id',$eleveId)->where('session_id',$sessionId)->get();

                $facultatives = Moyenne::with(['matiere.profs'=>function($q) use ($classeId){
                    $q->where('classe_id',$classeId);
                }])->whereHas('matiere',function ($q){
                    $q->where('obligatoire',0);
                })->where('eleve_id',$eleveId)->where('session_id',$sessionId)->get();

                $prof = $classe->prof;
                $resultats = General::where('classe_id',$classeId)->where('session_id',$sessionId)->get();
                $resultat = General::where('eleve_id',$eleveId)->where('session_id',$sessionId)->first();
                $conseil = Conseil::where('eleve_id',$eleveId)->where('session_id',$sessionId)->first();

                $pdf = App::make('dompdf.wrapper');
                $pdf = $pdf->loadView('templates.bulletins.modele_1',compact("eleve",'moyennes','conseil','obligatoires','facultatives','prof','resultats','resultat','session','classe'));
                $pdf->download($eleve->nom_complet.'.pdf');
            }
        }

        return $classesIds;
    }
}

