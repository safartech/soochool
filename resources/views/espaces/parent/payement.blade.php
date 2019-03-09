@extends("default")
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select2/css/select2.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/lib/datatables/css/dataTables.bootstrap.min.css') }}">


    <style>
        .select2{
            width: 100%;

        }

    </style>
@endsection

@section('js')

    <script src="{{ asset('js/select2/js/select2.min.js') }}" type="module"></script>
    <script type="text/javascript" src="{{asset('js/momentjs/moment.js')}}"></script>
    <script src="{{ asset('js/momentjs/moment-with-locales.js') }}" type="text/javascript"></script>
    <template id="payements">


        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading"><span class="icon mdi mdi-money" style="font-weight: bold">  Espace Payements</span></div>

                <div class="tab-container">

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#Liste" data-toggle="tab"><span class="icon mdi mdi-dns"></span><span style="font-weight: bold">Historique des payements</span></a></li>
                        <li><a href="#Statu" data-toggle="tab"><span class="icon mdi mdi-camera-alt"></span></span><span style="font-weight: bold">Etat Solde</span></a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="Liste" class="tab-pane active cont">



                            <div class="main-content container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="panel panel-default">
                                            <div class="panel-body xs-pb-10" v-for="infoEleve in eleves">
                                                <div><span style="color: cornflowerblue;font-weight: bold">Identité Etudiant</span></div>
                                                <br>
                                                <div class="col-md-6">
                                                    <div class="col-md-2"><span style="font-weight: bold">Nom :</span></div>
                                                    <div class="col-md-3"><span style="font-weight: bold"></span></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-md-3"><span style="font-weight: bold">Prenoms :</span></div>
                                                    <div class="col-md-3"><span style="font-weight: bold">@{{ infoEleve.prenoms }}</span></div>
                                                </div>

                                                <div class="col-md-6"><br>
                                                    <div class="col-md-2"><span style="font-weight: bold">sexe :</span></div>
                                                    <div class="col-md-3"><span style="font-weight: bold">@{{ infoEleve.sexe}}</span></div>
                                                </div>
                                                <div class="col-md-6"><br>
                                                    <div class="col-md-3"><span style="font-weight: bold">classe :</span></div>
                                                    <div class="col-md-3"><span style="font-weight: bold">@{{ infoEleve.nom }}</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div  id="CP" class="panel panel-default row icon-category">
                                    <div class="panel-heading"><span style="font-weight: bold">Historique de payement de l'Eleve</span>

                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-condensed table-hover table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>N°</th>

                                                <th class="text-center">Nom </th>
                                                <th class="text-center">Prenoms</th>
                                                <th class="text-center">Date de Payement</th>
                                                <th class="text-center">Solde payé</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <template  v-for="listepayemen in eleves">
                                                <template  v-for="(elt,i) in listepayemen.eleves">
                                                    <tr  v-for="(ele,i) in elt.payements"  v-if="ele.paye!=0">

                                                        <td class="text-center">@{{ i+1 }}</td>
                                                        <td class="text-center">@{{ elt.nom }}</td>
                                                        <td class="text-center">@{{ elt.prenoms }}</td>
                                                        <td class="text-center">@{{ ele.created_at }}</td>
                                                        <td class="text-center"><span style="color: cornflowerblue">@{{ ele.paye }}</span></td>
                                                    </tr>
                                                </template>





                                            </template>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="Statu" class="tab-pane cont">

                            <div class="main-content container-fluid">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <span style="font-weight: bold">Etat du Payement</span>

                                    </div>
                                    <div class="panel-body">


                                        </div>
                                        <table class="table table-condensed table-hover table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>N°</th>

                                                <th class="text-center">Date de Payement</th>
                                                <th class="text-center">Solde payé</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <template  v-for="listepayement in eleves">
                                                <tr  v-for="(ele,i) in listepayement.eleves">
                                                <td class="text-center">@{{ ele.nom }}</td>
                                                <td class="text-center">@{{ ele.prenoms }}</td>
                                                <td class="text-center">@{{ ele.sexe }}</td>
                                                </tr>





                                            </template>

                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        </div>

    </template>



    <script src="{{ asset('js/vues/parent/Parentpayement.js') }}" type="module"></script>
    <script src="{{ asset('assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            App.init();
            // App.IconsFilter();
        });
    </script>

@endsection

@section('content')

    <Payements></Payements>


@endsection