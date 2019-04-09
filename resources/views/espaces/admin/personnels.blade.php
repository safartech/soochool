@extends("templates.wrapper.modern")
@section('css')

@endsection

@section('js')
    <script>

    </script>
    <script src="{{ asset('assets/lib/select2/js/select2.min.js') }}" type="module"></script>
    <template id="Personnels">



        <div class="col-sm-12">
            <div id="form-bp1"  role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #34a853;">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Ajout Personnel</h3>
                        </div>
                        <div class="modal-body ">
                            <div class="form-group col-md-6">
                                <label>Nom</label>
                                <input type="text"  v-model="newPersonnel.nom" placeholder="Nom" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Prenoms</label>
                                <input type="text" v-model="newPersonnel.prenoms" placeholder="Prenoms" class="form-control">
                            </div>



                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label xs-pt-20">Sexe</label>
                                    <div class="col-sm-6">
                                        <div class="be-radio-icon inline">
                                            <input   v-model="newPersonnel.sexe" value="F" type="radio" checked="" name="rad1" id="rad1">
                                            <label for="rad1"><span class="mdi mdi-female"></span></label>
                                        </div>
                                        <div class="be-radio-icon inline">
                                            <input type="radio" v-model="newPersonnel.sexe" name="rad1" value="M" id="rad2">
                                            <label for="rad2"><span class="mdi mdi-male-alt"></span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Diplome</label>
                                <input type="text"  v-model="newPersonnel.diplomes" placeholder="Diplome" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Adresse</label>
                                <input type="text" v-model="newPersonnel.adresse" placeholder="Adresse" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Quartier</label>
                                <input type="text" v-model="newPersonnel.quartier" placeholder="Quartier" class="form-control">
                            </div>


                            <div class="form-group col-md-6">
                                <label>Telephone Domicile</label>
                                <input type="text" v-model="newPersonnel.tel_domicile" placeholder="Adresse" class="form-control">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Telephone Mobile</label>
                                <input type="text" v-model="newPersonnel.tel_mobile" placeholder="Telephone Mobile" class="form-control">
                            </div>


                                <input type="hidden" v-model="nomComplet" placeholder="Telephone Mobile" class="form-control">

                        </div>


                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                            <button type="button" data-dismiss="modal" class="btn btn-primary md-close" style="background-color: #34a853; border-color: #34a853;" @click="addPersonnel">Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>


            <div id="form-bp2"  role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #34a853;">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Modification Personnel</h3>
                        </div>
                        <div class="modal-body ">
                            <div class="form-group col-md-6">
                                <label>Nom</label>
                                <input type="text"  v-model="updatePersonnel.nom" placeholder="Nom" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Prenoms</label>
                                <input type="text" v-model="updatePersonnel.prenoms" placeholder="Prenoms" class="form-control">
                            </div>



                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label xs-pt-20">Sexe</label>
                                    <div class="col-sm-6">
                                        <div class="be-radio-icon inline">
                                            <input   v-model="updatePersonnel.sexe" value="F" type="radio" checked="" name="radm" id="radm">
                                            <label for="radm"><span class="mdi mdi-female"></span></label>
                                        </div>
                                        <div class="be-radio-icon inline">
                                            <input type="radio" v-model="updatePersonnel.sexe" name="radu" value="M" id="radu">
                                            <label for="radu"><span class="mdi mdi-male-alt"></span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Diplome</label>
                                <input type="text"  v-model="updatePersonnel.diplomes" placeholder="Diplome" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Adresse</label>
                                <input type="text" v-model="updatePersonnel.adresse" placeholder="Adresse" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Quartier</label>
                                <input type="text" v-model="updatePersonnel.quartier" placeholder="Quartier" class="form-control">
                            </div>


                            <div class="form-group col-md-6">
                                <label>Telephone Domicile</label>
                                <input type="text" v-model="updatePersonnel.tel_domicile" placeholder="Adresse" class="form-control">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Telephone Mobile</label>
                                <input type="text" v-model="updatePersonnel.tel_mobile" placeholder="Telephone Mobile" class="form-control">
                            </div>


                            <input type="hidden" v-model="nomComplets" placeholder="Telephone Mobile" class="form-control">

                        </div>


                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                            <button type="button" data-dismiss="modal" class="btn btn-primary md-close" style="background-color: #34a853; border-color: #34a853;" @click="updatepersonnel">Modifier</button>
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

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste du personnel</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    <div class="heading-elements">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#form-bp1"><i class="ft-plus white"></i> Ajouter un membre</button>
                        <span class="dropdown">
                        <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-warning btn-sm dropdown-toggle dropdown-menu-right"><i class="ft-download white"></i></button>
                        <span aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-right">
                            <a href="#" class="dropdown-item"><i class="la la-calendar"></i> Due Date</a>
                            <a href="#" class="dropdown-item"><i class="la la-random"></i> Priority </a>
                            <a href="#" class="dropdown-item"><i class="la la-bar-chart"></i> Progress</a>
                            <a href="#" class="dropdown-item"><i class="la la-user"></i> Assign to</a>
                        </span>
                    </span>
                        <button class="btn btn-success btn-sm"><i class="ft-settings white"></i></button>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <!-- Task List table -->
                        <div class="table-responsive">
                            <table class="table table-white-space table-bordered table-middle table-condensed table-hover table-stripped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Nom</th>

                                    <th class="text-center">Prenoms</th>
                                    <th class="text-center">Sexe</th>
                                    <th class="text-center">Diplome</th>
                                    <th class="text-center">Adresse</th>
                                    {{--<th class="text-center">Nom Complet</th>--}}
                                    <th class="text-center">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(personnel,i) in personnels">

                                    <td class="text-center">@{{ i+1 }}</td>

                                    <td class="text-center">@{{ personnel.nom }}</td>
                                    <td class="text-center">@{{ personnel.prenoms }}</td>
                                    <td class="text-center">@{{ personnel.sexe }}</td>
                                    <td class="text-center">@{{ personnel.diplomes }}</td>
                                    <td class="text-center">@{{ personnel.adresse }}</td>
                                    {{--<td class="text-center">@{{ personnel.nom_complet    }}</td>--}}
                                    <td class="text-center">
                                        <a class="btn btn-info"  @click="showEditorModal(personnel)"  data-toggle="modal">Modifier</a>
                                        <a class="btn btn-danger" @click="showDeleteModal(personnel)">Supprimer</a>

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
    <script src="{{ asset('js/vues/admin/personnels.js') }}" type="module"></script>
    <script src="{{ asset('assets/lib/jquery.gritter/js/jquery.gritter.js') }}" type="text/javascript"></script>
@endsection

@section('content')


    <Personnels></Personnels>


@endsection