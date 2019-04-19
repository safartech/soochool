@extends("templates.wrapper.modern")
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/select2/css/select2.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
@endsection

@section('js')
    <script src="{{ asset('js/select2/js/select2.min.js') }}" type="module"></script>
    <script type="text/javascript" src="{{asset('js/momentjs/moment.js')}}"></script>
    <script src="{{ asset('js/momentjs/moment-with-locales.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/vues/protected/interventions.js') }}" type="module"></script>

    <template id="interventions">
        <div class="col-md-12 col-sm-12">
            <div class="card border-top-primary">
                <div class="card-header">
                    <h4 class="card-title">Intervention</h4>
                    <span class="panel-subtitle">Association des professeurs aux classes par rapport aux matières</span>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>


                <div class="col-xl-12 col-lg-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Icon Tab with bottom line</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-underline nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="activeIcon12-tab1" data-toggle="tab" href="#activeIcon12" aria-controls="activeIcon12" aria-expanded="true"><i class="ft-heart"></i> Active</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="linkIcon12-tab1" data-toggle="tab" href="#linkIcon12" aria-controls="linkIcon12" aria-expanded="false"><i class="ft-link"></i> Link</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="linkIconOpt11-tab1" data-toggle="tab" href="#linkIconOpt11" aria-controls="linkIconOpt11"><i class="ft-external-link"></i> Link</a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1 pt-1">
                                    <div role="tabpanel" class="tab-pane active" id="activeIcon12" aria-labelledby="activeIcon12-tab1" aria-expanded="true">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-primary white">
                                                <tr>
                                                    <th >Classe</th>
                                                    <th >Matière</th>
                                                    <th >Professeur</th>
                                                    <th >Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="i in interventions">



                                                    <td class="text-center">@{{ i.classe.nom}}</td>
                                                    <td class="text-center">@{{ i.matiere.intitule }}</td>
                                                    <td class="text-center">@{{ i.prof.nom_complet }}</td>
                                                    <td class="text-center" ><button  data-toggle="modal" @click="showInterventionSetterModal(i.classe,i.matiere)" class="btn btn-info md-close">Modifier</button></td>






                                                </tr>


                                                </td>

                                                </tr>



                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="linkIcon12" role="tabpanel" aria-labelledby="linkIcon12-tab1" aria-expanded="false">

                                        <div class="col-lg-12 col-xl-6">

                                            <div class="card collapse-icon accordion-icon-rotate" v-for="classe in classes">
                                                <div id="headingCollapse51"  class="card-header border-success" v-if="classe.nom=='6eme'">
                                                    <a data-toggle="collapse" href="#6eme" aria-expanded="false" aria-controls="collapse51" class="card-title lead success">@{{ classe.nom }}</a>
                                                </div>

                                                <div id="headingCollapse51"  class="card-header border-success" v-if="classe.nom=='5eme'">
                                                    <a data-toggle="collapse" href="#5eme" aria-expanded="false" aria-controls="collapse51" class="card-title lead success">@{{ classe.nom }}</a>
                                                </div>

                                                <div id="6eme" role="tabpanel"  class="card-collapse collapse ">

                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            Caramels dessert chocolate cake pastry jujubes bonbon. Jelly wafer jelly beans. Caramels chocolate cake liquorice cake wafer jelly beans croissant apple pie. Oat cake brownie pudding jelly beans. Wafer liquorice chocolate bar chocolate bar liquorice. Tootsie roll gingerbread gingerbread chocolate bar tart chupa chups sugar plum toffee. Carrot cake macaroon sweet danish. Cupcake soufflé toffee marzipan candy canes pie jelly-o. Cotton candy bonbon powder topping carrot cake cookie caramels lemon drops liquorice. Dessert cookie ice cream toffee apple pie.
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {{--<div class="col-sm-12">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading ">Interventions<span class="panel-subtitle">Association des professeurs aux classes par rapport aux matières</span></div>

                <div class="tab-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#table-like" data-toggle="tab"><span class="icon mdi mdi-calendar-alt"></span>Liste des interventions</a></li>
                        <li><a href="#by-classe" data-toggle="tab"><span class="icon mdi mdi-calendar"></span>Classes</a></li>
                        <li><a href="#group-define" data-toggle="tab"><span class="icon mdi mdi-calendar"></span>Multiple intervention</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="table-like" class="tab-pane active cont">
                            <div class="panel-body">
                                <button class="btn  btn-success btn-space pull-right" data-toggle="modal" data-target="#form-bp1" type="button">Ajouter</button>
                                <br>
                                <br>
                                <table class="table table-condensed table-hover table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Classe</th>
                                        <th class="text-center">Matière</th>
                                        <th class="text-center">Professeur</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="i in interventions">
                                        <td class="text-center">@{{ i.classe.nom}}</td>
                                        <td class="text-center">@{{ i.matiere.intitule }}</td>
                                        --}}{{--<td class="text-center">@{{ i.prof.nom_complet }}</td>--}}{{--
                                        <td class="text-center" ><button @click="showInterventionSetterModal(i.classe,i.matiere)" class="btn btn-default">Modifier</button></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="by-classe" class="tab-pane cont" >
                            <div class="panel-body">
                                <div id="accordion1" class="panel-group accordion" >

                                    <div class="panel panel-default panel-border-color panel-border-color-info" v-for="classe in classes">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" :href="'#'+classe.nom" class="collapsed"><i class="icon mdi mdi-chevron-down"></i>@{{ classe.nom }}</a></h4>
                                        </div>
                                        <div :id="classe.nom" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <table class="table table-condensed table-hover table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Matiere</th>
                                                        <th class="text-center">Professeur</th>
                                                        <th class="text-center">Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="(mat,i) in classe.niveau.matieres">
                                                        <td class="text-center">@{{ i+1 }}</td>
                                                        <td class="text-center">@{{ mat.intitule }}</td>
                                                        <td class="text-center">@{{ getInterventionProfName(classe.id,mat.id) }}</td>
                                                        <td class="text-center"><button class="btn btn-default" @click="showInterventionSetterModal(classe,mat)">Modifier</button></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="group-define" class="tab-pane cont">
                            <div class="panel-body">
                                <div class="col-lg-3">
                                    <div class=""><label class="control-label">Professeur</label></div>
                                    <select style="" name="" id="select2-prof" class="select2">
                                        <option :value="null" disabled selected  >Selectionner une classe</option>
                                        <option v-for="prof in profs" :value="prof.id">@{{ prof.nom_complet }}</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <div class=""><label>Matiere</label></div>
                                    <div class="">
                                        <select id="select2-matiere" class="select2 ">
                                            <option :value="null" disabled selected  >Selectionner une matière</option>
                                            <option v-for="matiere in matieres"  :value="matiere.id">@{{ matiere.intitule }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class=""><label class="control-label">Classes</label></div>
                                    <div class="">
                                        <select multiple id="select2-classes" class="select2">
                                            --}}{{--<option :value="null" disabled selected >Selectionner une classe</option>--}}{{--
                                            <option v-for="classe in classes" :value="classe.id">@{{ classe.nom }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="btn-toolbar">
                                        <label>Action</label>
                                        <div class="">
                                            <button class="btn btn-default btn-xl btn-space btn-primary" @click="createMultipleIntervention()" data-toggle="tooltip" data-placement="top" title="Créer les interventions">Valider ces interventions</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            --}}{{--Modals--}}{{--
            <div id="interv-setter-modal"  role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Definir une intervention</h3>
                        </div>
                        <div class="modal-body">

                            <div class="form-group col-md-12">
                                <label >Classe</label>
                                <div >
                                    <select class="form-control"  v-model="currentIntervention.classe_id">
                                        <option :value="currentClasse.id" selected disabled="">@{{ currentClasse.nom }}</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label >Matiere</label>
                                <div >
                                    <select class="form-control"  v-model="currentIntervention.matiere_id">
                                        <option :value="currentMatiere.id">@{{ currentMatiere.intitule }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label >Professeur</label>
                                <div >
                                    <select class="form-control"  v-model="currentIntervention.personnel_id">
                                        <option :value="prof.id" v-for="prof in profs">@{{ prof.nom_complet }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                            <button type="button" data-dismiss="modal" class="btn btn-primary md-close" v-show="interventionReadyForSetting" @click="setIntervention()">Modifier</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
    </template>
@endsection

@section('content')
    <interventions></interventions>
@endsection