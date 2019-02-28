<?php

namespace App\Http\Controllers\Admin;

use App\Dispense;
use App\Matiere;
use App\Niveau;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('espaces.admin.matieres');
    }

    public function loadMatieresDatas(){
        $matieres = Matiere::orderBy('intitule')->get();
        $dispenses = Dispense::with('matiere','niveau')->orderBy('niveau_id')->get();
        $niveaux = Niveau::with(['ues.matiere'])->get();
        return compact('matieres','dispenses','niveaux');
    }

    public function updateMatieres(Request $request,$id){
        $matiere = Matiere::find($id);
        $matiere->update($request->input());
        return 'ok';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $matiere=  Matiere::create( $request->input());

        return $matiere;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matiere::destroy($id);
        return 'ok';
    }
}
