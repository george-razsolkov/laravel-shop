@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-success">
            @if(Auth::check())
                <div class="container">
                    <div>
                        <p>bacho pesho</p>
                        <p>bacho pesho</p>
                        <p>bacho ba</p>
                        <p>bacho stoqn</p>
                    </div>
                </div>
            @endif
        </div>
        @if(Auth::guest())
            <a href="login" class="btn btn-info"> You need to login to see the list 😜😜 >></a>
        @endif
    </div>
@endsection