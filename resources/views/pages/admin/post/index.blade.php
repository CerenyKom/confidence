
    <!--  Modal pour ajouter et modifierposticle -->

    <div class="modal fade" id="demo" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="SubmitPost" enctype="multipart/form-data">
                        {{ csrf_field() }} {{method_field('POST')}}
                        @include('partials._form_post')
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
        <a onclick="create()" class="btn btn-primary" data-toggle="modal"> <i class="glyphicon glyphicon-plus"></i> Ajouter Un Post Administrateur</a>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4> Posts</h4>
            </div>
            <div class="panel-body">
                <table id="Post-table" class="table table-striped table-responsive">
                    <thead>
                    <th>Id</th>
                    <th>titre</th>
                    <th>contenue</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>


    <script>

        var MonTableau = $('#Post-table').DataTable({
            processing : true,
            serverSide : true,
            ajax: "{{route('post.api')}}",
            columns: [
                {data :'id', name: 'id' },
                {data :'titre_post', name: 'titre_post' },
                {data :'contenue_post', name: 'contenue_post' },
                {data :'action', name: 'action' , orderable: false, searchable: false}
            ]
        });

        var action;

        function create() {
            $('#demo').modal('show');
            action = 1;
            $('input[name=_method]').val('POST');
            $('.modal-title').text('Ajouter un nounelle article');
            $('#titre').val('');
            $('#contenue').val('');
        }

        function destroy(id) {
            var csrf_token = "{{ csrf_token() }}";
            swal({
                title: 'Voulez vous vraiment supprimer ce post?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#3885d6',
                cancelButtonText: 'Annuller',
                confirmButtonColor: '#d33',
                confirmButtonText : 'Supprimer'
            }).then(function () {
                $.ajax({
                    url: "{{url('admin/Posts')}}"  + '/' + id,
                    type: "POST",
                    data: {'_method' : 'DELETE', '_token': csrf_token}
                }).done(function () {
                    MonTableau.ajax.reload();
                    swal({
                        title: 'Suppression reussi',
                        text: 'Votre article a bien ete supprimer',
                        type: 'success',
                        timer: '1500'
                    });
                    $('#modale-supprimer').modal('hide');
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

        function edit(id) {
            action = 2;
            $('input[name=_method]').val('PUT');
            var  url = "{{url('admin/Posts')}}" + '/' + id + "/edit";
            $.ajax(url)
                .done(function(data)
                {
                    $('#demo').modal('show');
                    $('.modal-title').text('Modifier');
                    $('#titre').val(data.titre_post);
                    $('#contenue').val(data.contenue_post);
                    $('#id').val(data.id);
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


        $('#SubmitPost').on('submit', function (e) {
            var urldynamique;
            var id;
            e.preventDefault();
            if(action === 1 )
                urldynamique = "{{route('Posts.store')}}";
            else
            if (action === 2){
                id = $('#id').val();
                urldynamique = "{{url('admin/Posts')}}" + '/' + id ;
            }
            var form = $(this);
            $.post(urldynamique, form.serializeArray())
                .done(function(data)
                {
                    MonTableau.ajax.reload();
                    $('#demo').modal('hide');
                    swal({
                        title: 'Enregistrement reussi !',
                        text: 'Votre Post a bien ete enregistrer',
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
                })
        });

    </script>

