<!--  Modal pour ajouter et modifier un utilisateur -->

<div class="modal fade" id="userForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="SubmitUser" enctype="multipart/form-data">
                    {{ csrf_field()}} {{method_field('POST')}}
                    @include('partials._form_user')
                    <div class="form-group">
                        <div class="col-lg-6">
                            <input type="submit" value="Enregistrer" class="btn btn-primary">
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

<!--Tableau des utilisateurs -->

    <a onclick="createUser()" class="btn btn-primary" data-toggle="modal"> Ajouter Un Compte</a>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Comptes</h4>
        </div>
        <div class="panel-body">
            <table id="UserTable" class="table table-striped table-responsive">
                <thead>
                <th>Id</th>
                <th>Pseudo</th>
                <th>email</th>
                <th>Action</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

<!--Fin Tableau des utilisateurs -->

<script>
    var TableauUser = $('#UserTable').DataTable({
        processing : true,
        serverSide : true,
        ajax: "{{route('Utilisateur.api')}}",
        columns: [
            {data :'id', name: 'id' },
            {data :'pseudo', name: 'pseudo' },
            {data :'email', name: 'email' },
            {data :'action', name: 'action' , orderable: false, searchable: false}
        ]
    });

    var action;

    function createUser() {
        $('#userForm').modal('show');
        action = 1;
        $('input[name=_method]').val('POST');
        $('.modal-title').text('Nouveau compte');
        $('#pseudo').val('');
        $('#email').val('');
        $('#password').val('');
        $('#password-confirm').val('');
    }

    function editUser(id) {
        action = 2;
        $('input[name=_method]').val('PUT');
        var  url = "{{url('admin/Utilisateur')}}" + '/' + id + "/edit";
        $.ajax(url)
            .done(function(data) {
                $('#userForm').modal('show');
                $('.modal-title').text('Modifier');
                $('#pseudo').val(data.pseudo);
                $('#email').val(data.email);
                $('#password').val('');
                $('#id').val(data.id);
            })
            .fail(function() {
                swal({
                    title: 'Oops',
                    text: "une erreur s'est produit",
                    type: 'error',
                    timer: '1500'
                });
            })
    }

    $('#SubmitUser').on('submit', function (e) {
        var urldynamique;
        var id;
        e.preventDefault();
        if(action === 1)
            urldynamique = "{{route('Utilisateur.store')}}";
        else {
            id = $('#id').val();
            urldynamique = "{{url('admin/Utilisateur')}}" + '/' + id ;
        }
        var $form = $(this);
        $.post(urldynamique, $form.serializeArray())
            .done(function(data) {
                TableauUser.ajax.reload();
                $('#userForm').modal('hide');
                swal({
                    title: 'Enregistrement reussi !',
                    text: 'Utilisateur enregistrer',
                    type: 'success',
                    timer: '1500'
                });
            })
            .fail(function() {
                $('#userForm').modal('hide');
                swal({
                    title: 'Oops',
                    text: "une erreur s'est produit",
                    type: 'error',
                    timer: '1500'
                });
            })
    });


    function destroyUser(id) {
        var csrf_token = "{{ csrf_token() }}";
        swal({
            title: 'Voulez vous vraiment supprimer ce compte? ',
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#3885d6',
            cancelButtonText: 'Annuller',
            confirmButtonColor: '#d33',
            confirmButtonText : 'Supprimer'
        }).then(function () {
            $.ajax({
                url: "{{url('admin/Utilisateur')}}"  + '/' + id,
                type: "POST",
                data: {'_method' : 'DELETE', '_token': csrf_token}
            }).done(function () {
                TableauUser.ajax.reload();
                swal({
                    title: 'Suppression reussi',
                    text: 'Utilisateur a bien ete supprimer',
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