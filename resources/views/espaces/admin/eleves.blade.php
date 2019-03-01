@extends("default")
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select2/css/select2.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/datatables/plugins/Buttons/css/buttons.jqueryui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/plugins/Buttons/css/buttons.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/plugins/Buttons/css/buttons.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/datatables/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/plugins/Select/css/select.dataTables.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('assets/datatables/editor/css/editor.dataTables.css') }}">--}}

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

    <script src="{{ asset('js/vues/admin/eleves.js') }}" type="module"></script>

    <script src="{{ asset('assets/lib/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/jquery.datatables.js') }}"></script>
    <script src="{{ asset('assets/lib/datatables/js/dataTables.bootstrap.min.js') }}"></script>
    {{--<script src="{{ asset('assets/lib/datatables/plugins/buttons/js/dataTables.buttons.js') }}"></script>--}}
    <script src="{{ asset('assets/datatables/plugins/Select/js/select.dataTables.js') }}"></script>
    {{--<script src="{{ asset('assets/datatables/editor/js/dataTables.editor.js') }}"></script>--}}


{{--    <script src="{{ asset('assets/datatables/plugins/Buttons/js/buttons.jqueryui.js') }}"></script>--}}
    <script src="{{ asset('assets/datatables/plugins/Buttons/js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('assets/datatables/plugins/Buttons/js/buttons.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/datatables/plugins/Buttons/js/buttons.print.js') }}"></script>
    <script src="{{ asset('assets/datatables/plugins/Buttons/js/buttons.html5.js') }}"></script>
    <script src="{{ asset('assets/datatables/plugins/Buttons/js/buttons.flash.js') }}"></script>
    <script src="{{ asset('assets/datatables/plugins/Buttons/js/buttons.colVis.js') }}"></script>
    <script src="{{ asset('assets/datatables/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/datatables/export/jszip.min.js') }}"></script>

    {{--<script src="{{ asset('assets/lib/datatables/plugins/buttons/js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('assets/lib/datatables/plugins/buttons/js/buttons.print.js') }}"></script>
    <script src="{{ asset('assets/lib/datatables/plugins/buttons/js/buttons.html5.js') }}"></script>
    <script src="{{ asset('assets/lib/datatables/plugins/buttons/js/buttons.flash.js') }}"></script>
    <script src="{{ asset('assets/lib/datatables/plugins/buttons/js/buttons.colVis.js') }}"></script>
    <script src="{{ asset('assets/lib/datatables/plugins/buttons/js/buttons.bootstrap.js') }}"></script>--}}


    {{--<script src="{{ asset('js/datatables/jszip.min.js') }}"></script>--}}
    {{--<script src="{{ asset('js/datatables/pdfmake.min.js') }}"></script>--}}
    {{--<script src="{{ asset('js/datatables/vfs_fonts.js') }}"></script>--}}
{{--    <script src="{{ asset('js/datatables/dataTables.fixedHeader.min.js') }}"></script>--}}

    <template id="eleves">



        <div class="col-sm-12">



            <div id="form-bp1"  role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #34a853;">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Ajout Eleve</h3>
                        </div>
                        <div class="modal-body ">
                            <div class="form-group col-md-6">
                                <label>Nom</label>
                                <input type="text" v-model="newEleve.nom" placeholder="Nom" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Prénoms</label>
                                <input type="text" v-model="newEleve.prenoms" placeholder="Prenom" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label xs-pt-20">Sexe</label>
                                <div class="col-sm-6">
                                    <div class="be-radio-icon inline">
                                        <input v-model="newEleve.sexe" value="F" type="radio" checked="" name="radu" id="radu">
                                        <label for="radu"><span class="mdi mdi-female"></span></label>
                                    </div>
                                    <div class="be-radio-icon inline">
                                        <input type="radio" name="radm" value="M" id="radm" v-model="newEleve.sexe">
                                        <label for="radm"><span class="mdi mdi-male-alt"></span></label>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Date de naissance</label>
                                {{--<input type="text" id="nsce" v-model="newEleve.date_nsce" placeholder="JJ/MM/AAAA" class="form-control">--}}
                                <div id="date-nsce1" data-start-view="4"  data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date">
                                    <input size="16" type="text" value="" class="form-control"><span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
                                </div>

                            </div>
                            <div class="form-group col-md-6">
                                <label>Lieu de Naissance</label>
                                <input type="text" v-model="newEleve.lieu_nsce" placeholder="Lieu de Naissance" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Adresse</label>
                                <input type="text"  v-model="newEleve.adresse" placeholder="Votre Adresse" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Téléphone</label>
                                <input type="text" v-model="newEleve.telephone" placeholder="Votre Téléphone" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Nationalité</label>
                                <input type="text" v-model="newEleve.nationalite" placeholder="Votre Nationalité" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Pays Naissance</label>
                                <input type="text" v-model="newEleve.pays_nsce" placeholder="Pays de Naissance" class="form-control">
                            </div>


                            <div class="form-group col-md-12">
                                <label >Classe</label>
                                <div >
                                    <select class="form-control"  v-model="newEleve.classe_id">
                                        <option :value="classe.id" v-for="classe in classes">@{{ classe.nom }}</option>

                                    </select>
                                </div>
                            </div>

                            <input type="hidden" v-model="nomComplet" placeholder="" class="form-control">

                        </div>


                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                            <button type="button" data-dismiss="modal" class="btn btn-primary md-close" style="background-color: #34a853; border-color: #34a853;" @click="addEleve">Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="form-bp2"  role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Modification Eleve</h3>
                        </div>
                        <div class="modal-body">
                            <div class="form-group col-md-6">
                                <label>Nom</label>
                                <input type="text" v-model="updateEleve.nom" placeholder="Nom" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Prénoms</label>
                                <input type="text" v-model="updateEleve.prenoms" placeholder="Prenom" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label xs-pt-20">Sexe</label>
                                    <div class="col-sm-6">
                                        <div class="be-radio-icon inline">
                                            <input v-model="updateEleve.sexe" value="F" type="radio" checked="" name="rad1" id="rad1">
                                            <label for="rad1"><span class="mdi mdi-female"></span></label>
                                        </div>
                                        <div class="be-radio-icon inline">
                                            <input type="radio" name="rad1" value="M" id="rad2" v-model="updateEleve.sexe">
                                            <label for="rad2"><span class="mdi mdi-male-alt"></span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Date de naissance : <span class="label label-info">@{{ moment(updateEleve.date_nsce) }}</span> {{--(laissez vide si inchangé)--}}</label>

                                {{--<input type="text" id="nsce" v-model="updateEleve.date_nsce" placeholder="JJ/MM/AAAA" class="form-control">--}}
                                <div id="date-nsce2" data-start-view="4"  data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date">
                                    <input size="16" type="text" value="" class="form-control"><span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Lieu de Naissance</label>
                                <input type="text" v-model="updateEleve.lieu_nsce" placeholder="Lieu de Naissance" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Téléphone</label>
                                <input type="text" v-model="updateEleve.telephone" placeholder="Votre Téléphone" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Adresse</label>
                                <input type="text"  v-model="updateEleve.adresse" placeholder="Votre Adresse" class="form-control">
                            </div>


                            <div class="form-group col-md-6">
                                <label>Nationalité</label>
                                <input type="text" v-model="updateEleve.nationalite" placeholder="Votre Nationalité" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Pays Naissance</label>
                                <input type="text" v-model="updateEleve.pays_nsce" placeholder="Pays de Naissance" class="form-control">
                            </div>

                            <div class="form-group col-md-12">
                                <label >Classe</label>
                                <div >
                                    <select class="form-control"  v-model="updateEleve.classe_id">
                                        <option :value="classe.id" v-for="classe in classes">@{{ classe.nom }}</option>

                                    </select>
                                </div>
                            </div>

                            <input type="hidden" v-model="u_nomComplet" placeholder="Telephone Mobile" class="form-control">

                        </div>


                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                            <button type="button" data-dismiss="modal" class="btn btn-primary md-close" style="background-color: #34a853; border-color: #34a853;" @click="UpdateEleves">Modifier</button>
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
                                <div class="text-danger"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
                                <h3>Attension!!!!</h3>
                                <p>L' élément sera définitivement supprimer de la Base de Donnée.</p>
                                <div class="xs-mt-50">
                                    <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Annuler</button>
                                    <button type="button" data-dismiss="modal"   @click="del()"  class="btn btn-space btn-danger">Supprimer</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default panel-border-color panel-border-color-primary">
                        <div class="panel-heading panel-heading-divider">Elèves<span class="panel-subtitle">Gestion des informations d'élèves</span></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Options</label>
                                <div class="col-sm-6">
                                    <div class="be-radio be-radio-color inline">
                                        <input type="radio" checked="" v-model="mode" value="0" name="mode" id="imp">
                                        <label for="imp">Consultation</label>
                                    </div>
                                    <div class="be-radio be-radio-color inline">
                                        <input type="radio" v-model="mode" value="1" name="mode" id="rad10">
                                        <label for="rad10">Modification</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row" v-show="isConsultMode">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Liste des élèves
                        </div>
                        <div class="panel-body">
                            <table id="myTable" class="table table-condensed table-hover table-bordered table-striped table-fw-widget" data-page-length='10'>
                                <thead>
                                <tr>
                                    <th >#</th>
                                    <th data-class-name="priority">Nom</th>
                                    <th>Prenoms</th>
                                    <th>Sexe</th>
                                    <th>Date Nsce</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Classe</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row" v-show="isModifMode">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Liste des élèves
                            <div class="tools"> <button data-toggle="modal" data-target="#form-bp1" type="button" class="btn btn-space btn-success  ">Ajouter</button><span class="icon mdi mdi-more-vert"></span></div>
                        </div>
                        <div class="panel-body">
                            <table id="" class="table table-condensed table-hover table-bordered table-striped table-fw-widget">
                                <thead>
                                <tr>
                                    <th>N°</th>
                                    <th class="text-center">Nom </th>
                                    <th class="text-center">Prenoms</th>
                                    <th class="text-center">Sexe</th>
                                    <th class="text-center">Date Naiss</th>
                                    <th class="text-center">Adresse</th>
                                    {{--<th class="text-center">Nationalite</th>--}}
                                    {{--<th class="text-center">Pays Naissance</th>--}}
                                    <th class="text-center">Telephone</th>
                                    <th class="text-center">Classe</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(eleve,i) in eleves">

                                    <td class="text-center">@{{ i+1 }}</td>
                                    <td class="text-center" >@{{ eleve.nom }}</td>
                                    <td class="text-center" >@{{ eleve.prenoms }}</td>
                                    <td class="text-center">@{{ eleve.sexe }}</td>
                                    <td class="text-center">@{{ eleve.date_nsce }}</td>
                                    <td class="text-center">@{{ eleve.adresse }}</td>
                                    {{--<td class="text-center">@{{ eleve.nationalite }}</td>--}}
                                    {{--<td class="text-center">@{{ eleve.pays_nsce }}</td>--}}
                                    <td class="text-center">@{{ eleve.telephone }}</td>
                                    <td class="text-center"><span v-if="notnull(eleve.classe)">@{{ eleve.classe.nom }}</span></td>
                                    <td class="text-center">
                                        <a class="btn btn-info"  @click="showEditorModal(eleve)">Modifier</a>
                                        <a class="btn btn-danger"   @click="showDeleteModal(eleve)">Supprimer</a>

                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>






        </div>


    </template>


    {{--<script src="{{ asset('assets/lib/jquery.maskedinput/jquery.maskedinput.min.js') }}" type="module"></script>--}}
    <script src="{{ asset('assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            //initialize the javascripts
//            $('#myTable').dataTable()
          //  App.masks();
//            $("#nsce").mask("9999-99-99");
        });
    </script>

@endsection

@section('content')

    <Eleves></Eleves>


@endsection