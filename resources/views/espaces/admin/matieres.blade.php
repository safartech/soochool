@extends("templates.wrapper.modern")
@section('css')
   -
@endsection

@section('js')

    <template id="matieres">

        <section id="basic-tabs-components">
            <div class="form-group">
                <!-- Add Modal -->
                <div class="modal fade text-left" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-success white">
                                <h3 class="modal-title" id="myModalLabel35"> Ajouter Matiere</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form>
                                <div class="modal-body">
                                    <fieldset class="form-group floating-label-form-group">
                                        <label >Nom Matiere</label>
                                        <input type="text"  v-model="newMatiere.intitule" placeholder="Nom Matiere" class="form-control">
                                    </fieldset>
                                    <br>
                                    <fieldset class="form-group floating-label-form-group">
                                        <label>Indice Couleur</label>
                                        <input type="text" v-model="newMatiere.couleur" placeholder="Indice Couleur" class="form-control">
                                    </fieldset>
                                    <br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-primary md-close" style="background-color: #34a853; border-color: #34a853;" @click="addMatiere"><i style="color:white;" class="icon mdi mdi-plus-circle-o"></i> Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <!-- Edit Modal -->
                <div class="modal fade text-left" id="form-bp2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary white">
                                <h3 class="modal-title" id="myModalLabel35"> Modifier Matiere</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form>
                                <div class="modal-body">
                                    <fieldset class="form-group floating-label-form-group">
                                        <label >Nom Matiere</label>
                                        <input type="text"  v-model="updateMatiere.intitule" placeholder="Nom Matiere" class="form-control">                                                </fieldset>
                                    <br>
                                    <fieldset class="form-group floating-label-form-group">
                                        <label>Indice Couleur</label>
                                        <input type="text" v-model="updateMatiere.couleur" placeholder="Indice Couleur" class="form-control">
                                    </fieldset>
                                    <br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-primary md-close" @click="updatematiere" ><i style="color:white;" class="icon mdi mdi-plus-circle-o"></i> Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <!-- Delete Modal -->
                <div class="modal fade text-left" id="mod-danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-danger white">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <div class="text-danger"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
                                        <h3>Attention !!!</h3>
                                        <p>L' élément sera définitivement supprimé de la base de données.</p>
                                        <div class="xs-mt-50">
                                            <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Annuler</button>
                                            <button type="button" data-dismiss="modal"   @click="del()"  class="btn btn-space btn-danger">Supprimer</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row match-height">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Matieres</h4>
                                <h6>Geston et configuration des matières ou unités d'enseignements</h6>
                            </div>
                        </div>

                        <div class="card-content">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-underline no-hover-bg">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="base-tab31" data-toggle="tab" aria-controls="tab31" href="#tab31" aria-expanded="true">Liste des matieres</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-tab32" data-toggle="tab" aria-controls="tab32" href="#tab32" aria-expanded="false">Coefficients</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-tab33" data-toggle="tab" aria-controls="tab33" href="#tab33" aria-expanded="false">Niveaux d'etude</a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1 pt-1">
                                    {{-- Tab 1--}}
                                    <div role="tabpanel" class="tab-pane active" id="tab31" aria-expanded="true" aria-labelledby="base-tab31">
                                        <div class="card">
                                            <div class="card-header">
                                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                                <div class="heading-elements">
                                                    <button type="button" class="btn btn-success btn-sm block" data-toggle="modal" data-target="#add-modal"><i class="ft-plus white"></i> Ajouter</button>
                                                </div>
                                            </div>

                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">#</th>
                                                                    <th class="text-center">Couleur</th>
                                                                    <th class="text-center">Nom Matiere</th>
                                                                    <th class="text-center">Actions</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                            <tr v-for="(matiere,i) in matieres">

                                                                <td class="text-center">@{{ i+1 }}</td>
                                                                <td class="text-center" :style="{'background-color': matiere.couleur}"></td>
                                                                <td class="text-center">@{{ matiere.intitule }}</td>
                                                                <td class="text-center">
                                                                    <a class="btn btn-info btn-sm"  @click="showEditorModal(matiere)" data-toggle="modal">Modifier</a>
                                                                    <a class="btn btn-danger btn-sm"  @click="showDeleteModal(matiere)">Supprimer</a>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{--Tab 2--}}
                                    <div class="tab-pane" id="tab32" aria-labelledby="base-tab32">
                                        <!-- <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">#</th>
                                                                    <th class="text-center">Couleurs</th>
                                                                    <th class="text-center">Niveaux d'étude</th>
                                                                    <th class="text-center">Matieres</th>
                                                                    <th class="text-center">Coefficients</th>
                                                                    <th class="text-center">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <tr v-for="(ue,i) in ues">
                                                                    <td class="text-center">@{{ i+1 }}</td>
                                                                    <td class="text-center" :style="{'background-color': ue.matiere.couleur}"></td>
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
                                        </div> -->
                                    </div>

                                    {{-- Tab 3--}}
                                    <div class="tab-pane" id="tab33" aria-labelledby="base-tab33">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
                                                        <div class="card" v-for="niveau in niveaux">
                                                            <div id="heading1"  class="card-header" role="tab">
                                                                <a data-toggle="collapse" data-parent="#accordionWrapa1" class="collapsed" :href="'#'+niveau.id">@{{ niveau.nom }}</a>
                                                            </div>
                                                            <div  :id="niveau.id" class="panel-collapse collapse show">
                                                                <div class="card-content">
                                                                    <div  class="card-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                                                                <thead class="bg-primary white">
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
                                                                                    <td class="text-center"><button class="btn btn-primary btn-sm">Modifier</button></td>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </template>
    <script src="{{ asset('js/vues/admin/matieres.js') }}" type="module"></script>
@endsection

@section('content')

        <Matieres></Matieres>


@endsection
