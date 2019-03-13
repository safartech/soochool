@extends("default")
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/select2/css/select2.min.css') }}" xmlns:/>
@endsection

@section('js')
    <script src="{{ asset('js/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/tooltip/tooltip.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/vues/admin/bulletins/moy-bloc.js') }}" type="module"></script>
    <script src="{{ asset('js/plugins/jdpdf/jspdf.min.js') }}"></script>
    <script>
//        window.onload = function(){alert()}
        $(document).ready(function(){

        })
    </script>

    <template id="moybloc">
        <div>
            <div class="col-lg-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">Préparation des bulletins<span class="panel-subtitle">Calcul des moyennes des élèves pour chaque matieres.</span></div>
                    <div class="panel-body">

                        <div class="col-lg-4">
                            <div class=""><label class="control-label">Classes</label></div>
                            <div class="">
                                <select id="select2-classes" multiple class="select2" >
                                    <optgroup v-for="niveau in niveaux" :label="niveau.nom">
                                        <option v-for="classe in niveau.classes" :value="classe.id">@{{ classe.nom }}</option>
                                    </optgroup>
                                    {{--<option :value="null" disabled selected  >Selectionner les niveaux</option>--}}
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class=""><label>Sessions</label></div>
                            <div class="">
                                <select id="select2-session" class="select2" v-model="selectedSessionId">
                                    <option :value="null" disabled selected  >Selectionner une session</option>
                                    <option v-for="session in sessions" :value="session.id">@{{ session.nom }}</option>
                                </select>
                            </div>


                        </div>
                        <div class="col-lg-5">
                            <div class=""><label>-</label></div>
                            <button class="btn btn-xl btn-default"  @click="refrech()">Refresh</button>
                            <button class="btn btn-xl btn-primary" :disabled="disabledBtn" @click="startProcess()">Moyennes de classe</button>
                            {{--<button class="btn btn-xl btn-warning" :disabled="disabledBtn" @click="loopProcess()">Loop 1</button>--}}
                            <button class="btn btn-xl btn-success" :disabled="disabledBtn" @click="moyGenCalcForClasses()">Moyennes Génerales</button>
                            <button class="btn btn-xl btn-danger" :disabled="disabledBtn" @click="showAppreciationModal()">Appréciations</button>

                            {{--<form :action="printMultipleBulletin()" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="classes[]" v-model="selectedClasses">
                                <input type="hidden" name="session_id" v-model="selectedSessionId">
                                <input type="submit"  class="btn btn-xl btn-default" value="Impression">
                            </form>--}}

                            {{--<button class="btn btn-xl btn-default" @click="printMultipleBulletin()">Impression</button>--}}
                            {{--<button class="btn btn-xl btn-default" :disabled="disabledBtn" @click="determineRanksInClasses()" @click="">Rang</button>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12"  id="mydiv">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="tab-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#stopped" data-toggle="tab">1- Notes et moyennes arreêtées</a></li>
                            <li><a href="#appreciations" data-toggle="tab">2- Appréciations par matière</a></li>
                            <li><a href="#ag" data-toggle="tab">3- Appréciations générales</a></li>
                            <li><a href="#conseil" data-toggle="tab">4- Conseil de classe</a></li>
                            <li><a href="#printer" data-toggle="tab">5- Impression bulletins</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="stopped" class="tab-pane active cont">
                                <h4></h4>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Classe</th>
                                        <th class="text-center">Notes arrêtées dans toutes les matières</th>
                                        <th class="text-center">Moyennes et rangs calculés</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(classe,i) in classes">
                                        <td class="text-center">@{{ i+1 }}</td>
                                        <td class="text-center">@{{ classe.nom }}</td>
                                        <td class="text-center" @click="verification1(classe)">
                                            <div>
                                                <span class="icon " :class="getBloquedClasses(classe)" style="font-size: xx-large"></span>
                                                <span class="" style="font-size: xx-large">@{{ countMatieresArretees(classe) }}/@{{ countMatieres(classe) }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div>
                                                <span class="icon " :class="moyCalculee(classe)" style="font-size: xx-large"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="appreciations" class="tab-pane cont">
                                <h4>Listes des élèves des classes sélectionnées.</h4>
                                <div class="panel-body  ">
                                    <div class="col-lg-12">
                                        <div class="col-lg-4">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Elèves</th>
                                                    <th>Classe</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="(eleve,i) in filteredEleves" :class="eleveSelectedBgColor(eleve)" @click="showAppreciationsForEleve(eleve)">
                                                    <td class="text-center">@{{ i+1 }}</td>
                                                    <td>@{{ eleve.nom_complet }}</td>
                                                    <td>@{{ eleve.classe.nom }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-8">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Matieres</th>
                                                    <th>Moy. de classe</th>
                                                    <th>Note comp</th>
                                                    <th>Moy. Gén</th>
                                                    <th>Rang compo</th>
                                                    <th>Appréciations</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="(matiere,i) in apprMatieres">
                                                    <td>@{{ i+1 }}</td>
                                                    <td>@{{ matiere.intitule }}</td>
                                                    <td>@{{ getMoyClasse(matiere) }}</td>
                                                    <td>@{{ getNoteCompo(matiere) }}</td>
                                                    <td>@{{ getMoyGen(matiere) }}</td>
                                                    <td>@{{ getRangCompo(matiere) }} @{{ getRangCompoSuffix(matiere) }}</td>
                                                    <td>@{{ getAppreciation(matiere) }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="ag" class="tab-pane">
                                <h4>Listes des élèves des classes sélectionnées.</h4>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Elèves</th>
                                            <th class="text-center">Classe</th>
                                            <th class="text-center">Moyenne générale</th>
                                            <th class="text-center">Rang</th>
                                            <th class="text-center">Appréciation générale</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(eleve,i) in filteredEleves" @click="showAppreciationsForEleve(eleve)" :class="eleveSelectedBgColor(eleve)" >
                                            <td class="text-center">@{{ i+1 }}</td>
                                            <td class="text-center">@{{ eleve.nom_complet }}</td>
                                            <td class="text-center">@{{ eleve.classe.nom }}</td>
                                            <td class="text-center">@{{ getMoyGenerale(eleve) }}</td>
                                            <td class="text-center">@{{ getRangGeneral(eleve) }}</td>
                                            <td class="text-center">@{{ getAppreciationGenerale(eleve) }}</td>
                                            {{--<td class="text-center" @click="genApprClick()">
                                                <span v-show="!showGenApprInput()">@{{ getAppreciationGenerale(eleve) }}</span>
                                                <input :id="eleve.id" ref="eleve.id" type="text" class="form-control" v-show="showGenApprInput()" @focus="genApprFocus(eleve)" @blur="updateGenAppr(eleve)" v-model="eleve.gen_appr" >
                                            </td>--}}
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-default" @click="showGeneralResultsOfEleve(eleve)">Résultats</button>
                                                <button class="btn btn-sm btn-default" :disabled="disabledBtn" @click="showGeneralApprModal(eleve)">Appreciation @{{ selectedSession.nom }}</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="conseil" class="tab-pane">
                                <h4></h4>
                                <table id="mainTable" class="table table-condensed table-hover table-bordered table-striped">
                                    <thead>
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
                                    <tr v-for="(eleve,i) in filteredEleves">
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
                            <div id="printer" class="tab-pane">
                                <h4>Listes des élèves des classes sélectionnées.</h4>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Elèves</th>
                                        <th>Classe</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(eleve,i) in filteredEleves">
                                        <td class="text-center">@{{ i+1 }}</td>
                                        <td>@{{ eleve.nom_complet }}</td>
                                        <td>@{{ eleve.classe.nom }}</td>
                                        <td>
                                            {{--<button class="btn btn-sm btn-primary" :disabled="disabledBtn" @click="printBuelletinForEleve(eleve)">Imprimer</button>--}}
                                            <a :href="print_bulletin_of_eleve(eleve)" download="FileName" target="_blank" class="btn btn-sm btn-primary" :disabled="disabledBtn">Imprimer</a>
                                            <button class="btn btn-sm btn-warning" :disabled="disabledBtn" @click="processForEleve(eleve.id)">Calculer</button>
                                            <button class="btn btn-sm btn-success" :disabled="disabledBtn" @click="moyGenCalcForEleve(eleve.id)">Calculer</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div id="progressModal" tabindex="-1" role="dialog" class="modal fade" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="text-primary">
                                    {{--<img src="{{ asset('loaders/loader_seq.gif') }}" alt="">--}}
                                    <h1 class="text-center">@{{ progressState }} %</h1>
                                    <div class="progress"  >
                                        <div  :style="{'width': progressState+'%'}"  aria-valuenow="70"
                                             aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-primary progress-bar-striped active">@{{ progressState }}%</div>
                                    </div>
                                </div>
                                <h3>@{{ progressText }}</h3>
                                <p v-if="!progressOver">Veuillez patienter le temps de que les moyennes soit calculées. Merci</p>
                            </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>

            <div id="verification-modal-1" tabindex="-1" role="dialog" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {{--<div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                        </div>--}}
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="text-primary"><span class="modal-main-icon mdi mdi-info-outline"></span></div>
                                <h3>Verification</h3>
                                <p>Liste des matières dispensées dan la classe @{{ clickedClasse.nom }}</p>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Matieres</th>
                                        <th class="text-center">Notes arrêtées</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(matiere,i) in clickedClasseMatieres">
                                        <th class="text-center">@{{ i+1 }}</th>
                                        <th class="text-center">@{{ matiere.intitule }}</th>
                                        <th class="text-center">
                                            <span class="icon " style="font-size: x-large" :class="getBloquedClassesForMatiere(matiere)"></span>
                                        </th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{--<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>--}}
                            <button type="button" data-dismiss="modal" class="btn btn-primary">Quitter</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="apprecition-modal" tabindex="-1" role="dialog" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="text-primary"><span class="modal-main-icon mdi mdi-info-outline"></span></div>
                                <h3>Verification</h3>
                                <p>Liste des appéctations par défaut en fonction des notes</p>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        {{--<th class="text-center">#</th>--}}
                                        <th class="text-center">Notes</th>
                                        <th class="text-center">Appéciations</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(appreciation,i) in appreciations">
                                        {{--<th class="text-center">@{{ i+1 }}</th>--}}
                                        <th class="text-center">@{{ appreciation.note }}</th>
                                        <th class="text-center">
                                            <input type="text" class="form-control" v-model="appreciation.appreciation">
                                        </th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">Annuler</button>
                            <button type="button" data-dismiss="modal" @click="generateAppreciations()" class="btn btn-primary">Valider</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="gen-results-modal" tabindex="-1" role="dialog" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="text-primary"><span class="modal-main-icon mdi mdi-info-outline"></span></div>
                                <h3>Résultats</h3>
                                <p>Liste des résultats par session de l'élève <b>@{{ selectedEleveAppr.nom_complet }}</b></p>
                                <table class="table table-bordered table-hover" v-for="session in sessions">
                                    <thead>
                                    <tr>
                                        <th colspan="3" class="text-center">@{{ session.nom }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Moyenne générale</th>
                                        <th class="text-center">Rang</th>
                                        <th class="text-center">Appréciation</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">@{{ getGenMoyOfSession(session.id) }}</td>
                                        <td class="text-center">@{{ getGenRankOfSession(session.id) }}</td>
                                        <td class="text-center">@{{ getGenApprOfSession(session.id) }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">Quitter</button>
                            {{--<button type="button" data-dismiss="modal" @click="generateAppreciations()" class="btn btn-primary">Valider</button>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div id="gen-appr-modal" tabindex="-1" role="dialog" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="text-primary"><span class="modal-main-icon mdi mdi-info-outline"></span></div>
                                <h3>Appreciation Générale du @{{ selectedSession.nom }}</h3>
                                <p><b>@{{ selectedEleveAppr.nom_complet }}</b></p>
                                <input type="text" class="form-control" v-model="currentGenAppr">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">Quitter</button>
                            <button type="button" data-dismiss="modal" @click="updateGenAppOfEleve()" class="btn btn-primary">Valider</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="conseil-setting-modal"  role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header primary">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            {{--<h3 class="modal-title">Définir les assiduités</h3>--}}
                            <h3 class="modal-title">@{{ selectedSession.nom }}</h3>
                            <h3 class="modal-title"><b>@{{ selectedEleveForConseil.nom_complet }}</b></h3>
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

                            {{--<div class="form-group col-md-12">
                                <label>Assiduité</label>
                                <input type="text"  placeholder="Assiduité" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Conduite</label>
                                <input type="text"  placeholder="Conduite" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Travail</label>
                                <input type="text" placeholder="Travail" class="form-control">
                            </div>--}}
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
                            <button type="button" data-dismiss="modal" @click="validateConseil" class="btn btn-primary md-close" >Valider</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </template>
@endsection

@section('content')
    <Moy-Bloc ></Moy-Bloc>
@endsection