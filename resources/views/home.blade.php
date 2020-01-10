@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!--<div class="panel-heading">Menu principal</div> -->

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <center><img src="{{ asset('images/ciudad.png') }}"></center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
