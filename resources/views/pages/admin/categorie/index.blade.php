@extends('.layouts.app')

@section('content')

    @include('partials._slide')

    <!--  Modal pour ajouter et modifier une categorie -->

    <div class="modal fade" id="categorieForm" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="SubmitCat" enctype="multipart/form-data">
                        {{ csrf_field() }} {{method_field('POST')}}
                        @include('partials._form_categorie')
                        <div class="form-group">
                            <div class="col-lg-6">
                                <input type="submit" id="btnec" value="Enregistrer" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuller</button>
                </div>
            </div>

        </div>
    </div>

    <!--fin -->

        <div class="container">
            <a onclick="createCat()" class="btn btn-primary" data-toggle="modal"> Ajouter Une categorie</a>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4> Liste des Categories</h4>
                </div>
                <div class="panel-body">
                    <table id="Categorie-table" class="table table-striped table-responsive">
                        <thead>
                        <th>Id</th>
                        <th>Libelle categorie</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <script>
        var TableauCategorie = $('#Categorie-table').DataTable({
            processing : true,
            serverSide : true,
            ajax: "{{route('categorie.api')}}",
            columns: [
                {data :'id', name: 'id' },
                {data :'libelle_categorie', name: 'libelle categorie' },
                {data :'action', name: 'action' , orderable: false, searchable: false}
            ]
        });

        var action;

        function createCat() {
            $('#categorieForm').modal('show');
            action = 1;
            $('input[name=_method]').val('POST');
            $('.modal-title').text('Nouvelle categorie');
            $('#categorie').val('');
        }


        function editcat(id) {
            action = 2;
            $('input[name=_method]').val('PUT');
            var  url = "{{url('admin/Categorie')}}" + '/' + id + "/edit";
            $.ajax(url)
                .done(function(data)
                {
                    $('#categorieForm').modal('show');
                    $('.modal-title').text('Modifier');
                    $('#categorie').val(data.libelle_categorie);
                    $('#id').val(id);
                })
                .fail(function()
                {
                    swal({
                        title: 'Oops',
                        text: "une erreur s'est produit",
                        type: 'error',
                        timer: '1500'
                    });
                })
        }


        $('#SubmitCat').on('submit', function (e) {
            var urldynamique;
            var id;
            e.preventDefault();
            if(action === 1 )
                urldynamique = "{{route('Categorie.store')}}";
            else
            if (action === 2){
                id = $('#id').val();
                urldynamique = "{{url('admin/Categorie')}}" + '/' + id ;
            }
            var $form = $(this);
            $.post(urldynamique, $form.serializeArray())
                .done(function(data)
                {
                    TableauCategorie.ajax.reload();
                    $('#categorieForm').modal('hide');
                    swal({
                        title: 'Enregistrement reussi !',
                        text: 'Categorie enregistrer avec succes',
                        type: 'success',
                        timer: '1500'
                    });
                })
                .fail(function()
                {
                    swal({
                        title: 'Oops',
                        text: "une erreur s'est produit",
                        type: 'error',
                        timer: '1500'
                    });
                    $('#categorieForm').modal('hide');
                })
        });

        function destroycat(id) {
            var csrf_token = "{{ csrf_token() }}";
            swal({
                title: 'Voulez vous vraiment supprimer cette categorie?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: 'Annuller',
                confirmButtonColor: '#3885d6',
                confirmButtonText : 'Supprimer'
            }).then(function () {
                $.ajax({
                    url: "{{url('admin/Categorie')}}"  + '/' + id,
                    type: "POST",
                    data: {'_method' : 'DELETE', '_token': csrf_token}
                }).done(function () {
                    TableauCategorie.ajax.reload();
                    swal({
                        title: 'Suppression reussi',
                        text: 'Votre post a bien ete supprimer',
                        type: 'success',
                        timer: '1500'
                    });
                })
                    .fail(function () {
                        swal({
                            title: 'Oops',
                            text: "une erreur s'est produit",
                            type: 'error',
                            timer: '1500'
                        });
                    })
            })

        }
    </script>

@stop