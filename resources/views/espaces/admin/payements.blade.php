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
            <div class="panel panel-default">
                <div class="panel-heading"><span class="icon mdi mdi-money" style="font-weight: bold">  Espace Payements</span></div>

                <div class="tab-container">

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#Liste" data-toggle="tab"><span class="icon mdi mdi-dns"></span><span style="font-weight: bold">Liste des Paiements</span></a></li>
                        <li><a href="#Statu" data-toggle="tab"><span class="icon mdi mdi-camera-alt"></span></span><span style="font-weight: bold">Statut des Paiements</span></a></li>
                        <li><a href="#Nouveau" data-toggle="tab"><span class="icon mdi mdi-open-in-new"></span></span><span style="font-weight: bold">Nouveau Paiements</span></a></li> <li>
                    </ul>
                    <div class="tab-content">
                        <div id="Liste" class="tab-pane active cont">



                            <div class="main-content container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="panel panel-default">
                                            <div class="panel-body xs-pb-10">
                                                <form action="#" class="form-horizontal">
                                                    <div class="form-group">
                                                        <div class="col-xs-3">
                                                            <select id="ordre1" class="select2">
                                                                <option value="">Entrer la Salle</option>
                                                                <option value="CP">CP</option>
                                                                <option value="CE1">CE1</option>
                                                                <option value="CE2">CE2</option>
                                                                <option value="CM1">CM1</option>
                                                                <option value="CM2">CM2</option>

                                                                <option value="other">Other</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xs-4 pull-right">
                                                            <div  class="input-group input-search">
                                                                <input type="text" v-model="search" @keyup="filterPayement()"  placeholder="Search" class="form-control"><span class="input-group-btn">
                            <button class="btn btn-default"><i class="icon mdi mdi-search"></i></button></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div  id="CP" class="panel panel-default row icon-category">
                                    <div class="panel-heading"><span style="font-weight: bold">Liste des élèves</span>

                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-condensed table-hover table-bordered table-striped">
                                            <thead>
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


                                                <td class="text-center">
                                                    <a class="btn btn-info"  @click="showEditorlistePayement(listepayement)" data-toggle="modal">Modifier</a>
                                                </td>

                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="Statu" class="tab-pane cont">

                            <div class="main-content container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="panel panel-default">
                                            <div class="panel-body xs-pb-10">
                                                <form action="#" class="form-horizontal">
                                                    <div class="form-group">
                                                        <div class="col-xs-3">
                                                            <select  class="select2">
                                                                <option value="">Entrer la Salle</option>
                                                                <option value="CP">CP</option>
                                                                <option value="CE1">CE1</option>
                                                                <option value="CE2">CE2</option>
                                                                <option value="CM1">CM1</option>
                                                                <option value="CM2">CM2</option>

                                                                <option value="other">Other</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xs-4 pull-right">
                                                            <div class="input-group input-search">
                                                                <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                            <button class="btn btn-default"><i class="icon mdi mdi-search"></i></button></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">Liste des élèves
                                        {{--  <a class="btn btn-info"  href="{{route('pdf')}}" data-toggle="modal">Imprimer</a>--}}

                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-condensed table-hover table-bordered table-striped">
                                            <thead>
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

                                                            <div  class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="10" :style="{'width': statut(eleve)+'%'} ">
                                                                <span style="">@{{ statut(eleve) }}% </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div v-else-if="statut(eleve)<50">
                                                        <div class="progress progress-striped active" style="background-color: white">

                                                            <div  class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="10" :style="{'width': statut(eleve)+'%'} ">
                                                                <span style="">@{{ statut(eleve) }}% </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div v-else-if="statut(eleve)<=75">
                                                        <div class="progress progress-striped active" style="background-color: white">

                                                            <div  class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="10" :style="{'width': statut(eleve)+'%'} ">
                                                                <span style="">@{{ statut(eleve) }}% </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div v-else-if="statut(eleve)<=100">
                                                        <div class="progress progress-striped active" style="background-color: white">

                                                            <div  class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="10" :style="{'width': statut(eleve)+'%'} ">
                                                                <span style="">@{{ statut(eleve) }}% </span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div v-if=" sumpaye(eleve)==total(eleve)">
                                                        <span><i class="icon mdi mdi-check-all"></i></span>
                                                    </div>
                                                    <div v-else>
                                                        <a class="btn btn-info"  @click="showEditorPayement(eleve)" data-toggle="modal">Completer</a>
                                                    </div>
                                                </td>

                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="Nouveau" class="tab-pane">
                            <div class="panel panel-default">

                                <div class="panel panel-default panel-border-color panel-border-color-primary">
                                    <div class="panel-heading panel-heading-divider"><span style="font-weight: bold">Espace Nouveau Payement</span><span class="panel-subtitle">Cet espace est reservé au premier nouveau payement</span></div>
                                    <div class="panel-body">





                                        <div class="form-group">
                                            <label >Nom Eleve</label>

                                            <select id="select2-paye" class="select2" v-model="newPayement.eleve_id">
                                                <option >Selectionner l'Eleve</option>
                                                <option :value="elevet.id" v-for="elevet in elevess">@{{ elevet.nom }}</option>
                                            </select>

                                        </div>


                                        <div class="form-group">
                                            <label>Solde Payé</label>
                                            <input type="text" v-model="newPayement.paye" placeholder="Solde" class="form-control">

                                        </div>

                                        <div class="row xs-pt-15">

                                            <div class="col-xs-12">
                                                <p class="text-right">
                                                    <button class="btn btn-space btn-default">Cancel</button>
                                                    <button type="submit" @click="showConfirmeModal2" class="btn btn-space btn-primary" v-if="newPayement.eleve_id !='' && newPayement.paye >=5000 ">Submit</button>
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