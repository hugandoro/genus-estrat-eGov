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

                    <!--<center><picture><img class='img-responsive' src="{{ asset('images/portada_menu.png') }}"></picture></center>-->
                    <div id="particles-js"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
