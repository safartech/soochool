<?php

namespace App\Http\Controllers\Admin;

use App\Classe;
use App\Niveau;
use App\Scolarite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScolariteController extends Controller
{
    public function index()
    {
        return view('espaces.admin.scolarites');
    }
    public function loadScolarite(){

        $scolarite=Scolarite::with('niveau')->orderBy('niveau_id','desc')->get();

        $niveau=Niveau::all();

        return compact("scolarite","niveau");


    }


    public function update(Request $request,$id){
        $scolarite=Scolarite::find($id);
        $scolarite->update($request->input());
        return 'ok';

    }
    public function store(Request $request){
        $addscolarite=Scolarite::updateOrCreate(["niveau_id"=>$request->niveau_id],["niveau_id"=>$request->niveau_id,"solde"=>$request->solde]);
        return $addscolarite;
    }
}
