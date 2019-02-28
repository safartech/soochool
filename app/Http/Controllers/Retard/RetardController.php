<?php

namespace App\Http\Controllers\Retard;

use App\Classe;
use App\Retard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RetardController extends Controller
{
    public function showRetardPage(){
        return view('espaces.protected.retard');
    }
    public function showEleves(){
        $classes = Classe::with('eleves')->get();
        return compact('classes');
    }
    public function storeRetard(Request $request){
        Retard::create($request->input());
        return 'ok';
    }
   /* public function storeRetard(Request $request){

        $retard=new Retard();
        $data=$this->validate($request,[
            'date'=>'required',
            'motif'=>'required',
        ]);
       // $retard->eleve_id=
        $retard->date=$data['date'];
        $retard->motif=$data['motif'];

        $retard->save();
        return 'ok';

    }*/
}
