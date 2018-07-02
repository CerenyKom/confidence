@extends('layouts.app')

@section('content')

    <!--Modal connexion and sign -->

    <div class="modal fade lg scene_3d" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="groupe_form">
                        <div class="box_info login">
                            <div class="center">
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="col-md-10 col-md-offset-1">
                                            <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                   <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="col-md-10 col-md-offset-1">
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-10 col-md-offset-1">
                                            <button type="submit" class="btn btn-primary">
                                                Se connecter
                                            </button>

                                            <a class="btn-link" href="{{ route('password.request') }}">
                                                mot de passe oublier?
                                            </a>
                                            <a href="#" class="btn btn-primary" id="sign" > S'inscrire</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box_form">
                            <div class="center">
                                <form class="form-horizontal" method="POST" action="{{ route('register') }}" id="register">
                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('pseudo') ? ' has-error' : '' }}">
                                        <div class="col-lg-10 col-lg-offset-1">
                                            <label for="pseudo" class="control-label"> &ast; Pseudo</label>
                                            <input id="pseudo" type="text" class="form-control" name="pseudo" required autofocus>
                                        </div>
                                        @if ($errors->has('pseudo'))
                                            <span class="help-block">
                                                  <strong>{{ $errors->first('pseudo') }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="col-lg-10 col-lg-offset-1">
                                            <label for="semail" class="control-label"> &ast; Addresse email </label>
                                            <input id="semail" type="email" class="form-control" name="email" required>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                  <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="col-lg-5 col-lg-offset-1">
                                            <label for="spassword" class="control-label">&ast; Mot de passe</label>
                                            <input id="spassword" type="password" class="form-control" name="password" required>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                  <strong>{{ $errors->first('password')}}</strong>
                                                </span>
                                        @endif
                                        <div class="col-lg-5">
                                            <label for="password-confirm" class="control-label"> &ast; Confirmer le mot de passe</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-5 col-lg-offset-1">
                                            <button class="btn btn-primary">
                                                S'identifier avec Facebook
                                            </button>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="submit" name="sign" value="Enregistrer" class="btn btn-success">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-7 col-lg-offset-1">
                                            Vous avez deja un compte?
                                            <a id="retour">
                                                connecter vous
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>


    <!--End modal-->

    <section class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <p class="intro-text">
                        <div class="overlay ">
                            <h1 class="heading">Une Communauté Exeptionnelle, Pour Vos Sujets Confidentiels</h1><br>

                            <!-- debut caroussel texte -->

                            <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">

                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <h4> {{ config('app.name') }} est une plateforme, une communaute de soutient </h4>
                                    </div>
                                    <div class="item">
                                        <h4>ou les adherents peuvent discuter anonymement et gratuitement </h4>
                                    </div>
                                    <div class="item">
                                        <h4>avec une grande caummunauté bienveillants</h4>
                                    </div>
                                </div>

                            </div>

                        </p>
                        <!--<a href="#" onclick="javascript:window.print()">Imprimer</a>-->
                        {{--<div class="page-scroll">--}}
                        {{--<button type="button"  class="btn btn-primary" id="btn1" data-toggle="modal" data-target="#myModal3">Lire d'avantage</button>--}}

                        {{--</div>--}}
                    </div>

                    <!-- Modal -->
                    <div id="myModal3" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h3 class="modal-title">QUI SOMMES NOUS ?</h3>
                                </div>
                                <div class="modal-body">
                                    <p class="lead"> Le besoin de se confier est propre au genre humain et nécessaire dans le sens où tout le monde a besoin de vider son cœur, de faire des confidences en toute discrétion et de se fier à quelqu'un en qui on a confiance. Cette personne peut être un thérapeute, un membre de la famille, un ami, ou la plateforme Confidences.<br><br>
                                        Le besoin de se confier ou d'être entendu sans ressentir l'impression d'être jugé se traduit par l'externalisation des soucis afin de les évaluer de manière objective. Il n'est pas facile de dévoiler son ressenti mais en se confiant, avec une lettre, une personne,ou avec une plateforme collaborative et completement annonyme telle que Confidences ,le niveau de sécurité intérieure augmente petit à petit.<br><br>
                                        Le besoin de se confier est synonyme de véritable échange entre soi-même et l'autre. Discuter de ses problèmes avec une personne de son entourage constitue parfois un grand défi.Confidences s'avère alors de part sa simplicité et sa pertinance, l'un des meilleurs moyens pour quelqu'un qui a besoin de se confier. </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container content-section" id="why">
        <div class="row" >
            <div class="text-center">
                <h2 >Pourquoi vous exprimer sur <span class="tm1">Con</span><span class="tm2">fiden</span><span class="tm3">ces</span> ? </h2>
                <p>Voici quelques raison éssentielles pour lesquelles vous pouvez nous faire confiance.</p>
            </div>

            <div class="col-sm-4 para">
                <div class="center btmspace-50">
                    <h3 class="font-x1 btmspace-30"><i class="fa fa-2x fa-lock rightspace-10"></i> Discrétion</h3>
                    <p>La communauté <span class="tm1">Con</span><span class="tm2">fiden</span><span class="tm3">ces</span> est capable de garder pour
                        elle vos confidences.Discutez librement sans inscription préalable.
                        L’anonymat est essentiel pour vous permettre de nous contacter en toute confiance.
                        Vous n’avez pas à fournir d’informations personnelles pour démarrer une conversation &hellip;</p>    </div>
            </div>

            <div class="col-sm-4 para">
                <div class="center btmspace-50">
                    <h3 class="font-x1 btmspace-30"><i class="fa fa-2x fa-plane rightspace-10"></i> Stratégie </h3>
                    <p>L'aide de La communauté <span class="tm1">Con</span><span class="tm2">fiden</span><span class="tm3">ces</span> ne devrait pas consister à faire front commun avec vous contre une autre personne, mais bien à vous donner un coup de main
                        pour élaborer davantage sur vos émotions, vos sentiments, votre vécu.&hellip;</p>
                </div>
            </div>

            <div class="col-sm-4 para">
                <div class="center btmspace-50">
                    <h3 class="font-x1 btmspace-30"><i class="fa fa-2x fa-calculator rightspace-10"></i> Solutions</h3>
                    <p>La communauté <span class="tm1">Con</span><span class="tm2">fiden</span><span class="tm3">ces</span> ne doit pas endosser votre souffrance, mais vous écouter d’abord, vous amener sans doute à voir les choses sous d’autres angles et vous permettre
                        d’entrevoir d’autres manières d’aborder le problème.&hellip;</p>
                </div>
            </div>

        </div>

        <div class="row" >

            <div class="col-sm-4 para">
                <div class="center btmspace-50">
                    <h3 class="font-x1 btmspace-30"><i class="fa fa-2x fa-money rightspace-10"></i> Gratuité</h3>
                    <p>La communauté <span class="tm1">Con</span><span class="tm2">fiden</span><span class="tm3">ces</span> est constituée d'écouteurs
                        volontaires et bienveillants. Toutes les convresations sont gratuites quelques soit votre sujet. Pas un franc ne vous sera demandé!&hellip;</p>
                </div>
            </div>

            <div class="col-sm-4 para">
                <div class="center btmspace-50">
                    <h3 class="font-x1 btmspace-30"><i class="fa fa-2x fa-handshake-o rightspace-10"></i> Efficacité </h3>
                    <p>La communauté <span class="tm1">Con</span><span class="tm2">fiden</span><span class="tm3">ces</span> reste objective par rapport à ce que vous vivez, ne pas être impliquée émotionnellement dans
                        les évènements ou les relations conflictuelles que vous évoquez.&hellip;</p>
                </div>
            </div>

            <div class="col-sm-4 para">
                <div class="center btmspace-50">
                    <h3 class="font-x1 btmspace-30"><i class="fa fa-2x fa-hand-o-up rightspace-10"></i> Objectivité</h3>
                    <p>La communauté <span class="tm1">Con</span><span class="tm2">fiden</span><span class="tm3">ces</span> reste objective par rapport à ce que vous vivez, ne pas être impliquée émotionnellement dans
                        les évènements ou les relations conflictuelles que vous évoquez.&hellip;</p>
                </div>
            </div>


        </div>

    </section>

    <section class="content-section text-center" id="who">
        <div class="who-section">
            <div class="container">
                <h2 class="titaccueil">CONFIDENCES</h2>
                <p class="lead"> Se Confier Pour Se Libérer !</p>
                <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Lire d'avantage</button>
            </div>

            <!-- Modal -->
            <div id="myModal2" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Se confier pour se libérer!</h3>
                        </div>
                        <div class="modal-body">
                            <p class="lead">Ce que vous ne pouvez ni n’osez dire à vos proches ou à votre conjoint, vous pouvez le raconter en tout anonymat sur ce site. Secrets de famille, amours clandestines, problèmes de santé, voire petites lâchetés quotidiennes… des aveux les plus douloureux aux confessions les plus anecdotiques, la verbalisation permet d’alléger un peu sa peine et sa culpabilité.
                                Le plus : se défouler ou se libérer des non-dits, sans se sentir coupable ni craindre de blesser l’un de ses proches. </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="content-section text-center" id="clients" >
        <div class="container">
            <h2> Témoignages Pertinants </h2>
            <p> Ils nous ont fait confiance, ils en parlent !</p>
            <br>
            <div class="row">
                <div class="col-sm-4">
                    <p class="text-center">CERENY KOM</p><br>
                    <a href="#demo" data-toggle="collapse" id="toftem">
                        <img src="{{asset('assets/css/img/1.jpg')}} " class="img-rounded img-responsive" alt="Random Name">
                    </a>
                    <div id="demo" class="collapse">
                        <p>Guitarist and Lead Vocalist</p>
                        <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModal4">Lire d'avantage</button>
                    </div>
                </div>
                <div class="col-sm-4">
                    <p class="text-center">LOIC FONGANG</p><br>
                    <a href="#demo2" data-toggle="collapse">
                        <div class="img-rounded img-responsive"></div>
                    </a>
                    <div id="demo2" class="collapse">
                        <p>Drummer</p>
                        <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModal5">Lire d'avantage</button>
                    </div>
                </div>
                <div class="col-sm-4">
                    <p class="text-center">PERSONNE LAMDA</p><br>
                    <a href="#demo3" data-toggle="collapse">
                        <div class="img-rounded img-responsive"></div>
                    </a>
                    <div id="demo3" class="collapse">
                        <p>Bass player</p>
                        <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModal6">Lire d'avantage</button>
                    </div>
                </div>

            </div>

            <!-- Modal5 -->
            <div id="myModal4" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Confidence a changé ma vie 2</h3>
                        </div>
                        <div class="modal-body">
                            <p class="lead">Confidence a changé ma vie TEM 2</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                    <!-- fin modal5  -->

                    <!-- Modal5 -->
                    <div id="myModal5" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h3 class="modal-title">Confidence a changé ma vie 2</h3>
                                </div>
                                <div class="modal-body">
                                    <p class="lead">Confidence a changé ma vie TEM 2</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section  class="content-section text-center" id="contact">
        <div class="container">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h2>Nous contacter</h2>
                <p>Ouvert a toutes vos  <a href="{{config('admail.admin-mail')}}">questions ou suggestions </a> </p>
                <form action="{{route('contact')}}" method="POST">
                    {{csrf_field()}}

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <input type="text" id="name" name="name" placeholder="Votre nom " class="form-control" required>
                        {!!$errors->first('name' , '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <input type="text" id="mail" name="email" placeholder="Votre email " class="form-control" required>
                        {!!$errors->first('email' , '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group {{$errors->has('msg') ? 'has-error' : ''}}">
                        <textarea name="msg" id="msg" cols="30" rows="10" class="form-control" placeholder="Votre message" required></textarea>
                        {!!$errors->first('msg' , '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group">
                        <input class="form-control btn btn-primary" type="submit" value="Envoyer" >
                    </div>
                </form>

            </div>
            <div class="col-lg-2"></div>
        </div>
    </section>


@endsection
