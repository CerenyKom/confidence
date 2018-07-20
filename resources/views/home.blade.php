@extends('layouts.app')

@section('content')

    @include('partials._slide')

    <section class="container content-section" id="Flux">
        <div class="container">
                <div class="col-md-8 col-lg-offset-2">
                    <div id="app">
                       <post></post>
                    </div>
                </div>    
        </div>
    </section>

@endsection
