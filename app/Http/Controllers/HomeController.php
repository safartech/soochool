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
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return bool
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){
            return view('espaces.admin.home');
        }elseif (Auth::user()->isProf()){
            return view('espaces.prof.home');
        }elseif (Auth::user()->isParent()){
            return view('espaces.parent.home');
        }elseif (Auth::user()->isEleve()){
            return false;
        }else{
            return false;
        }
    }

    public function loadProfHome(){
        $prof = Auth::user()->personnel;
//        $profs = Personnel::with('cours.classe','cours.jour','cours.horaire','cours.matiere','cours.prof','cours.salle','cours.seances')->get();
        $cours = Cours::with(['classe','jour','horaire','prof','matiere','salle','seances'])->where('personnel_id',$prof->id)->get();
        $jours = Jour::with('cours.classe','cours.matiere','cours.prof','cours.salle','cours.horaire')->get();
        $horaires = Horaire::get();
        $matieres = Matiere::get();
        $classes = Classe::with('cours.classe','cours.jour','cours.horaire','cours.matiere','cours.prof','cours.salle','cours.seances')->get();
        $salles = Salle::get();

        return compact('classes','jours','horaires','matieres','cours','salles');
    }


    public function loadAdminHome(){}


    public function loadParentHome(){}
}
