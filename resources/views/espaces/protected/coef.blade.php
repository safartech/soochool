@extends("default")
@section('css')@endsection

@section('js')

    <script src="{{ asset('js/vues/protected/coef.js') }}" type="module"></script>
    <template id="coef">
        <div>

        </div>
    </template>
@endsection

@section('content')
    <coef></coef>
@endsection