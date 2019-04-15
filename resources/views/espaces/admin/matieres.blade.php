@extends("templates.wrapper.modern")
@section('css')@endsection

@section('js')
    <template id="matieres">

        <div class="content-body"><!-- Basic Tables start -->
            <div class="row">
                <div class="col-12">
                    <div id="form-bp1"  role="dialog" class="modal fade colored-header colored-header-primary">
                        <div class="modal-dialog custom-width">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #34a853;">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                                    <h3 class="modal-title">Ajout Matiere</h3>
                                </div>
                                <div class="modal-body ">
                                    <div class="form-group col-md-12">
                                        <label>Nom Matiere</label>
                                        <input type="text"  v-model="newMatiere.intitule" placeholder="Nom Matiere" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Indice Couleur</label>
                                        <input type="text" v-model="newMatiere.couleur" placeholder="Indice Couleur" class="form-control">
                                    </div>

                                </div>


                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-primary md-close" style="background-color: #34a853; border-color: #34a853;" @click="addMatiere"><i style="color:white;" class="icon mdi mdi-plus-circle-o"></i> Ajouter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="form-bp2"  role="dialog" class="modal fade colored-header colored-header-primary">
                        <div class="modal-dialog custom-width">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                                    <h3 class="modal-title">Modification Matiere</h3>
                                </div>
                                <div class="modal-body ">
                                    <div class="form-group col-md-12">
                                        <label>Nom Matiere</label>
                                        <input type="text"  v-model="updateMatiere.intitule" placeholder="Nom Matiere" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Indice Couleur</label>
                                        <input type="text" v-model="updateMatiere.couleur" placeholder="Indice Couleur" class="form-control">
                                    </div>

                                </div>


                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-primary md-close" @click="updatematiere" ><i style="color:white;" class="icon mdi mdi-plus-circle-o"></i> Modifier</button>
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
                            <h4 class="card-title">Both borders</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <button type="button" class="btn btn-success btn-min-width mr-1 mb-1" data-toggle="modal" data-target="#form-bp1"><i class="la la-plus-circle"></i>Ajouter</button>
                            </div>

                        </div>

                        <div class="card-content">
                            <div class="card-body card-dashboard">

                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Couleur</th>
                                        <th>Nom</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(matiere,i) in matieres">

                                        <td class="text-center"  style="font-weight: bold">@{{ i+1 }}</td>
                                        <td :style="{'background-color': matiere.couleur}" style="height: 10px;"></td>
                                        <td class="text-center" style="font-weight: bold">@{{ matiere.intitule }}</td>
                                        <td class="text-center">

                                            <a type="button" class="btn btn-info btn-min-width  mr-1 mb-1"  @click="showEditorModal(matiere)" data-toggle="modal" style="color: white">Modifier</a>
                                            <a type="button" class="btn btn-danger btn-min-width  mr-1 mb-1" @click="showDeleteModal(matiere)"  style="color: white"><i class="la la-star-o" ></i>Supprimer</a>


                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Responsive tables end -->
        </div>
       {{-- <div class="col-sm-12">

            --}}{{--Add matiere modal--}}{{--
            <div id="form-bp1"  role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #34a853;">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Ajout Matiere</h3>
                        </div>
                        <div class="modal-body ">
                            <div class="form-group col-md-12">
                                <label>Nom Matiere</label>
                                <input type="text"  v-model="newMatiere.intitule" placeholder="Nom Matiere" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Indice Couleur</label>
                                <input type="text" v-model="newMatiere.couleur" placeholder="Indice Couleur" class="form-control">
                            </div>

                        </div>


                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                            <button type="button" data-dismiss="modal" class="btn btn-primary md-close" style="background-color: #34a853; border-color: #34a853;" @click="addMatiere"><i style="color:white;" class="icon mdi mdi-plus-circle-o"></i> Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>

            --}}{{--Edit matiere modal--}}{{--
            <div id="form-bp2"  role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Modification Matiere</h3>
                        </div>
                        <div class="modal-body ">
                            <div class="form-group col-md-12">
                                <label>Nom Matiere</label>
                                <input type="text"  v-model="updateMatiere.intitule" placeholder="Nom Matiere" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Indice Couleur</label>
                                <input type="text" v-model="updateMatiere.couleur" placeholder="Indice Couleur" class="form-control">
                            </div>

                        </div>


                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                            <button type="button" data-dismiss="modal" class="btn btn-primary md-close" @click="updatematiere" ><i style="color:white;" class="icon mdi mdi-plus-circle-o"></i> Modifier</button>
                        </div>
                    </div>
                </div>
            </div>


            --}}{{--Delete alert--}}{{--
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

            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading ">Matières
                    <span class="panel-subtitle">Gestion et configuration des matières ou unités d'enseignements</span>
                    <div class="tools">
                        --}}{{--<span class="icon mdi mdi-more-vert"></span>--}}{{--
                    </div>
                </div>

                <div class="tab-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#matiere-list" data-toggle="tab"><span class="icon mdi mdi-calendar-alt"></span>Liste des matières</a></li>
                        <li><a href="#ues-list" data-toggle="tab"><span class="icon mdi mdi-calendar"></span>Coeficients</a></li>
                        <li><a href="#by-level" data-toggle="tab"><span class="icon mdi mdi-calendar"></span>Niveaux d'étude</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="matiere-list" class="tab-pane active cont">
                            <div class="panel-body">
                                <button class="btn  btn-success pull-right btn-space" data-toggle="modal" data-target="#form-bp1" type="button"><i style="color:white;" class="icon mdi mdi-plus-circle-o"></i>Ajouter</button>
                                <br>
                                <br>
                                <table class="table table-condensed table-hover table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Couleur</th>
                                            <th class="text-center">Nom Matiere</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(matiere,i) in matieres">

                                            <td class="text-center">@{{ i+1 }}</td>
                                            <td class="text-center" :style="{'background-color': matiere.couleur}"></td>
                                            <td class="text-center">@{{ matiere.intitule }}</td>
                                            <td class="text-center">

                                                <a class="btn btn-info"  @click="showEditorModal(matiere)" data-toggle="modal">Modifier</a>
                                                <a class="btn btn-danger"  @click="showDeleteModal(matiere)">Supprimer</a>
                                            </td>

                                        </tr>

                                        </tbody>
                                    </table>
                            </div>
                        </div>
                        <div id="ues-list" class="tab-pane cont" >
                            <div class="panel-body">
                                <div class="panel-body">
                                    <table class="table table-condensed table-hover table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            --}}{{--<th class="text-center">Couleur</th>--}}{{--
                                            <th class="text-center">Niveaux d'étude</th>
                                            <th class="text-center">Matieres</th>
                                            <th class="text-center">Coefficients</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(ue,i) in ues">

                                            <td class="text-center">@{{ i+1 }}</td>
                                            --}}{{--<td class="text-center" :style="{'background-color': matiere.couleur}"></td>--}}{{--
                                            <td class="text-center">@{{ ue.niveau?ue.niveau.nom:'' }}</td>
                                            <td class="text-center">@{{ ue.matiere?ue.matiere.intitule:'' }}</td>
                                            <td class="text-center">@{{ ue.coef }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-info" data-toggle="modal">Modifier</a>
                                                <a class="btn btn-danger">Supprimer</a>
                                            </td>

                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="by-level" class="tab-pane cont">
                            <div class="panel-body">

                                <div id="accordion1" class="panel-group accordion" >

                                    <div class="panel panel-default panel-border-color panel-border-color-info" v-for="niveau in niveaux">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" :href="'#'+niveau.id" class="collapsed"><i class="icon mdi mdi-chevron-down"></i>@{{ niveau.nom }}</a></h4>
                                        </div>
                                        <div :id="niveau.id" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <table class="table table-condensed table-hover table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Matiere</th>
                                                        <th class="text-center">Coef</th>
                                                        <th class="text-center">Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="(ue,i) in niveau.ues">
                                                        <td class="text-center">@{{ i+1 }}</td>
                                                        <td class="text-center">@{{ ue.matiere?ue.matiere.intitule:'' }}</td>
                                                        <td class="text-center">@{{ ue.coef }}</td>
                                                        <td class="text-center"><button class="btn btn-default">Modifier</button></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}


    </template>
    <script src="{{ asset('js/vues/admin/matieres.js') }}" type="module"></script>
@endsection

@section('content')

        <Matieres></Matieres>


@endsection
