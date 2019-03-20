@if(Auth()->user()->isAdmin())

    {{--@php return view('layouts.sidebars.admin') @endphp--}}
    @include('layouts.navbars.modern.admin')

    @elseif(Auth()->user()->isProf())

    @include('layouts.navbars.modern.prof')

    @elseif(Auth()->user()->isParent())

    @include('layouts.navbars.modern.parent')

@endif