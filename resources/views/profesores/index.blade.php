@extends('layouts.app')

@section('content')
    @include('profesores.includes.modal-agregar-profesor')
    @include('profesores.includes.modal-editar-profesor')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Profesores</div>

                    <div class="panel-body">
                        <button style="margin-bottom: 10px" type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#modal-agregar-profesor">Agregar Profesor
                        </button>

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered dataTable" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>

                                    <th>Nombre</th>

                                    <th>Opciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($profesores as $profesor)
                                    <tr data-id="{{$profesor->id}}">
                                        <td>{{$profesor->nombre}}</td>
                                        <td>
                                            <a class="editar-profesor" href="#">Editar</a>
                                            <a class="eliminar-profesor" href="#">Eliminar</a>
                                        </td>

                                    </tr>
                                @empty
                                    <div class="alert alert-dismissable alert-warning">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <h4>Mensaje del sistema!</h4>
                                        <p>No se encuentran registros.</p>
                                    </div>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/a5734b29083/i18n/Spanish.json"
                }
            });
        });

        $('.editar-profesor').on('click', function (e) {
            e.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            $.ajax({
                type: 'GET',
                url: 'profesor/' + id,
                success: function (data) {
                    console.log(data);
                    $("#modal-editar-nombre").val(data.nombre);
                    $("#modal-editar-id-profesor").val(data.id);

                    $("#modal-editar-profesor").modal('toggle');
                }
            });
        });
        $('#form-editar-profesor').on('submit', function (e) {
            e.preventDefault();
            var id = $("#modal-editar-id-profesor").val();

            $.ajax({
                type: 'PUT',
                url: 'profesor/' + id,
                data: $('#form-editar-profesor').serialize(),
                success: function () {
                    location.reload();
                }
            });
        });
        $('.eliminar-profesor').on('click', function (e) {
            e.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'DELETE',
                url: 'profesor/' + id,
                data: {_token: CSRF_TOKEN},
                success: function (data) {
                    alert('Se elimino correctamente la actividad');
                    location.reload();
                }
            });
        });
    </script>
@endsection