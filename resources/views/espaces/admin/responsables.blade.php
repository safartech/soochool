@extends("templates.wrapper.modern")
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/select2/css/select2.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/jquery.gritter/css/jquery.gritter.css') }}"/>
    <style>
        .select2{
            width: 100%;

        }

    </style>

@endsection

@section('js')

    <script src="{{ asset('assets/lib/select2/js/select2.min.js') }}" type="module"></script>
    <template id="responsables">


        <div class="col-sm-12">
            <div id="form-bp1"  role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #34a853;">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Ajout Responsable</h3>
                        </div>
                        <div class="modal-body ">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput1">Nom</label>
                                        <input type="text" v-model="newResponsable.nom" class="form-control" placeholder="Nom" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput2">Prenom</label>
                                        <input type="text"v-model="newResponsable.prenoms"  class="form-control" placeholder="Prenoms" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="projectinput1">Profession</label>
                                        <input type="text"  class="form-control" v-model="newResponsable.profession" placeholder="Profession" >
                                    </div>
                                </div>

                            </div>





                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="form-group">
                                    <fieldset class="text-center">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" class="custom-control-input bg-primary" v-model="newResponsable.sexe" value="M" name="colorRadio" id="colorRadio1">
                                            <label class="custom-control-label" for="colorRadio1">Masculin</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" class="custom-control-input bg-success" v-model="newResponsable.sexe" value="F" name="colorRadio" id="colorRadio2">
                                            <label class="custom-control-label" for="colorRadio2">Feminin</label>
                                        </div>

                                    </fieldset>
                                </div>

                            </div>




                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput1">Domicile</label>
                                        <input type="text" v-model="newResponsable.domicile" placeholder="Votre Domicile" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput2">Code Postal</label>
                                        <input type="text" v-model="newResponsable.code_postal" placeholder="Code Postal" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput1">Mail</label>
                                        <input type="text"  v-model="newResponsable.email" placeholder="E-mail" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput2">Bureau</label>
                                        <input type="text" v-model="newResponsable.bureau" placeholder="Bureau" class="form-control">
                                    </div>
                                </div>
                            </div>



                            <input type="hidden" v-model="nomComplet" placeholder="Telephone Mobile" class="form-control">



                        </div>


                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                            <button type="button" data-dismiss="modal" class="btn btn-primary md-close" style="background-color: #34a853; border-color: #34a853;" @click="addResponsable">Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>




            <div id="form-bp2"  role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #34a853;">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Modification Responsable</h3>
                        </div>
                        <div class="modal-body ">



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput1">Nom</label>
                                        <input type="text"v-model="updateResponsable.nom" class="form-control" placeholder="Nom" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput2">Prenom</label>
                                        <input type="text"  v-model="updateResponsable.prenoms"  class="form-control" placeholder="Prenoms" >
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="form-group">
                                    <fieldset class="text-center">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" class="custom-control-input bg-primary" v-model="updateResponsable.sexe" value="M" name="colorRadio" id="colorRadio1">
                                            <label class="custom-control-label" for="colorRadio1">Masculin</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" class="custom-control-input bg-success" v-model="updateResponsable.sexe" value="F" name="colorRadio" id="colorRadio2">
                                            <label class="custom-control-label" for="colorRadio2">Feminin</label>
                                        </div>

                                    </fieldset>
                                </div>

                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput1">Domicile</label>
                                        <input type="text" v-model="updateResponsable.domicile" class="form-control" placeholder="Votre Domicile" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput2">Code Postal</label>
                                        <input type="text"  v-model="updateResponsable.code_postal"  class="form-control" placeholder="Code Postal" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput1">Mail</label>
                                        <input type="text"  v-model="updateResponsable.email" class="form-control" placeholder="E-mail" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput2">Bureau</label>
                                        <input type="text"  v-model="updateResponsable.bureau" placeholder="Bureau"  class="form-control">
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="projectinput1">Profession</label>
                                        <input type="text" v-model="updateResponsable.profession" placeholder="Profession" class="form-control" >
                                    </div>
                                </div>
                            </div>


                            <input type="hidden" v-model="nomComplet" placeholder="Telephone Mobile" class="form-control">


                            {{--<div class="row">--}}
                            {{--<div class="form-group col-md-12">--}}
                            {{--<div class="be-checkbox">--}}
                            {{--<input id="check2" type="checkbox">--}}
                            {{--<label for="check2">Send me notifications about new products and services.</label>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </div>


                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                            <button type="button"  data-dismiss="modal" class="btn btn-primary md-close"  style="background-color: #34a853; border-color: #34a853;"  @click="updateresponsable">Modifier</button>
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



            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Parents d'élèves</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                        <div class="heading-elements">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#form-bp1"><i class="ft-plus white"></i> Ajouter un Personnel</button>
                            <span class="dropdown">
                        <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-warning btn-sm dropdown-toggle dropdown-menu-right"><i class="ft-settings white"></i></button>
                        <span aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-right">
                            <a href="#" class="dropdown-item"><i class="la la-calendar"></i> Due Date</a>
                            <a href="#" class="dropdown-item"><i class="la la-random"></i> Priority </a>
                            <a href="#" class="dropdown-item"><i class="la la-bar-chart"></i> Progress</a>
                            <a href="#" class="dropdown-item"><i class="la la-user"></i> Assign to</a>
                        </span>
                        </span>
                        </div>
                    </div>
                    <div class="card-content collapse show">

                        <div class="table-responsive">


                            <table class="table">
                                <thead class="bg-primary white">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nom</th>

                                    <th class="text-center">Profession</th>
                                    <th class="text-center">Sexe</th>
                                    <th class="text-center">Domicile</th>
                                    <th class="text-center">Mail</th>
                                    <th class="text-center">Bureau</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(responsable,i) in responsables">

                                    <td class="text-center">@{{ i+1 }}</td>

                                    <td class="text-center">@{{ responsable.nom_complet }}</td>
                                    <td class="text-center">@{{ responsable.profession }}</td>
                                    <td class="text-center">@{{ responsable.sexe }}</td>
                                    <td class="text-center">@{{ responsable.domicile }}</td>
                                    <td class="text-center">@{{ responsable.email }}</td>
                                    <td class="text-center">@{{ responsable.bureau }}</td>
                                    {{--<td  class="text-center">

                                        <button data-toggle="modal" type="button" @click="showEditorModal(responsable)" class="btn btn-info md-close">Modifier</button>

                                        <button data-toggle="modal" type="button"  class="btn btn-danger md-close">Supprimer</button>




                                    </td>--}}
                                    <td class="text-center">
                                        <button class="btn btn-info btn-sm" data-toggle="modal" @click="showEditorModal(responsable)" >Modifier</button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" @click="showDeleteModal(responsable)">Supprimer</button>

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
    <script src="{{ asset('js/vues/admin/responsables.js') }}" type="module"></script>
    <script src="{{ asset('assets/lib/jquery.gritter/js/jquery.gritter.js') }}" type="text/javascript"></script>
@endsection

@section('content')

    <Responsables></Responsables>


@endsection