@if(Auth()->user()->isAdmin())

    {{--@php return view('layouts.sidebars.admin') @endphp--}}
    @include('layouts.sidebars.modern.admin')
    @elseif(Auth()->user()->isProf())

    @include('layouts.sidebars.modern.prof')

    @elseif(Auth()->user()->isParent())

    @include('layouts.sidebars.modern.parent')

@endif