<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    //

    public function cdt(){
        return view('espaces.admin.vs.cdt');
    }

    public function vm(){
        return view('espaces.admin.vs.dm');
    }

    public function absences(){
        return view('espaces.admin.vs.absences');
    }

    public function retards(){
        return view('espaces.admin.vs.retards');
    }




}
