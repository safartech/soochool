<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">

    <title>Bulletin</title>
</head>

<style>
    /*@page { margin: 10px; }*/
    @page {
        /*padding-bottom: 0px;*/
        /*margin-bottom: 0px;*/
    }
    @html{
        /*padding-bottom:  50px;*/
    }
    html{
        /*margin:0px;*/
    }
    body{
        font-size: 10px;
        margin-top: 0px;
        margin-bottom: 0px;
        padding-top: 0px;
        padding-bottom: 0px;
    }
    .grey{
        background-color: #F0F0F0;
    }
    .eleve{
        border: solid 2px grey;
        padding: 10px 10px;
    }
    tr,td{
        padding: 100px;
    }
</style>

<body>
@php

function total($array,$key){
 $sum = 0;
 foreach ($array as $item){
    if (is_numeric($item[$key]))
    $sum+=$item[$key];
 }
 return $sum;
}

function getClosest($search, $arr) {
        $closest = null;
        foreach ($arr as $item) {
            if ($closest === null || abs($search - $closest) > abs($item - $search)) {
                $closest = $item;
            }
        }

        return $closest;
    }

function getRang($moys,$moy){

//        return 0;
        if (is_numeric($moy)){
        //$moy = number_format($moy,1);
        //dd(number_format($moy,1));

            $alls = [];
            rsort($moys);
            //dd($moys);
            if (in_array($moy,$moys)){
            $key = array_search($moy,$moys);
            return $key+1;

                }else{
                //dd($moy);
                //$moy = number_format($moy,1);
                $closest = getClosest($moy,$moys);
                //dd($closest);
                $key = array_search($closest,$moys);
                return $key+1;
                }

//        if ($moy == 6.5)
        //dd($moys);
//        dd($key);

        }


    }

@endphp
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-lg-12" >
                    {{--<div class="col-lg-3 pull-left">
                        <img src="{{ asset('logo/logo.jpg') }}" width="100px" alt="" style="margin-left: 40px">
                        <p  style="color: #1a6894; font-size: small ;font-family: 'Britannic Bold'"><b>COLLEGE SCIENTIFIQUE SIGMA</b></p>
                        <span style="font-size: xx-small">158, rue des Balises, Tokoin Doumasséssé</span><br>
                        <span style="font-size: xx-small">01 BP: 4512, Lomé-Togo;<br> Tél:(+228)22 22 56 00 / 92 10 98 98 / 98 10 98 98</span><br>
                        <span style="font-size: xx-small">Email: contactsigma@sigmatogo.com</span>
                    </div>--}}
                </div>
                {{--<div class="col-lg-7 pull-right">
                    <br>
                    <br>
                    <br>
                    <br>
                    <p class="" style="color: darkorange; font-size: small;font-family: 'Britannic Bold'"><b>BULLETIN DU {{ $session->nom }}</b></p>
                    <span class="" style="font-size: xx-small">Année scolaire : <b> 2018 - 2019</b></span><br>
                    <span class="" style="font-size: xx-small">Classe:<b> {{ $eleve->classe->nom }}</b> Effectif: <b>{{ $eleve->classe->eleves->count() }}</b></span><br>
                    <span class="" style="font-size: xx-small">Elève:<b> {{ $eleve->nom_complet }}</b></span><br>
                    <span class="" style="font-size: xx-small"><b>@if($eleve->date_nsce) Né(e) le {{ $eleve->date_nsce->format('d-m-Y') ?? ""  }} @endif</b></span>
                </div>--}}
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-center" style="color: darkorange; font-size: x-large;font-family: 'Britannic Bold'"><b>BULLETIN DU {{ $session->nom }}</b></h4>
                </div>
                <div class="col-lg-12 text-center">
                    <div class="col-lg-3 pull-left">
                        <p class="col-lg-12 pull-left" ><span style="font-size: 16px"><b> {{ $eleve->nom_complet }}</b></span></p>
                        <br>
                        <br>
                        <p class="col-lg-12 pull-left"> <span style="font-size: 11px"> @if($eleve->date_nsce) Né(e) le {{ $eleve->date_nsce->format('d-m-Y') ?? ""  }} @endif </span></p>
                    </div>
                    <div class="col-lg-6 pull-right">
                        <span class="col-lg-3" style="font-size: xx-small">Année scolaire : <b> 2018 - 2019</b></span>
                        <span class="col-lg-3" style="font-size: xx-small">Classe:<b> {{ $eleve->classe->nom }}</b></span>
                        <span class="col-lg-3" style="font-size: xx-small">Effectif: <b>{{ $eleve->classe->eleves->count() }}</b></span><br>
                        <span class="col-lg-3" style="font-size: xx-small">Prof. principal(e): <b>{{ $prof->nom_complet??"" }}</b></span><br>
                    </div>
                </div>
                {{--<div class="col-lg-12 text-center">
                    --}}{{--<span class="col-lg-12" style="font-size: xx-small; border: solid lightgrey 2px; padding: 5px" ><b> {{ $eleve->nom_complet }}</b> (@if($eleve->date_nsce) Né(e) le {{ $eleve->date_nsce->format('d-m-Y') ?? ""  }} @endif </span>--}}{{--
                    <span class="col-lg-12" ><h4><b> {{ $eleve->nom_complet }}</b></h4> @if($eleve->date_nsce) Né(e) le {{ $eleve->date_nsce->format('d-m-Y') ?? ""  }} @endif </span>
                </div>--}}

            </div>

            {{--<div class="row">
                <h5 class="text-center" style="color: darkorange;font-family: 'Britannic Bold'"><b>BULLETIN DU {{ $session->nom }}</b></h5>
                <h6 class="text-center">Année scolaire : <b> 2018 - 2019</b></h6>
                <h6 class="text-center">Classe:<b> {{ $eleve->classe->nom }}</b> Effectif: <b>{{ $eleve->classe->eleves->count() }}</b></h6>
                <h5 class="text-center"><b>Nom et Prénoms: {{ $eleve->nom_complet }}</b></h5>
                <h5 class="text-center"><b>@if($eleve->date_nsce) Né(e) le {{ $eleve->date_nsce->format('d-m-Y') ?? ""  }} @endif</b></h5>
            </div>--}}

        </div>
        <br>
        <div class="row text-center">
            <div class="">
                {{--<div class=""><h4 class="text-center text-bold eleve">{{ $eleve->nom_complet }}</h4></div>--}}
                <table class="table-bordered table-condensed col-lg-12">
                    <thead>
                    <tr>
                        <th  class="text-center">Matières</th>
                        <th class="text-center">Coef</th>
                        <th class="text-center" colspan="2">Notes de classe</th>
                        <th class="text-center">Moy. classe</th>
                        <th class="text-center">Notes Compo</th>
                        <th class="text-center">Moy. genérale</th>
                        <th class="text-center">Moy. Coef</th>
                        <th class="text-center">Rang</th>
                        <th class="text-center">Appréciations</th>
                        {{--<th>Prof</th>--}}
                        {{--<th class="text-center">Signatures</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($obligatoires as $matiere)

                        <tr>
                            <td class="text-center"><b>{{ $matiere->intitule }} ({{ $matiere->id }})</b> <br> {{ $matiere->interventions[0]->prof->nom_complet??"" }} </td>
                            <td class="text-center">{{ $matiere->coef }}</td>
                            <td class="text-center">{{ $matiere->note_ds }}</td>
                            <td class="text-center">{{ $matiere->note_interro }}</td>
                            <td class="text-center">{{ $matiere->note_classe }}</td>
                            <td class="text-center">{{ $matiere->note_compo }}</td>
                            <td class="text-center">{{ $matiere->moy_gen }}</td>
                            <td class="text-center">@if(is_numeric($matiere->moy_gen)){{ $matiere->moy_gen * $matiere->coef }}@endif</td>
                            @php $matiere["moy_coef"] = is_numeric($matiere->moy_gen)? $matiere->moy_gen * $matiere->coef : "-" @endphp
                            <td class="text-center">{{ $matiere->rang }} @if(is_numeric($matiere->rang)) @if($matiere->rang==1) er @else ème @endif @endif</td>
                            {{--<td></td>--}}
                            <td class="">{{ $matiere->appreciations[0]->appreciation ?? "" }}</td>
                            {{--<td class="text-center"></td>--}}
                        </tr>
                    @endforeach
                    {{--<pre>
                        {{ print_r($obligatoires) }}
                    </pre>--}}
                    <tr class="grey">
                        <td class="text-center">Total Mat. obl <b>(A)</b></td>
                        <td class="text-center">{{ total($obligatoires,"coef") }}</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center">{{ total($obligatoires,"moy_coef") }}</td>
                        <td></td>
                        {{--<td></td>--}}
                        <td class=""></td>
                        {{--<td class="text-center"></td>--}}
                    </tr>
                    @foreach($facultatives as $matiere)
                        <tr>
                            <td class="text-center"><b>{{ $matiere->intitule }}</b> <br> {{ $matiere->interventions[0]->prof->nom_complet??"" }} </td>
                            <td class="text-center">{{ $matiere->coef }}</td>
                            <td class="text-center">{{ $matiere->note_ds }}</td>
                            <td class="text-center">{{ $matiere->note_interro }}</td>
                            <td class="text-center">{{ $matiere->note_classe }}</td>
                            <td class="text-center">{{ $matiere->note_compo }}</td>
                            <td class="text-center">{{ $matiere->moy_gen }}</td>
                            <td class="text-center">@if(is_numeric($matiere->moy_gen)){{ $matiere->moy_gen * $matiere->coef }}@endif</td>
                            @php $matiere->moy_coef = is_numeric($matiere->moy_gen)? $matiere->moy_gen * $matiere->coef : "-" @endphp
                            <td>{{ $matiere->rang }} @if(is_numeric($matiere->rang)) @if($matiere->rang==1) er @else ème @endif @endif</td>
                            {{--<td></td>--}}
                            <td class="">{{ $matiere->appreciations[0]->appreciation ?? "" }}</td>
                            {{--<td class="text-center"></td>--}}
                        </tr>
                    @endforeach
                    <tr class="grey">
                        <td class="text-center">Total Mat. fac </td>
                        <td class="text-center">{{ total($facultatives,"coef") }}</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center">{{ total($facultatives,"moy_coef") }}</td>
                        <td class="text-center"></td>
                        {{--<td></td>--}}
                        <td class=""></td>
                        {{--<td class="text-center"></td>--}}
                    </tr>
                    <tr class="grey">
                        <td class="text-center">Moyenne Mat. facul <b>(B)</b> </td>
                        <td class="text-center">1</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center grey">{{ number_format(total($facultatives,"moy_coef")/total($facultatives,"coef"),2) }}</td>
                        <td class="text-center"></td>
                        {{--<td></td>--}}
                        <td class=""></td>
                        {{--<td class="text-center"></td>--}}
                    </tr>
                    <tr class="grey">
                        <td class="text-center">Total définitif <b>(A+B)</b> </td>
                        <td class="text-center">{{ total($obligatoires,"coef")+1 }}</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center grey">{{ number_format((total($obligatoires,"moy_coef")+(total($facultatives,"moy_coef")/total($facultatives,"coef"))),2) }}</td>
                        <td class="text-center"></td>
                        {{--<td></td>--}}
                        <td class=""></td>
                        {{--<td class="text-center"></td>--}}
                    </tr>

                    </tbody>
                </table>

                {{--<p>to print execo: search how to to check or count the number of occurrences of a value in array</p>--}}
                <br>
                {{--<div style="visibility: hidden">-</div>--}}
                @php

                    $coef_fac = total($facultatives,"coef");
                    $coef_obl = total($obligatoires,"coef");

                    $moys_facs = total($facultatives,"moy_coef");
                    $moys_obs = total($obligatoires,"moy_coef");

                    $moy_fac = number_format(($moys_facs/$coef_fac),2);
                    $all_moys = $moys_obs;

                    $all_moys+=$moy_fac;
                    $all_coef = $coef_obl+1;
                    $moyenne = number_format(($all_moys/$all_coef),2);


                @endphp
                <table class="col-lg-12 table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th class="text-center" style="background-color: cornflowerblue" style="padding: 0px 22px">Moyenne du trimestre</th>
                        <th class="text-center" style="background-color: cornflowerblue">Rang</th>
                        <th class="text-center">Moyenne forte</th>
                        <th class="text-center">Moyenne faible</th>
                        <th class="text-center">Moyenne de classe</th>
                        <th class=" text-center grey" style="padding: 0px 0px">Absences</th>
                        <th class=" text-center grey" style="padding: 0px 0px">Retards</th>
                        <th class=" text-center grey" style="padding: 0px 22px"><b>ASSIDUITE</b></th>
                        <th class=" text-center grey" style="padding: 0px 22px"><b>CONDUITE</b></th>
                        <th class=" text-center grey" style="padding: 0px 22px"><b>TRAVAIL</b></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center" style="background-color: cornflowerblue"><b>{{ $moyenne }}</b></td>
                        <td class="text-center" style="background-color: cornflowerblue"><b>{{ getRang($moys_tab,$moyenne) }} @if(is_numeric(getRang($moys_tab,$moyenne))) @if(getRang($moys_tab,$moyenne)==1) er @else ème @endif @endif</b></td>
                        <td class="text-center">{{ $biggest_moy }}</td>
                        <td class="text-center">{{ $smallest_moy }}</td>
                        <td class="text-center">{{ $moy_of_classe }} </td>
                        <td>{{ $eleve->conseils[0]->retards??'' }}</td>
                        <td>{{ $eleve->conseils[0]->absences??'' }}</td>
                        <td>{{ $eleve->conseils[0]->assiduite??'' }}</td>
                        <td>{{ $eleve->conseils[0]->conduite??'' }}</td>
                        <td>{{ $eleve->conseils[0]->travail??'' }}</td>
                    </tr>
                    </tbody>
                    {{--<tr class="">
                        <td><b>Moyenne du trimestre</b></td>

                        <td><b>{{ $moyenne }}</b></td>
                        <td><b>Rang</b></td>
                        <td><b>{{ getRang($moys_tab,$moyenne) }} @if(is_numeric(getRang($moys_tab,$moyenne))) @if(getRang($moys_tab,$moyenne)==1) er @else ème @endif @endif</b></td>
                        <td>Moyenne faible</td>
                        <td>{{ $smallest_moy }}</td>
                        <td>Moyenne forte</td>
                        <td>{{ $biggest_moy }}</td>
                        <td>Moyenne de la clase</td>
                        <td>{{ $moy_of_classe }} </td>
                    </tr>--}}
                </table>
                {{--<div style="visibility: hidden">-</div>--}}
                {{--<br>
                <table class="col-lg-12 table-bordered table-condensed" >
                    <tr>
                        <td class="grey">Absences</td>
                        <td><span style="visibility: hidden">00000</span></td>
                        <td class="grey">Retards</td>
                        <td><span style="visibility: hidden">00000</span></td>
                    </tr>
                </table>--}}

                {{--<table class="col-lg-12 table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th class="grey"><b>ASSIDUITE</b></th>
                        <th class="grey"><b>CONDUITE</b></th>
                        <th class="grey"><b>TRAVAIL</b></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><br><br></td>
                        <td><br><br></td>
                        <td><br><br></td>
                    </tr>
                    </tbody>
                </table>--}}

                <br>
                <div class="col-lg-12">
                    <div class="col-lg-6 ">
                        <h5 class="pull-left"><b>Appréciations du Conseil de Classe</b></h5>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="pull-left">
                            <h5 >Lomé le     </h5>
                            <h5 >Le Directeur</h5>
                            {{--<br>--}}
                            {{--<br>--}}
                            {{--<br>--}}
                            {{--<h5><b>Yao M. TSATSU</b></h5>--}}
                        </div>
                    </div>
                </div>

                {{--<table class="col-lg-12 table-bordered table-condensed">
                    <tr>
                        <td class="grey"><b>ASSIDUITE</b></td>
                        <td>Bonne</td>
                        <td>Assez Bonne</td>
                        <td>Passable</td>
                        <td>Médiocre</td>
                        <td>Irrégulière</td>
                        <td>Souvent en retard</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr >
                        <td class="grey"><b>CONDUITE</b></td>
                        <td>Bonne</td>
                        <td>Assez Bonne</td>
                        <td>Passable</td>
                        <td>Médiocre</td>
                        <td>Avertisemment</td>
                        <td>Blâme</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="grey"><b>TRAVAIL</b></td>
                        <td>Très Bon</td>
                        <td>Bon</td>
                        <td>Assez-bon</td>
                        <td>Passable</td>
                        <td>Insuffisant</td>
                        <td>Médiocre</td>
                        <td>Avertissement</td>
                        <td>Blâme</td>
                    </tr>

                </table>--}}


                {{--<table class="col-lg-12 table-bordered table-condensed">
                    <tr>
                        <td>ASSIDUITE</td>
                        <td>CONDUITE</td>
                        <td>TRAVAIL</td>
                    </tr>
                    <tr>
                        <td>Bonne</td>
                        <td>Bonne</td>
                        <td>Très Bon</td>
                    </tr>
                    <tr>
                        <td>Assez Bonne</td>
                        <td>Assez Bonne</td>
                        <td>Bon</td>
                    </tr>
                    <tr>
                        <td>Passable</td>
                        <td>Passable</td>
                        <td>Assez-bon</td>
                    </tr>
                    <tr>
                        <td>Médiocre</td>
                        <td>Médiocre</td>
                        <td>Passable</td>
                    </tr>
                    <tr>
                        <td>Irrégulière</td>
                        <td>Avertisemment</td>
                        <td>Insuffisant</td>
                    </tr>
                    <tr>
                        <td>Souvent en retard</td>
                        <td>Blâme</td>
                        <td>Médiocre</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Avertissement</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Blâme</td>
                    </tr>
                </table>--}}
            </div>
        </div>
    </div>
</body>
</html>