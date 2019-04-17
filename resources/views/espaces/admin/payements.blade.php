@extends("templates.wrapper.modern")
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

        <div class="col-xl-12 col-lg-12">
            <div id="mod-dangere" tabindex="-1" role="dialog" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="text-info"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
                                <h3>Attension!!!!</h3>
                                <p>Etes-vous sure de vouloir modifier le payement ??</p>
                                <div class="xs-mt-50">
                                    <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Annuler</button>
                                    <button type="button" data-dismiss="modal"   @click="addNewpaye"  class="btn btn-space btn-info">Confirmer</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Espace Payements</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        <ul class="nav nav-tabs nav-underline no-hover-bg">
                            <li class="nav-item">
                                <a class="nav-link active" id="base-tab31" data-toggle="tab" aria-controls="tab31" href="#tab31" aria-expanded="true">Liste des Paiements</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="base-tab32" data-toggle="tab" aria-controls="tab32" href="#tab32" aria-expanded="false">Status des Payements</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="base-tab33" data-toggle="tab" aria-controls="tab33" href="#tab33" aria-expanded="false">Nouveaux Payements</a>
                            </li>
                        </ul>
                        <div class="tab-content px-1 pt-1">
                            <div role="tabpanel" class="tab-pane active" id="tab31" aria-expanded="true" aria-labelledby="base-tab31">
                               <div class="card">
                                   <div class="col-md-12">
                                       <div class="card-header">
                                           <div  class=" col-md-5" >

                                               <select class="form-control input-xl" id="xLargeSelect">
                                                   <option selected>Entrer la salle</option>
                                                   <option value="CP">CP</option>
                                                   <option value="CE1">CE1</option>
                                                   <option value="CE2">CE2</option>
                                                   <option value="CM1">CM1</option>
                                                   <option value="CM2">CM2</option>
                                               </select>

                                           </div>
                                           <div class="col-md-5 heading-elements">
                                               <fieldset class="form-group position-relative mb-0">
                                                   <input type="text" class="form-control form-control-xl input-xl" id="iconLeft1"  v-model="search" @keyup="filterPayement()" placeholder="Search ...">
                                                   <div class="form-control-position">
                                                       <i class="ft-search font-medium-4"></i>
                                                   </div>
                                               </fieldset>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                                <div class="card-header">
                                    <h4 class="card-title">Liste des Eleves</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">

                                    <div class="table-responsive">


                                        <table class="table">
                                            <thead class="bg-primary white">
                                            <tr>
                                                <th>N°</th>
                                                <th class="text-center">Nom </th>
                                                <th class="text-center">Prenoms</th>
                                                <th class="text-center">Sexe</th>
                                                <th class="text-center">Solde payé</th>
                                                <th class="text-center">Date de Payement</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr  v-for="(listepayement,i) in filteredPayements">

                                                <td class="text-center">@{{ i+1 }}</td>
                                                <td class="text-center" >@{{ listepayement.eleve.nom }}</td>
                                                <td class="text-center" >@{{ listepayement.eleve.prenoms }}</td>
                                                <td class="text-center">@{{ listepayement.eleve.sexe }} </td></td>
                                                <td class="text-center"><span style="font-weight: bold">@{{ listepayement.paye }}</span> </td></td>
                                                <td class="text-center">@{{ listepayement.created_at }} </td></td>
                                                <td >

                                                    <button class="btn btn-info btn-sm" data-toggle="modal" @click="showEditorlistePayement(listepayement)">Modifier</button>

                                                </td>

                                            </tr>





                                            </tbody>
                                        </table>

                                    </div>
                                </div>


                                <div id="form-bp7"  role="dialog" class="modal fade colored-header colored-header-primary">
                                    <div class="modal-dialog custom-width">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #34a853;">
                                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                                                <h3 class="modal-title">Espace Solde</h3>
                                            </div>
                                            <div class="modal-body ">



                                                <div class="form-group col-md-12">

                                                    <input type="hidden" v-model="paye" placeholder="0" class="form-control">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Veillez modifier le Payement</label>
                                                    <input type="text" v-model="updatelistePayement.paye" placeholder="0" class="form-control">
                                                </div>

                                            </div>

                                            <div class="modal-footer">

                                                <div>
                                                    <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                                                    <button v-if="updatelistePayement.paye<=(paye+listpayerest)" type="button" data-dismiss="modal" @click="editpayement()" class="btn btn-primary md-close" style="background-color: #34a853; border-color: #34a853;">Soumettre</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane" id="tab32" aria-labelledby="base-tab32">
                                <div class="card">
                                    <div class="col-md-12">
                                        <div class="card-header">
                                            <div  class=" col-md-5" >

                                                <select class="form-control input-xl" id="xLargeSelect">
                                                    <option selected>Entrer la salle</option>
                                                    <option value="CP">CP</option>
                                                    <option value="CE1">CE1</option>
                                                    <option value="CE2">CE2</option>
                                                    <option value="CM1">CM1</option>
                                                    <option value="CM2">CM2</option>
                                                </select>

                                            </div>
                                            <div class="col-md-5 heading-elements">
                                                <fieldset class="form-group position-relative mb-0">
                                                    <input type="text" class="form-control form-control-xl input-xl" id="iconLeft1"  v-model="search" @keyup="filterPayement()" placeholder="Search ...">
                                                    <div class="form-control-position">
                                                        <i class="ft-search font-medium-4"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header">
                                    <h4 class="card-title">Liste des Eleves</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">

                                    <div class="table-responsive">


                                        <table class="table">
                                            <thead class="bg-primary white">
                                            <tr>
                                                <th>N°</th>
                                                <th class="text-center">Nom </th>
                                                <th class="text-center">Prenoms</th>
                                                <th class="text-center">Sexe</th>
                                                <th class="text-center">Classe</th>
                                                <th class="text-center">Etat Solde</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr  v-for="(eleve,i) in eleves">

                                                <td class="text-center">@{{ i+1 }}</td>
                                                <td class="text-center" >@{{ eleve.nom }}</td>
                                                <td class="text-center" >@{{ eleve.prenoms }}</td>
                                                <td class="text-center">@{{ eleve.sexe }} </td>
                                                <td class="text-center">@{{ eleve.classe.nom }} </td>
                                                <td class="text-center">

                                                    <div v-if="statut(eleve)<=20">
                                                        <div class="progress progress-striped active" style="background-color: white">

                                                            <div  class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="10" :style="{'width': statut(eleve)+'%'} ">
                                                                <span style="">@{{ statut(eleve) }}% </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div v-else-if="statut(eleve)<50">
                                                        <div class="progress progress-striped active" style="background-color: white">

                                                            <div  class="progress-bar progress-bar-striped bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="10" :style="{'width': statut(eleve)+'%'} ">
                                                                <span style="">@{{ statut(eleve) }}% </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div v-else-if="statut(eleve)<=75">
                                                        <div class="progress progress-striped active" style="background-color: white">

                                                            <div  class="progress-bar progress-bar-striped bg-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="10" :style="{'width': statut(eleve)+'%'} ">
                                                                <span style="">@{{ statut(eleve) }}% </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div v-else-if="statut(eleve)<=100">
                                                        <div class="progress progress-striped active" style="background-color: white">

                                                            <div  class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="10" :style="{'width': statut(eleve)+'%'} ">
                                                                <span style="">@{{ statut(eleve) }}% </span>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </td>
                                                <td class="text-center">
                                                    <div v-if=" sumpaye(eleve)==total(eleve)">
                                                        <span><i class="ft-check"></i></span>
                                                    </div>

                                                    <div v-else>
                                                        <button class="btn btn-info btn-sm" data-toggle="modal" @click="showEditorPayement(eleve)">Modifier</button>
                                                    </div>



                                                </td>

                                            </tr>













































































































































                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <div id="form-bp1"  role="dialog" class="modal fade colored-header colored-header-primary">
                                    <div class="modal-dialog custom-width">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #34a853;">
                                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                                                <h3 class="modal-title">Espace Solde</h3>
                                            </div>
                                            <div class="modal-body ">
                                                <div class="form-group col-md-12">
                                                    <label>Solde Payé</label>
                                                    <input type="text"  v-model="infoeleve"  placeholder="" class="form-control">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Solde Restante</label>
                                                    <input type="text"  v-model="resteleve" placeholder="0" class="form-control">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Nouvel Payement</label>
                                                    <input type="text" v-model="updatePayement.nouveau_payement" placeholder="0" class="form-control">
                                                </div>

                                                <input type="hidden"  placeholder="" class="form-control">

                                            </div>

                                            <div class="modal-footer" >


                                                <div v-if="updatePayement.nouveau_payement> resteleve">

                                                    <span style="font-weight: bold">! Le solde retant à payer est inferieur !</span>
                                                </div>
                                                <div v-else-if="updatePayement.nouveau_payement<5000">
                                                    <span style="font-weight: bold">! Un Eleve peut payer qu(une somme minimal de 5000 comme tranche!</span>
                                                </div>
                                                <div v-else="updatePayement.nouveau_payement<=resteleve)">
                                                    <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                                                    <button type="button" data-dismiss="modal"  @click="showConfirmeModal" class="btn btn-primary md-close" style="background-color: #34a853; border-color: #34a853;">Soumettre</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="mod-danger" tabindex="-1" role="dialog" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <div class="text-info"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
                                                    <h3>Attension!!!!</h3>
                                                    <p>Etes-vous sure de vouloir modifier le payement ??</p>
                                                    <div class="xs-mt-50">
                                                        <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Annuler</button>
                                                        <button type="button" data-dismiss="modal"   @click="addPayement"  class="btn btn-space btn-info">Confirmer</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="tab33" aria-labelledby="base-tab33">
                                <div role="tabpanel" class="tab-pane active" id="tab31" aria-expanded="true" aria-labelledby="base-tab31">
                                    <br>
                                    <div class="col-md-12 col-sm-12" style="border-shadow:5px">
                                        <div class="card-content collapse show">
                                            <div class="card-body">

                                               
                                                    <div class="form-body">
                                                        <h4 class=""><i class="ft-user"></i> Personal Info</h4>
                                                        <div class="card-text form-section">
                                                            <p>Cet espace est reserver au  <code>premier nouveau payement</code> </p>
                                                        </div>
                                                        <div class="row">



                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">Nom de l'Eleve</label>
                                                                    <select class="form-control input" id="SmallSelect" v-model="newPayement.eleve_id">
                                                                        <option selected>Selectionner l'Eleve</option>
                                                                        <option :value="elevet.id" v-for="elevet in elevess">@{{ elevet.nom }}</option>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="projectinput4">Solde Payé</label>
                                                                    <input type="text" v-model="newPayement.paye" class="form-control" placeholder="Solde">
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>

                                                    <div class="form-actions heading-elements">
                                                        <p class="text-right">
                                                            <button class="btn btn-space btn-default">Cancel</button>
                                                            <button
                                                                    @click="showConfirmeModal2" class="btn btn-space btn-primary" v-if="newPayement.eleve_id !='' && newPayement.paye >=5000 ">Submit</button>
                                                        </p>

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


    </template>



    <script src="{{ asset('js/vues/admin/payements.js') }}" type="module"></script>
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