@extends("default")
@section('css')
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/select2/css/select2.min.css') }}"/>
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('js/select2/css/select2.min.css') }}"--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/bootstrap-slider/css/bootstrap-slider.css') }}"/>--}}
    <link rel="stylesheet" href="{{ asset('assets/lib/datatables/css/dataTables.bootstrap.min.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css"/>--}}
@endsection

@section('js')
    <script src="{{ asset('assets/lib/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/lib/datatables/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/tooltip/tooltip.js') }}" type="text/javascript"></script>



    <script type="text/javascript">

        $(document).ready(function(){

//           $('[data-toggle="tooltip"]').tooltip()
            $('.tooltipped').tooltip({

            });

            $( ".select2" ).select2();

        });
    </script>


    <template id="bulletins" type="text\template">
        <div class="">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="panel panel-default panel-border-color panel-border-color-primary">
                        <div class="panel-heading panel-heading-divider">Bulletins<span class="panel-subtitle">Bulletins de notes.</span></div>
                        <div class="panel-body">

                            {{--Cycles--}}
                            {{--<div class="col-lg-3">
                                <div class=""><label>Cycles</label></div>
                                <div class="">
                                    <select id="select2-cycle" class="select2 " v-model="selectedCycleId">
                                        <option :value="0" disabled selected  >Selectionner un cycle</option>
                                        <option v-for="cycle in cycles"  :value="cycle.id">@{{ cycle.nom }}</option>
                                    </select>
                                </div>
                            </div>--}}

                            {{--Niveaux--}}
                            {{--<div class="col-lg-3">
                                <div class=""><label>Niveau</label></div>
                                <div class="">
                                    <select id="select2-niveau" class="select2 "  v-model="selectedNiveauId">
                                        <option :value="0" disabled selected  >Selectionner une niveau</option>
                                        <option v-for="niveau in niveaux" :value="niveau.id">@{{ niveau.nom }}</option>
                                    </select>
                                </div>
                            </div>--}}

                            <div class="col-lg-12">
                                <div class="col-lg-3">
                                    <div class=""><label class="control-label">Classes</label></div>
                                    <div class="">
                                        <select id="select2-classe" class="select2">
                                            <option value="0" disabled selected  >Selectionner une classe</option>
                                            <option v-for="classe in classes" :value="classe.id">@{{ classe.nom }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class=""><label class="control-label">Sessions</label></div>
                                    <div class="">
                                        <select id="select2-session" class="select2">
                                            <option value="0" disabled selected  >Selectionner une Session</option>
                                            <option v-for="session in sessions" :value="session.id">@{{ session.nom }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="btn-toolbar">
                                        <label>Options</label>
                                        {{--<div role="group" class="btn-xl btn-group btn-group-justified xs-mb-10">
                                            <a href="#" class="btn-xl btn btn-rounded btn-default">Recharger</a>
                                            --}}{{--<a href="#" class="btn-xl btn btn-default">Imprimer</a>--}}{{--
                                            <a href="#" class="btn-xl btn btn-rounded btn-default">Services</a>
                                        </div>--}}
                                        <div  class="" role="group">
                                            <a href="#" @click="reload" class="btn-xl btn  btn-default" data-toggle="tooltip" data-placement="top" title="Recharger les données"><i class="icon mdi mdi-refresh"></i></a>
                                            {{--<a href="#" class="btn-xl btn btn-default " title="Popover on top" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."><i class="icon mdi mdi-print"></i></a>--}}
                                            <a href="#" class="btn-xl btn btn-default " data-toggle="tooltip" data-placement="top" title="Imprimer emploi du temps"><i class="icon mdi mdi-print"></i></a>
                                            {{--<a href="#" class="btn-xl btn btn-default " data-toggle="tooltip" data-placement="top" title="Programmer un cours" @click="showCoursCreatorModal"><i class="icon mdi mdi-plus"></i></a>--}}
                                            {{--<a href="#" class="btn-xl btn  btn-default active " data-toggle="tooltip" data-placement="top" title="Option inactive"><i class="icon mdi mdi-settings"></i></a>--}}
                                            {{--<a href="#" class="btn-xl btn  btn-default active tooltipped" ><i class="icon mdi mdi-settings"></i></a>--}}
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Elèves
                            <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-condensed table-hover table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nom</th>
                                    <th class="text-center">Prénoms</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(eleve,i) in eleves" @click="eleveClick(eleve)" :class="isSelected(eleve)">
                                    <td>@{{ i+1 }}</td>
                                    <td class="text-center">@{{ eleve.nom }}</td>
                                    <td class="text-center">@{{ eleve.prenoms }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="panel panel-default" v-show="showBulletin">
                        <div class="panel-heading">Bulletin <b>@{{ getEleveName() }}</b>
                            <div class="tools">
                                <a :href="printLink(1)" target="_blank"><span class="icon mdi mdi-eye"></span></a>
                                <a :href="printLink(0)"><span class="icon mdi mdi-download"></span></a>
                                {{--<a :href="seeLink" target="_blank"><span class="icon mdi mdi-eye"></span></a>--}}
                                <span class="icon mdi mdi-more-vert"></span></div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-condensed table-hover table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Matières</th>
                                    <th>Coef</th>
                                    <th colspan="2" >Notes de classe</th>
                                    <th>Moyenne classe</th>
                                    <th>Notes Compo</th>
                                    <th>Moy. gen</th>
                                    <th>Moy Coef</th>
                                    {{--<th>Rang</th>--}}
                                    <th>Appréciation</th>
                                    {{--<th>Prof</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="matiere in obligatoires">
                                    <td >@{{ matiere.intitule }}</td>
                                    <td class="text-center">@{{ matiere.coef }}</td>
                                    <td class="text-center">@{{ matiere.note_ds }}</td>
                                    <td class="text-center">@{{ matiere.note_interro }}</td>
                                    <td class="text-center">@{{ matiere.note_classe }}</td>
                                    <td class="text-center">@{{ matiere.note_compo }}</td>
                                    <td class="text-center">@{{ matiere.moy_gen }}</td>
                                    <td class="text-center">@{{ coef(matiere) }}</td>
                                    {{--<td class="text-center"></td>--}}
                                    <td class="text-center" @click="apprFocus(matiere)">
                                        <span>@{{ getAppreciation(matiere) }}</span>
                                        {{--<span v-show="!showAppreciationInput(matiere)">@{{ getAppreciation(matiere) }}</span>--}}
                                        {{--<input v-show="showAppreciationInput(matiere)" v-model="getAppreciation(matiere)" @focus="apprInputFocus(matiere)" @blur="apprBlur(matiere)" type="text" class="form-control">--}}
                                    </td>
                                </tr>

                                <tr class="primary">
                                    <td class="text-center">Sous-Total Mat. obl</td>
                                    <td class="text-center">@{{ total(obligatoires,"coef") }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center">@{{ total(obligatoires,"moy_coef") }}</td>
                                    {{--<td class="text-center"></td>--}}
                                    <td class="text-center"></td>
                                </tr>

                                <tr v-for="matiere in facultatives">
                                    <td >@{{ matiere.intitule }}</td>
                                    <td class="text-center">@{{ matiere.coef }}</td>
                                    <td class="text-center">@{{ matiere.note_ds }}</td>
                                    <td class="text-center">@{{ matiere.note_interro }}</td>
                                    <td class="text-center">@{{ matiere.note_classe }}</td>
                                    <td class="text-center">@{{ matiere.note_compo }}</td>
                                    <td class="text-center">@{{ matiere.moy_gen }}</td>
                                    <td class="text-center">@{{ coef(matiere) }}</td>
                                    {{--<td class="text-center"></td>--}}
                                    <td class="text-center" @click="apprFocus(matiere)">
                                        <span>@{{ getAppreciation(matiere) }}</span>
                                        {{--<span v-show="!showAppreciationInput(matiere)">@{{ getAppreciation(matiere) }}</span>--}}
                                        {{--<input v-show="showAppreciationInput(matiere)" v-model="getAppreciation(matiere)" @focus="apprInputFocus(matiere)" @blur="apprBlur(matiere)" type="text" class="form-control">--}}
                                    </td>
                                </tr>

                                <tr class="primary">
                                    <td class="text-center">Sous-Total Mat. fac</td>
                                    <td class="text-center">@{{ total(facultatives,"coef") }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center">@{{ total(facultatives,"moy_coef") }}</td>
                                    {{--<td class="text-center"></td>--}}
                                    <td class="text-center"></td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tr class="">
                                    <td><b>Moyenne</b></td>
                                    <td>@{{ getMoy() }}</td>
                                    {{--<td>Rang</td>
                                    <td></td>--}}
                                    <td><b>Moyenne la plus faible</b></td>
                                    <td>@{{ smallest_moy }}</td>
                                    <td> <b>Moyenne la plus forte</b></td>
                                    <td>@{{ biggest_moy }}</td>
                                    <td><b>Moyenne la classe</b></td>
                                    <td>@{{ moy_of_classe }}</td>

                                </tr>
                            </table>
                        </div>
                    </div>

                </div>

                <div id="appr-modal" tabindex="-1" role="dialog" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <div class="text-primary"><span class="modal-main-icon mdi mdi-info-outline"></span></div>
                                    <h3>Appréciation</h3>
                                    {{--<h3>@{{ selectedEleve.nom_complet }}</h3>--}}
                                    <h3><b>@{{ clickedAppreciationMatiere.intitule }}</b></h3>
                                    {{--<p>Veuillez saisir l'appréciation.<br>-</p>--}}
                                    <div class="">
                                        <form action="">
                                            <div class="form-group xs-pt-10">
                                                <label>Veuillez saisir l'appréciation</label>
                                                <input id="appr-text" type="text" v-model="tempAppr" placeholder="Saisir l'appréciation" class="form-control">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="xs-mt-50">
                                        <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Cancel</button>
                                        <button type="button" data-dismiss="modal" @click="apprBlur()" class="btn btn-space btn-primary">Valider</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </template>


    <script type="module" src="{{ asset('js/vues/prof/evaluations/bulletins.js') }}"></script>
@endsection

@section('content')

    <bulletins></bulletins>

@endsection