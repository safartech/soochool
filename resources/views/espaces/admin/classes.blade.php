@extends("templates.wrapper.modern")
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('js/select2/css/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
@endsection


@section('js')


    <script type="text/javascript" src="{{asset('js/select2/js/select2.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/momentjs/moment.js')}}"></script>
    <script src="{{ asset('js/momentjs/moment-with-locales.js') }}" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            $('.select2').select2();
            /*$('.datetimepicker').datetimepicker(
                {
                    autoclose: !0,
                    componentIcon: ".mdi.mdi-calendar",
                    navIcons: {rightIcon: "mdi mdi-chevron-right", leftIcon: "mdi mdi-chevron-left"}
                }
            )*/


        })
    </script>
    <template id="classes">

        <div class="row">
            <div class="col-12 col-xl-3">
                <div id="accordionCrypto" role="tablist" aria-multiselectable="true">
                    <div class="card collapse-icon accordion-icon-rotate">


                        <div class="">
                            <h2 class="page-head-title" style="margin-left: 20px">Classes</h2>
                            <ol class="breadcrumb page-head-nav">
                                <li class="active" style="margin-left: 10px;">Liste des classes</li>

                            </ol>
                        </div>

                            <table class="table table-condensed table-hover table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">Non</th>
                                    <th class="text-center">Effectif</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="classe in classes" @click="classeClicked(classe)" :class="classeSelectedBgColor(classe)">
                                    <td class="text-center">@{{ classe.nom }}</td>
                                    <td class="text-center">@{{ classe.eleves_count }}</td>
                                </tr>
                                </tbody>
                            </table>

                    </div>
                </div>



                    </div>


            <div class="col-xl-9 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pills with dropdown &amp; Left Icon</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p>Use font icons before pill name to get pills with icon.</p>
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" id="homeEle-tab" data-toggle="pill" href="#homeEle" aria-expanded="true"><i class="la la-user"></i> Liste Eleve</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="profileEle-tab" data-toggle="pill" href="#profileEle" aria-expanded="false"><i class="la la-user"></i> Pedagogie/Prof</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="aboutEle-tab" data-toggle="pill" href="#aboutEle" aria-expanded="false"><i class="la la-envelope"></i> Matiere</a>
                                </li>
                            </ul>
                            <div class="tab-content px-1 pt-1">
                                <div role="tabpanel" class="tab-pane active show" id="homeEle" aria-labelledby="homeEle-tab" aria-expanded="true">
                                    <div id="eleves-list" class="tab-pane active cont">
                                        <table class="table table-condensed table-hover table-bordered table-striped">

                                            <thead>
                                            <tr>
                                                <th>Nom complet</th>
                                                <th>Sexe</th>
                                                <th>Date de naissance</th>
                                                <th>Adresse</th>
                                                <th>Contact</th>
                                                <th>Nationalite</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="eleve in eleves">
                                                <td>@{{ eleve.nom_complet }}</td>
                                                <td>@{{ eleve.sexe }}</td>
                                                <td>@{{ moment(eleve.date_nsce).format('DD /MM /YYYY') }}</td>
                                                <td>@{{ eleve.adresse }}</td>
                                                <td>@{{ eleve.telephone }}</td>
                                                <td>@{{ eleve.nationalite }}</td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <div class="tab-pane " id="profileEle" role="tabpanel" aria-labelledby="profileEle-tab" aria-expanded="false">
                                    <div id="profs-list" class="tab-pane cont">
                                        <table class="table table-condensed table-hover table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Nom complet</th>
                                                <th>Sexe</th>
                                                <th>Adresse</th>
                                                <th>Mobile</th>
                                                <th>Domicile</th>
                                                <th>Matière enseignée</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="intervention in interventions">
                                                <td>@{{ intervention.prof.nom_complet }}</td>
                                                <td>@{{ intervention.prof.sexe }}</td>
                                                <td>@{{ intervention.prof.adresse }}</td>
                                                <td>@{{ intervention.prof.tel_mobile }}</td>
                                                <td>@{{ intervention.prof.tel_domicile }}</td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane" id="aboutEle" role="tabpanel" aria-labelledby="aboutEle-tab" aria-expanded="false">
                                    <div id="meatieres-list" class="tab-pane">
                                        <table class="table table-condensed table-hover table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Intitulé</th>
                                                <th>Code</th>
                                                <th>Couleur</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           {{-- <tr v-for="intervention in interventions">
                                               --}}{{-- <td>@{{ intervention.matiere.intitule }}</td>
                                                <td>@{{ intervention.matiere.code }}</td>
                                                <td :style="{'background-color':intervention.matiere.couleur}"></td>--}}{{--
                                            </tr>--}}
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
    </template>

    <script type="module" src="{{asset('js/vues/admin/classes.js')}}"></script>
    <script src="{{ asset('assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>

@endsection


@section('content')

    <classe></classe>

@endsection

