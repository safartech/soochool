@extends("default")
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lib/summernote/summernote.css')}}"/>
@endsection

@section('js')
    <template id="blog">


        <div class="col-sm-12"  id="principale" >

            <div class="panel panel-default">
                <div class="panel-heading">Article Posté

                    <div class="tools"> <button data-toggle="modal" @click="showAddPanel" type="button" class="btn btn-space btn-success" v-if="{{\Illuminate\Support\Facades\Auth::user()->role_id}}==1 ||{{\Illuminate\Support\Facades\Auth::user()->role_id}}==3 ||{{\Illuminate\Support\Facades\Auth::user()->role_id}}==10 "><i style="color:white;" class="icon mdi mdi-plus-circle-o"></i> Ajouter</button></div>
                    <div class="tools"> <button data-toggle="modal" @click="showAllPost" type="button" class="btn btn-space btn-success" ><i style="color:white;" class="icon mdi mdi-plus-circle-o"></i> Liste Poste</button></div>
                </div>



            </div>
            <div v-show="affichage">
                <div v-for="(post,i) in Poste">
                    <div class="col-md-4">
                        <div class="panel panel-border-color panel-border-color-primary">
                            <div class="panel-heading">@{{ post.title }}</div>
                            <div class="panel-body">
                                <p v-html="post.body"> </p>

                                <div class="panel-heading">

                                    <div class="tools"> <button  @click="plusPost(post)" type="button" class="btn btn-space btn-primary  "><i style="color:white;" class="icon mdi mdi-plus-circle-o"></i> Lire Plus</button></div>
                                    <div class="tools" v-if="post.author_id=={{\Illuminate\Support\Facades\Auth::user()->id}} "> <button  @click="editPoste(post)" type="button" class="btn btn-space btn-primary  "><i style="color:white;" class="icon mdi mdi-plus-circle-o"></i> Modifier</button></div>
                                    <div class="tools"  v-if="post.author_id=={{\Illuminate\Support\Facades\Auth::user()->id}} "> <button  @click="del(post)" type="button" class="btn btn-space btn-danger  "><i style="color:white;" class="icon mdi mdi-delete"></i> Supprimer</button></div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="main-content container-fluid" v-show="ajout">
                <!--Summernote-->
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-default panel-border-color panel-border-color-primary">

                            <div class="panel-heading panel-heading-divider"><span style="font-weight: bold;">Ajout de Poste</span><span class="panel-subtitle">Veillez renseigner le titre et le contenude votre Article</span>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="form-group col-lg-6  col-sm-12">
                                        <label><span style="font-weight: bold;">Titre de l'Article</span></label>
                                        <input type="email" placeholder="Titre"  v-model="newPoste.title" class="form-control">
                                    </div>
                                </div>
                                <span style="font-weight: bold;font-size: 15px;">Body de votre Article</span>
                                <br>

                                <div class="row">
                                    <div id="editor1"></div>
                                </div>
                                <div class="panel-heading">
                                    <div class="tools"> <button  @click="addPoste" type="button" class="btn btn-space btn-primary  "><i style="color:white;" class="icon mdi mdi-plus-circle-o"></i> Soumettre</button></div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!--Bootstrap Markdown-->

            </div>
            <div class="main-content container-fluid" v-show="modif">
                <!--Summernote-->
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-default panel-border-color panel-border-color-primary">

                            <div class="panel-heading panel-heading-divider"><span style="font-weight: bold;">Mofication de Poste</span><span class="panel-subtitle">Veillez renseigner le titre et le contenude votre Article</span>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="form-group col-lg-6  col-sm-12">
                                        <label><span style="font-weight: bold;">Titre de l'Article </span></label>
                                        <input type="email" placeholder="Titre" v-model="updatepost.title" class="form-control">
                                    </div>
                                </div>
                                <span style="font-weight: bold;font-size: 15px;">Body de votre Article</span>
                                <br>

                                <div class="row"><div id="editor2"></div></div>
                                <div class="panel-heading">

                                    <div class="tools"> <button  @click="updatePoste" type="button" class="btn btn-space btn-primary  "><i style="color:white;" class="icon mdi mdi-plus-circle-o"></i> Modifier</button></div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!--Bootstrap Markdown-->

            </div>
            <div v-show="vue">
                <div>
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="panel panel-border-color panel-border-color-primary">

                            <div class="panel-body">@{{ infopost.title }}

                                <p v-html="infopost.body"></p>
                                <span v-for="inf in nom" style="text-align: center;padding-right: 0px;">Article Posté par @{{ inf.name }} le @{{ infopost.created_at }}
                                </span>

                            </div>

                        </div>
                    </div>
                    <div class="col-md-1"></div>

                    <div class="col-md-10">
                        <ul class="timeline">
                            <li class="timeline-item" v-for="com in comment">
                                <div class="timeline-date"><span></span>@{{ ((com.created_at)).substring(-1,10)}}</div>
                                <div class="timeline-content">
                                    <div class="timeline-avatar"><img src="storage/users/default.png" alt="Avatar" class="circle"></div>
                                    <div class="timeline-header"><span class="timeline-time"  v-if="com.user_id=={{\Illuminate\Support\Facades\Auth::user()->id}} " @click="delcomment(com)"><i style="color:red;font-size: 25px;margin-left: 20px" class="icon mdi mdi-delete"></i></span><span class="timeline-time">@{{ ((com.created_at)).substring(11)}}</span><span class="timeline-autor">@{{ com.content }}</span>
                                        <p class="timeline-activity"> <a href="#">Amet nisl sed mattis</a>.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="form-group col-md-12  col-sm-12 navbar-fixed-bottom ">
                        <div class="col-md-2"></div>

                        <div class="col-sm-12">
                            <div class="col-md-2"></div>
                            <div class="input-group xs-mb-14">

                                <textarea type="text" class="form-control" placeholder="Faire un Commentaire" v-model="newComment.content"></textarea><span class="input-group-btn">
                            <button type="button" class="btn btn-primary" @click="addcomment(infopost)" style="border-radius: 5px;">Go!</button></span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


    </template>
    <script src="{{asset('assets/lib/summernote/summernote.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/lib/summernote/summernote-ext-beagle.js')}}" type="text/javascript"></script>
    <script src="{{('assets/lib/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/lib/markdown-js/markdown.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/vues/admin/blog.js') }}" type="module"></script>

@endsection

@section('content')

    <Blog></Blog>


@endsection