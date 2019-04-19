@extends("templates.wrapper.modern")
@section('css')@endsection

@section('js')
    <template id="scolarites">


        <div class="col-sm-12">
            <div id="form-bp1"  role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #34a853;">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Ajout Scolarite</h3>
                        </div>
                        <div class="modal-body ">



                            <div class="form-group col-md-12">
                                <label >Classe</label>
                                <div >
                                    <select class="form-control"  v-model="newScolarite.niveau_id">
                                        <option value="">Selectionner la classe</option>
                                        <option :value="niveau.id" v-for="niveau in niveaux">@{{ niveau.nom }}</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Solde</label>
                                <input type="text"  v-model="newScolarite.solde" placeholder="Code Niveau" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                            <button type="button" data-dismiss="modal" class="btn btn-primary md-close" style="background-color: #34a853; border-color: #34a853;" @click="addScolarite"  v-if="newScolarite.solde !='' && newScolarite.classe_id !='' "><i style="color:white;" class="icon mdi mdi-plus-circle-o" ></i> Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="form-bp2"  role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Modification Solde</h3>
                        </div>
                        <div class="modal-body ">

                            <div class="form-group col-md-12">
                                <label>Nom Solde</label>
                                <input type="text" v-model="updateScolarite.solde" placeholder="Nom Niveau" class="form-control">
                            </div>

                            <input type="hidden"  v-model="updateScolarite.classe_id" placeholder="Code Niveau" class="form-control">

                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                            <button type="button" data-dismiss="modal" class="btn btn-primary md-close" @click="updatescolarite" ><i style="color:white;" class="icon mdi mdi-plus-circle-o"></i> Modifier</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Espace Scolarite</h4>
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
                                    <th class="text-center">Classe</th>
                                    <th class="text-center" >Solde</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr  v-for="(scolarite,i) in scolarites">
                                    <td class="text-center">@{{ i+1 }}</td>
                                    <td class="text-center">@{{ scolarite.niveau.nom }}</td>
                                    <td class="text-center">@{{ scolarite.solde }}</td>
                                    <td class="text-center">

                                        <button class="btn btn-info btn-sm" data-toggle="modal" @click="showEditorModal(scolarite)">Modifier</button>






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
    <script src="{{ asset('js/vues/admin/scolarite.js') }}" type="module"></script>
@endsection

@section('content')

    <Scolarites></Scolarites>


@endsection