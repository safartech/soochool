@extends("templates.wrapper.modern")
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/select2/css/select2.min.css') }}"/>
@endsection

@section('js')
    <script src="{{ asset('js/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/tooltip/tooltip.js') }}" type="text/javascript"></script>
    <script type="module" src="{{ asset('js/vues/protected/conseil.js')}}"></script>
    {{--<script src="{{ asset('assets/modern/js/scripts/forms/checkbox-radio.js') }}"></script>--}}
    <template id="conseil">
        <div>
            <div class="col-lg-12" style="padding:0;">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><h4>Conseil de classes</h4></div>
                        <h6>Definir l'assiduités des élèves lors du conseil de classe chaque trimestre</h6>
                    </div>

                    <div class="col-md-12">
                        <div class="card-header">
                            <div class="col-md-6">
                                <div class=""><label>Sessions</label></div>
                                <select id="select2-sessions" class="select2 form-control">
                                    <option :value="null" disabled selected  >Selectionner une session</option>
                                    <option v-for="session in sessions" :value="session.id">@{{ session.nom }}</option>
                                </select>
                            </div>
                            <div class="heading-elements col-md-5">
                                <div class=""><label>Classes</label></div>
                                <select id="select2-classes" class="select2 form-control">
                                    <option :value="null" disabled selected  >Selectionner une classe</option>
                                    <option v-for="classe in classes" :value="classe.id">@{{ classe.nom }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><h5>Conseil de classe du :<b>@{{ selectedSession.nom }}</b>
                                Classe :<b>@{{ selectedClasse.nom }}</b>
                                Effectif :<b>@{{ selectedClasse.eleves_count }}</b></h5></div>
                    </div>

                    <div class="col-md-12">
                        <div class="card-header">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead class="bg-primary white">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Elèves</th>
                                        <th class="text-center">Assiduite</th>
                                        <th class="text-center">Conduite</th>
                                        <th class="text-center">Travail</th>
                                        <th class="text-center">Retards</th>
                                        <th class="text-center">Absences</th>
                                        <th class="text-center">Actions</th>
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
                        </div>
                    </div>
                </div>
            </div>

            {{--<div class="col-lg-12">--}}
                {{--<div class="panel panel-default panel-border-color panel-border-color-primary">--}}
                    {{--<div class="panel-heading panel-heading-divider">Consl de classes<span class="panel-subtitle">Definir l'assiduités des élèves lors du conseil de classe chaque trimestre.</span></div>--}}
                    {{--<div class="panel-body">--}}

                        {{--<div class="col-lg-6">--}}
                            {{--<div class=""><label>Sessions</label></div>--}}
                            {{--<div class="">--}}
                                {{--<select id="select2-sessions" class="select2 ">--}}
                                    {{--<option :value="null" disabled selected  >Selectionner une session</option>--}}
                                    {{--<option v-for="session in sessions" :value="session.id">@{{ session.nom }}</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}

                        {{--</div>--}}

                        {{--<div class="col-lg-6">--}}
                            {{--<div class=""><label class="control-label">Classes</label></div>--}}
                            {{--<div class="">--}}
                                {{--<select id="select2-classes" class="select2">--}}
                                    {{--<option :value="null" disabled selected  >Selectionner une classe</option>--}}
                                    {{--<option v-for="classe in classes" :value="classe.id">@{{ classe.nom }}</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-lg-3">--}}
                            {{--<div class="btn-toolbar">--}}
                                {{--<label>Action</label>--}}
                                {{--<div class="">--}}
                                    {{--<button style="width: 100%;" class="btn btn-default btn-xl btn-space btn-primary" data-toggle="tooltip" data-placement="top" title="Créer les interventions">Rechercher</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-12" v-show="isReady">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">Conseil de classe du :<b>@{{ selectedSession.nom }}</b>--}}
                        {{--Classe :<b>@{{ selectedClasse.nom }}</b>--}}
                        {{--Effectif :<b>@{{ selectedClasse.eleves_count }}</b>--}}
                        {{--<div class="tools">--}}
                            {{--<span class="icon mdi mdi-download"></span>--}}
                            {{--<span class="icon mdi mdi-close-circle"></span>--}}
                            {{--<span class="icon mdi mdi-more-vert"></span></div>--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--<table id="mainTable" class="table table-condensed table-hover table-bordered table-striped">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th class="text-center">#</th>--}}
                                {{--<th class="text-center">Elèves</th>--}}
                                {{--<th class="text-center">Assiduite</th>--}}
                                {{--<th class="text-center">Conduite</th>--}}
                                {{--<th class="text-center">Travail</th>--}}
                                {{--<th class="text-center">Retards</th>--}}
                                {{--<th class="text-center">Absences</th>--}}
                                {{--<th class="text-center">Actions</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--<tr v-for="(eleve,i) in selectedClasse.eleves">--}}
                                {{--<td class="text-center">@{{ i+1 }}</td>--}}
                                {{--<td class="text-center">@{{ eleve.nom_complet }}</td>--}}
                                {{--<td class="text-center">@{{ getEleveAssiduite(eleve) }}</td>--}}
                                {{--<td class="text-center">@{{ getEleveConduite(eleve) }}</td>--}}
                                {{--<td class="text-center">@{{ getEleveTravail(eleve) }}</td>--}}
                                {{--<td class="text-center">@{{ getEleveRetards(eleve) }}</td>--}}
                                {{--<td class="text-center">@{{ getEleveAbsences(eleve) }}</td>--}}
                                {{--<td class="text-center">--}}
                                    {{--<button class="btn btn-spce btn-default" @click="showAssiduiteSetter(eleve)">Définir</button>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}


            <div id="assiduite_setter"  role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">@{{ selectedSession.nom }}<br><b>@{{ selectedEleve.nom_complet }}</b></h3>
                            <span class="modal-title"></span>
                        </div>

                        <div class="modal-body ">
                            <div class="form-group col-md-12">
                                <label class="control-label">Assiduité</label>
                                <div class="">
                                    <div class="be-radio be-radio-color has-success inline col-lg-3">
                                        <input type="radio" value="Bonne" checked="" name="assiduite" v-model="selectedEleveConseil.assiduite" id="ass1">
                                        <label for="ass1">Bonne</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-success inline col-lg-3">
                                        <input type="radio" value="Assez-bonne" name="assiduite" v-model="selectedEleveConseil.assiduite" id="ass2">
                                        <label for="ass2">Assez-bonne</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-warning inline col-lg-3">
                                        <input type="radio" name="rad4" value="Passable" v-model="selectedEleveConseil.assiduite" id="ass3">
                                        <label for="ass3">Passable</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-warning inline col-lg-3">
                                        <input type="radio" value="Médiocre" name="assiduite" v-model="selectedEleveConseil.assiduite" id="ass4">
                                        <label for="ass4">Médiocre</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-danger inline col-lg-3">
                                        <input type="radio" value="Irrégulière" name="assiduite" v-model="selectedEleveConseil.assiduite" id="ass5">
                                        <label for="ass5">Irrégulière</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-danger inline col-lg-3">
                                        <input type="radio" value="Souvent en retard" name="assiduite" v-model="selectedEleveConseil.assiduite" id="ass6">
                                        <label for="ass6">Souvent en retard</label>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Conduite</label>
                                <div class="">
                                    <div class="be-radio be-radio-color has-success inline col-lg-3">
                                        <input type="radio" checked="" name="conduite" v-model="selectedEleveConseil.conduite" value="Bonne" id="cond34">
                                        <label for="cond34">Bonne</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-success inline col-lg-3">
                                        <input type="radio" name="conduite" v-model="selectedEleveConseil.conduite" value="Assez-bonne" id="cond35">
                                        <label for="cond35">Assez-bonne</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-warning inline col-lg-3">
                                        <input type="radio" name="conduite" v-model="selectedEleveConseil.conduite" value="Passable" id="cond36">
                                        <label for="cond36">Passable</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-warning inline col-lg-3">
                                        <input type="radio" name="conduite" v-model="selectedEleveConseil.conduite" value="Médiocre" id="cond37">
                                        <label for="cond37">Médiocre</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-danger inline col-lg-3">
                                        <input type="radio" name="conduite" v-model="selectedEleveConseil.conduite" value="Avertissement" id="cond38">
                                        <label for="cond38">Avertissement</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-danger inline col-lg-3">
                                        <input type="radio" name="conduite" v-model="selectedEleveConseil.conduite" value="Blâme" id="cond39">
                                        <label for="cond39">Blâme</label>
                                    </div>


                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Travail</label>
                                <div class="">
                                    <div class="be-radio be-radio-color has-success inline col-lg-3">
                                        <input type="radio" checked="" v-model="selectedEleveConseil.travail" value="Très bon" name="travail" id="trav34">
                                        <label for="trav34">Très bon</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-success inline col-lg-3">
                                        <input type="radio" name="travail" v-model="selectedEleveConseil.travail" value="Bon" id="trav35">
                                        <label for="trav35">Bon</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-success inline col-lg-3">
                                        <input type="radio" name="travail" v-model="selectedEleveConseil.travail" value="Assez-bon" id="trav36">
                                        <label for="trav36">Assez bon</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-warning inline col-lg-3">
                                        <input type="radio" name="travail" v-model="selectedEleveConseil.travail" value="Passable" id="trav37">
                                        <label for="trav37">Passable</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-warning inline col-lg-3">
                                        <input type="radio" name="travail" v-model="selectedEleveConseil.travail" value="Insuffisant" id="trav38">
                                        <label for="trav38">Insuffisant</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-danger inline col-lg-3">
                                        <input type="radio" name="travail" v-model="selectedEleveConseil.travail" value="Médiocre" id="trav39">
                                        <label for="trav39">Médiocre</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-danger inline col-lg-3">
                                        <input type="radio" name="travail" v-model="selectedEleveConseil.travail" value="Avertissement" id="trav40">
                                        <label for="trav40">Avertissement</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-danger inline col-lg-3">
                                        <input type="radio" name="travail" v-model="selectedEleveConseil.travail" value="Blâme" id="trav41">
                                        <label for="trav41">Blâme</label>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Nombre de retards</label>
                                <input type="number" placeholder="Retards" v-model="selectedEleveConseil.retards" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Nombre d'absences</label>
                                <input type="number" placeholder="Absences" v-model="selectedEleveConseil.absences" class="form-control">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                            <button type="button" data-dismiss="modal" @click="validate()" class="btn btn-primary md-close" >Valider</button>
                        </div>
                    </div>
                </div>
            </div>

            {{--<div id=""  role="dialog" class="modal fade colored-header colored-header-primary">--}}
                {{--<div class="modal-dialog custom-width">--}}
                    {{--<div class="modal-content">--}}
                        {{--<div class="modal-header primary">--}}
                            {{--<button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>--}}
                            {{--<h3 class="modal-title">Définir les assiduités</h3>--}}
                            {{--<h3 class="modal-title">@{{ selectedSession.nom }}</h3>--}}
                            {{--<h3 class="modal-title"><b>@{{ selectedEleve.nom_complet }}</b></h3>--}}
                        {{--</div>--}}
                        {{--<div class="modal-body ">--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label class="control-label">Assiduité</label>--}}
                                {{--<div class="">--}}
                                    {{--<div class="be-radio be-radio-color has-success inline col-lg-3">--}}
                                        {{--<input type="radio" value="Bonne" checked="" name="assiduite" v-model="selectedEleveConseil.assiduite" id="ass1">--}}
                                        {{--<label for="ass1">Bonne</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-success inline col-lg-3">--}}
                                        {{--<input type="radio" value="Assez-bonne" name="assiduite" v-model="selectedEleveConseil.assiduite" id="ass2">--}}
                                        {{--<label for="ass2">Assez-bonne</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-warning inline col-lg-3">--}}
                                        {{--<input type="radio" name="rad4" value="Passable" v-model="selectedEleveConseil.assiduite" id="ass3">--}}
                                        {{--<label for="ass3">Passable</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-warning inline col-lg-3">--}}
                                        {{--<input type="radio" value="Médiocre" name="assiduite" v-model="selectedEleveConseil.assiduite" id="ass4">--}}
                                        {{--<label for="ass4">Médiocre</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-danger inline col-lg-3">--}}
                                        {{--<input type="radio" value="Irrégulière" name="assiduite" v-model="selectedEleveConseil.assiduite" id="ass5">--}}
                                        {{--<label for="ass5">Irrégulière</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-danger inline col-lg-3">--}}
                                        {{--<input type="radio" value="Souvent en retard" name="assiduite" v-model="selectedEleveConseil.assiduite" id="ass6">--}}
                                        {{--<label for="ass6">Souvent en retard</label>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label class="control-label">Conduite</label>--}}
                                {{--<div class="">--}}
                                    {{--<div class="be-radio be-radio-color has-success inline col-lg-3">--}}
                                        {{--<input type="radio" checked="" name="conduite" v-model="selectedEleveConseil.conduite" value="Bonne" id="cond34">--}}
                                        {{--<label for="cond34">Bonne</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-success inline col-lg-3">--}}
                                        {{--<input type="radio" name="conduite" v-model="selectedEleveConseil.conduite" value="Assez-bonne" id="cond35">--}}
                                        {{--<label for="cond35">Assez-bonne</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-warning inline col-lg-3">--}}
                                        {{--<input type="radio" name="conduite" v-model="selectedEleveConseil.conduite" value="Passable" id="cond36">--}}
                                        {{--<label for="cond36">Passable</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-warning inline col-lg-3">--}}
                                        {{--<input type="radio" name="conduite" v-model="selectedEleveConseil.conduite" value="Médiocre" id="cond37">--}}
                                        {{--<label for="cond37">Médiocre</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-danger inline col-lg-3">--}}
                                        {{--<input type="radio" name="conduite" v-model="selectedEleveConseil.conduite" value="Avertissement" id="cond38">--}}
                                        {{--<label for="cond38">Avertissement</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-danger inline col-lg-3">--}}
                                        {{--<input type="radio" name="conduite" v-model="selectedEleveConseil.conduite" value="Blâme" id="cond39">--}}
                                        {{--<label for="cond39">Blâme</label>--}}
                                    {{--</div>--}}


                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label class="control-label">Travail</label>--}}
                                {{--<div class="">--}}
                                    {{--<div class="be-radio be-radio-color has-success inline col-lg-3">--}}
                                        {{--<input type="radio" checked="" v-model="selectedEleveConseil.travail" value="Très bon" name="travail" id="trav34">--}}
                                        {{--<label for="trav34">Très bon</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-success inline col-lg-3">--}}
                                        {{--<input type="radio" name="travail" v-model="selectedEleveConseil.travail" value="Bon" id="trav35">--}}
                                        {{--<label for="trav35">Bon</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-success inline col-lg-3">--}}
                                        {{--<input type="radio" name="travail" v-model="selectedEleveConseil.travail" value="Assez-bon" id="trav36">--}}
                                        {{--<label for="trav36">Assez bon</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-warning inline col-lg-3">--}}
                                        {{--<input type="radio" name="travail" v-model="selectedEleveConseil.travail" value="Passable" id="trav37">--}}
                                        {{--<label for="trav37">Passable</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-warning inline col-lg-3">--}}
                                        {{--<input type="radio" name="travail" v-model="selectedEleveConseil.travail" value="Insuffisant" id="trav38">--}}
                                        {{--<label for="trav38">Insuffisant</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-danger inline col-lg-3">--}}
                                        {{--<input type="radio" name="travail" v-model="selectedEleveConseil.travail" value="Médiocre" id="trav39">--}}
                                        {{--<label for="trav39">Médiocre</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-danger inline col-lg-3">--}}
                                        {{--<input type="radio" name="travail" v-model="selectedEleveConseil.travail" value="Avertissement" id="trav40">--}}
                                        {{--<label for="trav40">Avertissement</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="be-radio be-radio-color has-danger inline col-lg-3">--}}
                                        {{--<input type="radio" name="travail" v-model="selectedEleveConseil.travail" value="Blâme" id="trav41">--}}
                                        {{--<label for="trav41">Blâme</label>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group col-md-12">--}}
                                {{--<label>Assiduité</label>--}}
                                {{--<input type="text"  placeholder="Assiduité" class="form-control">--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label>Conduite</label>--}}
                                {{--<input type="text"  placeholder="Conduite" class="form-control">--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label>Travail</label>--}}
                                {{--<input type="text" placeholder="Travail" class="form-control">--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label>Nombre de retards</label>--}}
                                {{--<input type="number" placeholder="Retards" v-model="selectedEleveConseil.retards" class="form-control">--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label>Nombre d'absences</label>--}}
                                {{--<input type="number" placeholder="Absences" v-model="selectedEleveConseil.absences" class="form-control">--}}
                            {{--</div>--}}


                        {{--</div>--}}


                        {{--<div class="modal-footer">--}}
                            {{--<button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>--}}
                            {{--<button type="button" data-dismiss="modal" @click="validate()" class="btn btn-primary md-close" >Valider</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </template>
@endsection

@section('content')
    <Conseil></Conseil>
@endsection
