@extends("default")
@section('css')@endsection

@section('js')
    <template id="scolarites">


        <div class="col-sm-12">


            <div id="form-bp1"  role="dialog" class="modal fade colored-header colored-header-primary">
                 <div class="modal-dialog custom-width">
                     <div class="modal-content">
                         <div class="modal-header" style="background-color: #34a853;">
                             <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                             <h3 class="modal-title">Ajout Niveau</h3>
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
             <div class="panel panel-default">
                <div class="panel-heading">Scolarite
                    <div class="tools"> <button data-toggle="modal" data-target="#form-bp1" type="button" class="btn btn-space btn-success  "><i style="color:white;" class="icon mdi mdi-plus-circle-o"></i> Ajouter</button></div>
                </div>
                <div class="panel-body">
                    <table class="table table-condensed table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center">Classe</th>
                            <th class="text-center">Solde </th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(scolarite,i) in scolarites">

                            <td class="text-center">@{{ i+1 }}</td>
                            <td class="text-center">@{{ scolarite.niveau.nom }}</td>
                            <td class="text-center">@{{ scolarite.solde }}</td>
                            <td class="text-center">

                                <a class="btn btn-info"  @click="showEditorModal(scolarite)" data-toggle="modal"><i style="color:white;" class="icon mdi mdi-edit"></i>  Modifier</a>
                            </td>

                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </template>
    <script src="{{ asset('js/vues/admin/scolarite.js') }}" type="module"></script>
@endsection

@section('content')

    <Scolarites></Scolarites>


@endsection