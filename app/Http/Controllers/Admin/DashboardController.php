<?php

namespace App\Http\Controllers\Admin;

use App\Classe;
use App\Eleve;
use App\Personnel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function loadDashboard(){
        $nbreEleves = Eleve::get()->count();
        $nbreClasses = Classe::get()->count();
        $nbreProfs = Personnel::whereHas('user',function($q){
            $q->where('role_id',10);
        })->get()->count();
        $effPersonnel = Personnel::get()->count();
        return compact('nbreClasses','nbreEleves','nbreProfs','effPersonnel');
    }
}
