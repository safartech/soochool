@extends("default")
@section('css')
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/select2/css/select2.min.css') }}"/>--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select2/css/select2.min.css') }}">
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/bootstrap-slider/css/bootstrap-slider.css') }}"/>--}}
    <link rel="stylesheet" href="{{ asset('assets/lib/datatables/css/dataTables.bootstrap.min.css') }}">
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/jquery.fullcalendar/fullcalendar.min.css') }}"/>--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/fullcalendar/css/fullcalendar.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('js/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('js/plugins/bootstrap-slider/css/bootstrap-slider.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('js/plugins/jquery.gritter/js/jquery.gritter.css')}}"/>

    <style>
        .select2{
            width: 100%;
        }
        .index{
            cursor: pointer;
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('assets/lib/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/lib/datatables/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/lib/select2/js/select2.min.js') }}" type="text/javascript"></script>
    {{--<script src="{{ asset('js/select2/js/select2.js') }}" type="text/javascript"></script>--}}

    <script src="{{ asset('assets/lib/moment.js/min/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/momentjs/moment.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/momentjs/moment-with-locales.js') }}" type="text/javascript"></script>
    {{--<script src="{{ asset('assets/lib/jquery.fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>--}}
    <script src="{{ asset('js/plugins/fullcalendar/js/fullcalendar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/fullcalendar/js/locale-all.js') }}" type="text/javascript"></script>
    <script src="{{asset('js/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/plugins/bootstrap-slider/js/bootstrap-slider.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/plugins/jquery.gritter/js/jquery.gritter.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/plugins/js/main.js')}}" type="text/javascript"></script>


    {{--<script src="{{ asset('js/plugins/fullcalendar/fullcalendar-script.js') }}" type="text/javascript"></script>--}}


    <script type="text/javascript">

        $(document).ready(function(){

            App.pageCalendar();
            $('.tooltipped').tooltip({});

            $( ".select2" ).select2();
            App.init();
            App.formElements();
            App.uiNotifications();

        });
    </script>

    <template id="retards" type="text\template">
        <div>
          <!--  <button id="not-success" class="btn btn-space btn-success" >Success</button>-->
            <div class="col-lg-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">Ajouter un retard à un Elève</div>
                    <div class="panel-body">
                        <div class="col-lg-1 col-md-1">
                            <div class="btn-toolbar">
                                <label>Options</label>
                                <div  class="" role="group">
                                    <a href="#" @click="reload" class="btn-xl btn  btn-default" data-toggle="tooltip" data-placement="top" title="Recharger les données"><i class="icon mdi mdi-refresh"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3">
                            <div class=""><label class="control-label">Classes</label></div>
                            <div class="">
                                <select id="select2-classe" class="select2">
                                    <option value="0" disabled selected  >Selectionner la classe</option>
                                    <option v-for="classe in classes" :value="classe.id">@{{ classe.nom }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-7 col-md-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">Liste des élèves
                                    <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-condensed table-hover table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Liste des élèves</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="eleve in eleves" @click="addRetard(eleve.id)" data-toggle="modal" data-target="#form-retard">
                                            <td >@{{ eleve.nom_complet }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            {{--Modal Retard--}}
            <div id="form-retard" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Ajouter un retard pour l'élève : <span style="font-weight: bold">@{{ selectedEleve.nom_complet }} (@{{ selectedClasse.nom }})</span></h3>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="date"> Selectionnez la date </label>
                                    <div data-min-view="2" data-date-format="dd-mm-yyyy" class="input-group date datetimepicker">
                                        <input size="16" type="text" v-model="date_retard"  class="form-control"  id="date"><span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
                                    </div>

                            </div><br>
                            <div class="form-group">
                                <label for="motif">Ajouter un motif</label>
                                <input type="text" v-model="motif_retard" id="motif" placeholder="motif" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                            <button type="button" data-dismiss="modal" class="btn btn-primary md-close" @click="submitRetard()">Valider</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </template>

    <script type="module" src="{{ asset('js/vues/protected/retard.js') }}"></script>

@endsection

@section('content')

    <retards></retards>

@endsection