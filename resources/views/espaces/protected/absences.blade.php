@extends("templates.wrapper.modern")
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/select2/css/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/lib/datatables/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/fullcalendar/css/fullcalendar.css') }}"/>
    <style>
        .select2{
            width: 100%;
        }
        .index{
            cursor: pointer;
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('assets/lib/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/lib/datatables/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/tooltip/tooltip.js') }}" type="text/javascript"></script>

    {{--<script src="{{ asset('assets/lib/moment.js/min/moment.min.js') }}" type="text/javascript"></script>--}}
    <script src="{{ asset('js/momentjs/moment.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/momentjs/moment-with-locales.js') }}" type="text/javascript"></script>
    {{--<script src="{{ asset('assets/lib/jquery.fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>--}}
    <script src="{{ asset('js/plugins/fullcalendar/js/fullcalendar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/fullcalendar/js/locale-all.js') }}" type="text/javascript"></script>
    {{--<script src="{{ asset('js/plugins/fullcalendar/fullcalendar-script.js') }}" type="text/javascript"></script>--}}

    <script type="module" src="{{ asset('js/vues/protected/absences.js') }}"></script>

    <template id="absence">
        <div>
            <div class="col-lg-12" style="padding:0;">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><h4>Absences</h4></div>
                        <h6>Emplois du temps et liste de présence.</h6>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Cycles</label>
                                            <select id="select2-classe" class="select2 form-control">
                                                <option value="0" disabled selected  >Selectionner une classe</option>
                                                <option v-for="classe in classes" :value="classe.id">@{{ classe.nom }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="input-group-prepend">
                                          	<span class="input-group-text">
                                          			<span class="la la-print"></span>
                                          	</span>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="input-group-prepend">
                                          	<span class="input-group-text">
                                          			<span class="la la-print"></span>
                                          	</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12" style="padding:0;">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive full-calendar">
                                <table class="table table-bordered mb-0">
                                    <thead class="">
                                    <tr>
                                        <th class="text-center"><span class="label bg-danger white">Appel de présence non éffectué</span></th>
                                        <th class="text-center"><span class="bg-primary white">Appel de presence éffectué</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(eleve,i) in selectedClasse.eleves">
                                        <td class="text-center">@{{ i+1 }}</td>
                                        <td class="text-center">@{{ eleve.nom_complet }}</td>
                                        <td class="text-center">@{{ getEleveAssiduite(eleve) }}</td>
                                        <td class="text-center">@{{ getEleveConduite(eleve) }}</td>
                                        <td class="text-center">@{{ getEleveTravail(eleve) }}</td>
                                        <td class="text-center">@{{ getEleveRetards(eleve) }}</td>
                                        <td class="text-center">@{{ getEleveAbsences(eleve) }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-spce btn-default" @click="showAssiduiteSetter(eleve)">Définir</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="cdt-calendar"></div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="col-lg-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">Absences<span class="panel-subtitle">Emplois du temps et liste de présence.</span></div>
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

                        <div class="col-lg-3 col-md-offset-6">
                            <div class=""><label class="control-label">Classes</label></div>
                            <div class="">
                                <select id="select2-classe" class="select2">
                                    <option value="0" disabled selected  >Selectionner une classe</option>
                                    <option v-for="classe in classes" :value="classe.id">@{{ classe.nom }}</option>
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
                            {{--<div class=""><label>Options</label></div>
                            <div class="">
                                <div class="btn-toolbar">
                                    <div class="btn-group btn-space">
                                        <button  type="button"  @click="reload" class="btn btn-warning btn-xl tooltipped"><i class="icon mdi mdi-refresh"></i></button>
                                        <button type="button" class="btn btn-default btn-xl" v-show="isReady">Options</button>
                                        <button type="button" data-toggle="dropdown" v-show="isReady" class="btn btn-primary dropdown-toggle btn-xl"><span class="mdi mdi-chevron-down"></span><span class="sr-only">Toggle Dropdown</span></button>
                                        <ul role="menu" class="dropdown-menu">
                                            <li @click="showEvaluationCreateModal"><a>Nouvelle évaluation</a></li>
                                            <li class="divider"></li>
                                            <li><a>Imprimer relevé</a></li>
                                        </ul>
                                    </div>
                                    --}}{{--<div class="btn-group btn-space">
                                        <button  type="button"  @click="reload" class="btn btn-warning tooltipped"><i class="icon mdi mdi-refresh">Recherger</i></button>
                                        <button type="button" class="btn btn-primary"><i class="icon mdi mdi-plus">Nouvelle évaluation</i></button>
                                        <a type="button" class="btn btn-danger"><i class="icon mdi mdi-print">Imprimer relevé</i></a>
                                        <button type="button" class="btn btn-default"><i class="icon mdi mdi-settings"></i></button>
                                        --}}{{----}}{{--<button type="button" class="btn btn-default"><i class="icon mdi mdi-favorite-outline"></i></button>--}}{{----}}{{--
                                    </div>--}}{{--
                                </div>
                            </div>--}}


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="">
                    <div class="">
                        <div class="row full-calendar">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td class="text-center" ><span class="label label-primary">Appel de présence non éffectué</span></td>
                                        <td class="text-center"><span class="label label-danger">Appel de presence éffectué</span></td>
                                    </tr>
                                    </thead>
                                </table>

                                <div class="panel panel-default panel-fullcalendar">
                                    <div class="panel-body">
                                        <div id="cdt-calendar"></div>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="col-md-3">
                                <div class="panel panel-default fullcalendar-external-events">
                                    <div class="panel-heading panel-heading-divider">Draggable Events</div>
                                    <div class="panel-body">
                                        <div id="external-events">
                                            <div class="fc-event">My Event 1</div>
                                            <div class="fc-event">My Event 2</div>
                                            <div class="fc-event">My Event 3</div>
                                            <div class="fc-event">My Event 4</div>
                                            <div class="fc-event">My Event 5</div>
                                            <p>
                                                <input id="drop-remove" type="checkbox">
                                                <label for="drop-remove">remove after drop</label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}
                        </div>
                    </div>
                </div>
            </div> -->

            {{--Modals--}}

            <div id="list-modal" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Détails de la séance du @{{ selectedEvent.start.format("D MMMM YYYY") }}</h3>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" v-model="selectedEvent.id">
                            <div class="col-lg-12">
                                {{--<h4>Détails de la séance du @{{ selectedEvent.start.format("D MMMM YYYY") }}</h4>--}}
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Classe</th>
                                        <th>Horaire</th>
                                        <th>Matière</th>
                                        <th>Professeur</th>
                                        <th>Absents</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>@{{ selectedEvent.classe}}</th>
                                        <th>@{{ selectedEvent.horaire }}</th>
                                        <th>@{{ selectedEvent.matiere}}</th>
                                        <th>@{{ selectedEvent.prof }}</th>
                                        <th>@{{ currentAbsents.length }}</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-lg-12">
                                <h3>Liste de présence</h3>
                            </div>
                            <div class="col-lg-12">
                                <table class="table table-condensed table-hover table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th class="">Elèves</th>
                                        {{--<th class="text-center">Nombre d'absences</th>--}}
                                        <th class="text-center">Absence</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(eleve,i) in selectedClasse.eleves">
                                        <td>@{{ eleve.nom_complet }}</td>
                                        <td class="text-center">
                                            <div  class="be-checkbox be-checkbox-color inline">
                                                <input v-model="currentAbsents" :id="eleve.id" :value="eleve.id" type="checkbox" >
                                                <label :for="eleve.id"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <div class="col-lg-12">
                                {{--<button type="button" data-dismiss="modal" class="btn btn-danger md-close">Supprimer</button>--}}
                                {{--<button type="button" data-dismiss="modal" class="btn btn-primary md-close" @click="updateSeance()" >Modifier</button>--}}
                                <button type="button" data-dismiss="modal" class="btn btn-success md-close" @click="saveAbsents()" >Enregistrer</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default md-close">Quitter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </template>
@endsection

@section('content')
    <Absence></Absence>
@endsection
