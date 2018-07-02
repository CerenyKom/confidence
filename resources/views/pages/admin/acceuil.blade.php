@extends('.layouts.app')
@section('content')
    @include('partials._slide')
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="list-group">
                        <a href="#"  class="list-group-item detect1"><i class="fa fa-book">Posts</i></a>
                        <a href="#"  class="list-group-item detect2"><i class="fa fa-users">Comptes</i></a>
                        <a href="#" class="list-group-item detect3"><i class="fa fa-gift">Publicites</i></a>
                        <a href="#" class="list-group-item detect4"><i class="fa fa-history">Historique</i></a>
                        <a href="#" class="list-group-item detect5"><i class="fa fa-list">Categories</i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">

                <div id="baniere-dynamic" class="panel-body">
                    <div class="jumbotron text-center">
                        <h1> {{config('app.name')}} </h1>
                        <p>Tableau de bord administrateur</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function change_contenu(uri) {
            $.ajax({
                type: 'GET',
                url: uri,
                timeout: 3000,
                success: function (data) {
                    $('#baniere-dynamic').html(data);
                },
                error: function () {
                    alert('La requête n\'a pas abouti');
                }
            });
        }

        $('.detect1').on('click', function (e) {
            e.preventDefault();
            change_contenu("{{route('Posts.index')}}");
        });

        $('.detect2').on('click', function (e) {
            e.preventDefault();
            change_contenu("{{route('Utilisateur.index')}}");
        });

    </script>

@stop