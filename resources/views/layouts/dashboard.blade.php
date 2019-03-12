@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <nav class="admin-menu">
                <ul>
                    <li>
                        <a {{ $module=="Home" ? 'class=active' : '' }} href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a {{ $module=="News" ? 'class=active' : '' }} href="{{ route('news') }}">News</a>
                    </li>
                    <li>
                        <a {{ $module=="Category" ? 'class=active' : '' }} href="{{ route('category') }}">Category</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                        document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-md-9 no-padding">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $module }}</div>

                <div class="panel-body">
                    @yield('content_dashboard')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
