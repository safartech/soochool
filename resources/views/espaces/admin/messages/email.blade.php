@extends("default")
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/select2/css/select2.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/summernote/summernote.css') }}"/>
@endsection

@section('js')
    <script src="{{ asset('assets/lib/summernote/summernote.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/lib/summernote/summernote-ext-beagle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/lib/select2/js/select2.min.js') }}" type="text/javascript"></script>
    <script type="module" src="{{ asset('js/vues/admin/messages/email.js') }}"></script>

    <template id="email">
        <div class="be-content be-no-padding">
            <aside class="page-aside">
                <div class="be-scroller">
                    <div class="aside-content">
                        <div class="content">
                            <div class="aside-header">
                                <button data-target=".aside-nav" data-toggle="collapse" type="button" class="navbar-toggle"><span class="icon mdi mdi-caret-down"></span></button><span class="title">Mail Service</span>
                                <p class="description">Service description</p>
                            </div>
                        </div>
                        <div class="aside-nav collapse">
                            <ul class="nav">
                                <li><a href="#"><span class="label label-primary">8</span><i class="icon mdi mdi-inbox"></i> Inbox</a></li>
                                <li class="active"><a href="#"><i class="icon mdi mdi-email"></i> Sent Mail</a></li>
                                <li><a href="#"><span class="label label-default">4</span><i class="icon mdi mdi-case"></i> Important</a></li>
                                <li><a href="#"><i class="icon mdi mdi-file"></i> Drafts</a></li>
                                <li><a href="#"><i class="icon mdi mdi-star"></i> Tags</a></li>
                                <li><a href="#"><i class="icon mdi mdi-delete"></i> Trash</a></li>
                            </ul><span class="title">Labels</span>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#"><span class="label label-success">2</span> Inbox</a></li>
                                <li><a href="#"><span class="label label-warning">7</span>Sent Mail</a></li>
                                <li><a href="#"><span class="label label-danger">0</span>Important</a></li>
                            </ul>
                            <div class="aside-compose"><a class="btn btn-lg btn-primary btn-block">Compose Email</a></div>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="container-fluid" style="margin-left: 20px">
                <div class="email-head">
                    <div class="email-head-title">Compose new message<span class="icon mdi mdi-edit"></span></div>
                </div>
                <div class="email-compose-fields">
                    <div class="to">
                        <div class="form-group row">
                            <label class="col-sm-1 control-label">Aux:</label>
                            <div class="col-sm-11">
                                <select id="select2-to" class="tags select2">
                                    <option value="1" selected="">Parents</option>
                                    <option value="2">Elèves</option>
                                    <option value="3" >Professeurs</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="to cc">
                        <div class="form-group row">
                            <label class="col-sm-1 control-label">Destinataire</label>
                            <div class="col-sm-11">
                                <select id="select2-cc" class="tags select2">
                                    <option value="*" selected="">Tous</option>
                                    <option v-for="person in persons" :value="person.id">@{{ person.nom_complet }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="subject">
                        <div class="form-group row">
                            <label class="col-sm-1 control-label">Phone N°</label>
                            <div class="col-sm-11">
                                <input type="email" class="form-control" v-model="newMessage.email">
                            </div>
                        </div>
                    </div>
                    <div class="subject">
                        <div class="form-group row">
                            <label class="col-sm-1 control-label">Objet</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" v-model="newMessage.subject">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="email editor">
                    <div id="email-editor"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-space" @click="sendMail()"><i class="icon s7-mail"></i> Envoyer</button>
                        <button type="button" class="btn btn-default btn-space"><i class="icon s7-close"></i> Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </template>
@endsection

@section('content')
    <Email></Email>
@endsection