@extends('layouts.app')

@section('content')

    @include('partials._slide')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> <h3 class="panel-title"> Completr mes informations </h3> </div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="col-lg-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="control-label"> Qaurtier de residence </label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 {{ $errors->has('pseudo') ? ' has-error' : '' }}">
                                    <label for="pseudo" class="control-label"> Code postal </label>
                                    <input id="pseudo" type="text" class="form-control" name="pseudo" value="{{ old('pseudo') }}" required>

                                    @if ($errors->has('pseudo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pseudo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="site" class="control-label">Rue</label>
                                    <input id="site" type="text" class="form-control" name="site">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 {{ $errors->has('pseudo') ? ' has-error' : '' }}">
                                    <label for="pseudo" class="control-label"> Telephone </label>
                                    <input id="pseudo" type="text" class="form-control" name="pseudo" value="{{ old('pseudo') }}" required>

                                    @if ($errors->has('pseudo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pseudo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-lg-12">
                                    <label for="Biographie" class="control-label"> Intéressé par </label>
                                    <textarea id="Biographie" class="form-control" name="Biographie" value="{{ old('Biographie') }}" placeholder="Tag tes interets">
                                    </textarea>

                                    @if ($errors->has('Biographie'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('Biographie') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success">
                                        Enregistrer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    $("#btn").on('click', function (e) {
        e.preventDefault();
        var file;
        if( typeof file !=='undefined'){
            $("#image").html('<img href="{{route('home')}}" />');
        }
        else{
            alert("veuillez d'abord selection une image sous votre ordinateur");
        }
    })

    </script>
@stop