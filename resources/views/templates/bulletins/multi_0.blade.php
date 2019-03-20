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
    .page-break-before {
        page-break-before: always;
    }

    .page-break-after  {
        page-break-after: always;
    }



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

<body >
<div class="container">
    @foreach($ELEVES as $eleve)


        <div class="row">
            <br>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-center" style="color: darkorange; font-size: x-large;font-family: 'Britannic Bold'"><b>BULLETIN DU {{ $session->nom }}</b></p>
                </div>
                <div class="col-lg-12 text-center">
                    <div class="col-lg-3 pull-left">
                        <h6 class="col-lg-12 pull-left" ><span style="font-size: 16px"><b> {{ $eleve->nom_complet }}</b></span></h6>
                        <br>
                        <br>
                        <p class="col-lg-12 pull-left"> <span style="font-size: 11px"> @if($eleve->date_nsce) Né@if($eleve->sexe=="F")e @endif le {{ $eleve->date_nsce->format('d-m-Y') ?? ""  }} @endif </span></p>
                    </div>
                    <div class="col-lg-6 pull-right">
                        <span class="col-lg-3" style="font-size: xx-small">Année scolaire : <b> 2018 - 2019 </b></span>
                        <span class="col-lg-3" style="font-size: xx-small">Classe:<b> {{ $eleve->classe->nom }}</b></span>
                        <span class="col-lg-3" style="font-size: xx-small">Effectif: <b>{{ $eleve->classe->eleves_count }}</b></span><br>
                        <span class="col-lg-3" style="font-size: xx-small">Prof. principal(e): <b>{{ $eleve->classe->prof->nom_complet??"" }}</b></span><br>
                    </div>
                </div>
                {{--<div class="col-lg-12 text-center">
                    --}}{{--<span class="col-lg-12" style="font-size: xx-small; border: solid lightgrey 2px; padding: 5px" ><b> {{ $eleve->nom_complet }}</b> (@if($eleve->date_nsce) Né(e) le {{ $eleve->date_nsce->format('d-m-Y') ?? ""  }} @endif </span>--}}{{--
                    <span class="col-lg-12" ><h4><b> {{ $eleve->nom_complet }}</b></h4> @if($eleve->date_nsce) Né(e) le {{ $eleve->date_nsce->format('d-m-Y') ?? ""  }} @endif </span>
                </div>--}}

            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-12">
                <table class="table-bordered table-condensed col-lg-12 ">
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

                    @foreach($eleve->obligatoires as $matiere)
                        <tr>
                            <td class="text-center"><b>{{ $matiere->matiere->intitule}}</b> <br> {{ $matiere->profs[0]->nom_complet??"" }} </td>
                            <td class="text-center">{{ $matiere->coef }}</td>
                            <td class="text-center">{{ $matiere->moy_devoir }}</td>
                            <td class="text-center">{{ $matiere->moy_interro }}</td>
                            <td class="text-center">{{ $matiere->moy_classe }}</td>
                            <td class="text-center">{{ $matiere->note_compo }}</td>
                            <td class="text-center">{{ $matiere->moy_gen }}</td>
                            <td class="text-center">{{ $matiere->moy_gen_coef }}</td>
                            <td class="text-center">{{ $matiere->rang_compo }} @if(is_numeric($matiere->rang_compo)) @if($matiere->rang_compo==1) er @else ème @endif @endif</td>
                            {{--<td></td>--}}
                            <td class="">{{ $matiere->appreciation ?? "" }}</td>
                            {{--<td class="text-center"></td>--}}
                        </tr>
                    @endforeach
                    <tr class="grey">
                        <td class="text-center">Total Mat. obl <b>(A)</b></td>
                        <td class="text-center">{{ $eleve->obligatoires->sum('coef') }}</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center">{{ $eleve->obligatoires->sum('moy_gen_coef') }}</td>
                        <td></td>
                        {{--<td></td>--}}
                        <td class=""></td>
                        {{--<td class="text-center"></td>--}}
                    </tr>
                    @foreach($eleve->facultatives as $matiere)
                        <tr>
                            <td class="text-center"><b>{{ $matiere->matiere->intitule }}</b> <br> {{ $matiere->profs[0]->nom_complet??"" }} </td>
                            <td class="text-center">{{ $matiere->coef }}</td>
                            <td class="text-center">{{ $matiere->moy_devoir }}</td>
                            <td class="text-center">{{ $matiere->moy_interro }}</td>
                            <td class="text-center">{{ $matiere->moy_classe }}</td>
                            <td class="text-center">{{ $matiere->note_compo }}</td>
                            <td class="text-center">{{ $matiere->moy_gen }}</td>
                            <td class="text-center">{{ $matiere->moy_gen_coef }}</td>
                            <td class="text-center">{{ $matiere->rang_compo }} @if($matiere->rang_compo==1) er @else ème @endif </td>
                            {{--<td></td>--}}
                            <td class="">{{ $matiere->appreciation ?? "" }}</td>
                            {{--<td class="text-center"></td>--}}
                        </tr>
                    @endforeach
                    <tr class="grey">
                        <td class="text-center">Total Mat. obl <b>(B)</b></td>
                        <td class="text-center">{{ $eleve->facultatives->sum('coef') }}</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center">{{ $eleve->facultatives->sum('moy_gen_coef') }}</td>
                        <td></td>
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
                        <td class="text-center grey">{{ number_format(($eleve->facultatives->sum('moy_gen_coef')/count($eleve->facultatives)),2) }}</td>
                        <td class="text-center"></td>
                        {{--<td></td>--}}
                        <td class=""></td>
                        {{--<td class="text-center"></td>--}}
                    </tr>

                    <tr class="grey">
                        <td class="text-center">Total définitif <b>(A+B)</b> </td>
                        <td class="text-center">{{ $eleve->obligatoires->sum('coef')+1 }}</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center grey">{{ number_format(($eleve->obligatoires->sum('moy_gen_coef')+($eleve->facultatives->sum('moy_gen_coef')/$eleve->facultatives->sum('coef'))),2) }}</td>
                        <td class="text-center"></td>
                        {{--<td></td>--}}
                        <td class=""></td>
                        {{--<td class="text-center"></td>--}}
                    </tr>
                    </tbody>
                </table>
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
                        <td class="text-center" style="background-color: cornflowerblue"><b>{{ $eleve->resultat->moyenne }}</b></td>
                        <td class="text-center" style="background-color: cornflowerblue"><b>{{ $eleve->resultat->rang }} @if($eleve->resultat->rang==1) er @else ème @endif</b></td>
                        <td class="text-center">{{ $eleve->resultats->max('moyenne') }}</td>
                        <td class="text-center">{{ $eleve->resultats->min('moyenne') }}</td>
                        <td class="text-center">{{ number_format(($eleve->resultats->max('moyenne')+$eleve->resultats->min('moyenne'))/2,2) }} </td>
                        <td>{{ $eleve->conseil->retards??'' }}</td>
                        <td>{{ $eleve->conseil->absences??'' }}</td>
                        <td>{{ $eleve->conseil->assiduite??'' }}</td>
                        <td>{{ $eleve->conseil->conduite??'' }}</td>
                        <td>{{ $eleve->conseil->travail??'' }}</td>
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
            </div>
        </div>

        <div class="row">
            <br>
            <div class="col-lg-12">
                <div class="col-lg-6 ">
                    <p class="pull-left"><b>Appréciations du Conseil de Classe</b></p>
                    <p class="pull-left"><b>{{ $eleve->conseil->appreciation ?? "" }}</b></p>
                </div>
                <div class="col-lg-6 ">
                    <div class="pull-right">
                        <p >Lomé le     </p>
                        <p >Le Directeur</p>
                        {{--<br>--}}
                        {{--<br>--}}
                        {{--<br>--}}
                        {{--<h5><b>Yao M. TSATSU</b></h5>--}}
                    </div>
                </div>
            </div>
        </div>


        <div class="page-break-after"></div>


    @endforeach
</div>

</body>
</html>