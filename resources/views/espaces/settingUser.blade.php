@extends("default")
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lib/summernote/summernote.css')}}"/>
@endsection

@section('js')
    <template id="setting">

        <div class="">
            <div class="">
                <div class="">
                    <div class="splash-container sign-up">
                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                            <div class="panel-heading"><img src="assets/img/logo-xx.png" alt="logo" width="102" height="27" class="logo-img"><span class="splash-description">Please change your user information.</span></div>
                            <div class="panel-body">
                                <span class="splash-title xs-pb-20">Setting Acoount</span>



                                <div class="form-group">
                                    <label for="">  eMail</label>
                                    <input type="email" v-model="seting.email"  required=""  autocomplete="off" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""> Ancien Password</label>
                                    <input type="password" v-model="seting.passwordold" required="" placeholder="votre nouveau Password" autocomplete="off" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""> Nouveau Password</label>
                                    <input type="password" v-model="seting.password"  placeholder="votre nouveau Password" autocomplete="off" class="form-control">
                                </div>

                                <div class="form-group xs-pt-10">
                                    <button type="submit" @click="para" class="btn btn-block btn-primary btn-xl">Change Setting</button>
                                </div>


                                <div class="form-group xs-pt-10">
                                    <div class="be-checkbox">

                                        <label for="remember">Vos identifiants seront changé selon les <a href="#">termes accords</a> </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="splash-footer">&copy; 2016 Your Company</div>
                    </div>
                </div>
            </div>
        </div>
    </template>


    <script src="{{asset('assets/lib/summernote/summernote.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/lib/summernote/summernote-ext-beagle.js')}}" type="text/javascript"></script>
    <script src="{{('assets/lib/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/lib/markdown-js/markdown.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/vues/settingUser.js') }}" type="module"></script>
    {{--<script src="{{ asset('js/vues/admin/chat.js') }}" type="module"></script>--}}

@endsection

@section('content')

    <Setting></Setting>


@endsection