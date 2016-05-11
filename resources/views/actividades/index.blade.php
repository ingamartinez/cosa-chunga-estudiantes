@extends('layouts.app')

@section('content')
    @include('actividades.includes.modal-agregar-actividades')
    @include('actividades.includes.modal-editar-actividades')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Actividades</div>

                    <div class="panel-body">
                        <button style="margin-bottom: 10px" type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#modal-agregar-actividad">Agregar Actividad
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
                                @forelse($actividades as $actividad)
                                    <tr data-id="{{$actividad->id}}">
                                        <td>{{$actividad->nombre}}</td>
                                        <td>
                                            <a class="editar-actividad" href="#">Editar</a>
                                            <a class="eliminar-actividad" href="#">Eliminar</a>
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

        $('.editar-actividad').on('click', function (e) {
            e.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            $.ajax({
                type: 'GET',
                url: 'actividad/' + id,
                success: function (data) {
                    console.log(data);
                    $("#modal-editar-nombre").val(data.nombre);
                    $("#modal-editar-id-actividad").val(data.id);

                    $("#modal-editar-actividad").modal('toggle');
                }
            });
        });
        $('#form-editar-actividad').on('submit', function (e) {
            e.preventDefault();
            var id = $("#modal-editar-id-actividad").val();

            $.ajax({
                type: 'PUT',
                url: 'actividad/' + id,
                data: $('#form-editar-actividad').serialize(),
                success: function () {
                    location.reload();
                }
            });
        });
        $('.eliminar-actividad').on('click', function (e) {
            e.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'DELETE',
                url: 'actividad/' + id,
                data: {_token: CSRF_TOKEN},
                success: function (data) {
                    alert('Se elimino correctamente la actividad');
                    location.reload();
                }
            });
        });
    </script>
@endsection