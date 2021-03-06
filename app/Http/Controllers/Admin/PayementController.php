<?php

namespace App\Http\Controllers\Admin;

use App\Classe;
use App\Eleve;
use App\Payement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PayementController extends Controller
{
    public function index()
    {
        return view('espaces.admin.payements');
    }
    public function loadPayement(){

        /* $payement = DB::table('Payements')
             ->join('Eleves', 'Payements.eleve_id', '=', 'Eleves.id')
             ->join('Scolarites','Eleves.classe_id','=','Scolarites.classe_id')
             ->join('Classes','Scolarites.classe_id','=','Classes.id')
             ->select(DB::raw('Eleves.nom AS NomE'), 'Classes.nom','Eleves.prenoms','Eleves.sexe', 'Scolarites.solde', DB::raw('sum(paye) AS Paye'), 'eleve_id')->groupBy('eleve_id','Classes.nom', 'Eleves.nom',
                 'Scolarites.solde','Eleves.prenoms','Eleves.sexe')
             ->get();*/
        $eleve=Eleve::with(['payements'=>function($q){
            $q->sum('paye');
        },'classe.niveau.scolarite'])->whereHas('payement')->get();
        $elevet=Eleve::with('classe')->get();


        $listepayement=Payement::with('eleve.classe.niveau.scolarite')->orderBy('created_at','desc')->get();

        /* $listepayement = DB::table('Payements')
             ->join('Eleves', 'Payements.eleve_id', '=', 'Eleves.id')
             ->join('Scolarites','Eleves.classe_id','=','Scolarites.classe_id')
             ->join('Classes','Scolarites.classe_id','=','Classes.id')
             ->select(DB::raw('Eleves.nom AS NomE'), 'Classes.nom','Eleves.prenoms','Eleves.sexe', 'Scolarites.solde',  'eleve_id','paye','Payements.created_at As date','Payements.id As payement_id')*/

        /* ->orderBy('date','desc') ->get();*/


        return compact("eleve","listepayement","elevet");



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
        //$scolarite=  Payement::create( $request->input());

        $payement= new Payement();
        $payement->eleve_id=$request->input('eleve_id');
        $payement->paye=$request->input('nouveau_payement');
        $payement->scolarite_id=$request->input('scolarite_id');
        $payement->save();
        //create( $request->input());


        return $payement;

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
        $updatepaye=Payement::find($id);
        $updatepaye->paye=$request->paye;
        $updatepaye->save();
        return $updatepaye;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

    }
    public function addpaye(Request $request){
        $paye=  Payement::create( $request->input());
        return compact("niveau");
    }
}
