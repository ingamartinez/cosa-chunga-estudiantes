@extends('layouts.app')

@section('content')
    @include('asignaturas.includes.modal-agregar-asignatura')
    @include('asignaturas.includes.modal-editar-asignatura')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Asignaturas</div>

                    <div class="panel-body">
                        <button style="margin-bottom: 10px" type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#modal-agregar-asignatura">Agregar Asignaturas
                        </button>

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered dataTable" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>

                                    <th>Nombre</th>
                                    <th>Semestre Asignatura</th>
                                    <th>Profesor</th>

                                    <th>Opciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($asignaturas as $asignatura)
                                    <tr data-id="{{$asignatura->id}}">
                                        <td>{{$asignatura->nombre}}</td>
                                        <td>{{$asignatura->semestre_asignatura}}</td>
                                        <td>{{$asignatura->profesor->nombre}}</td>
                                        <td>
                                            <a class="editar-asignatura" href="#">Editar</a>
                                            <a class="eliminar-asignatura" href="#">Eliminar</a>
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

        $('.editar-asignatura').on('click', function (e) {
            e.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            $.ajax({
                type: 'GET',
                url: 'asignatura/' + id,
                success: function (data) {
                    console.log(data);
                    $('select[name="profesor"]').val(data.profesores_id);
                    $("#modal-editar-nombre").val(data.nombre);
                    $("#modal-editar-semestre-asignatura").val(data.semestre_asignatura);
                    $("#modal-editar-id-asignatura").val(data.id);

                    $("#modal-editar-asignatura").modal('toggle');
                }
            });
        });
        $('#form-editar-asignatura').on('submit', function (e) {
            e.preventDefault();
            var id = $("#modal-editar-id-asignatura").val();

            $.ajax({
                type: 'PUT',
                url: 'asignatura/' + id,
                data: $('#form-editar-asignatura').serialize(),
                success: function () {
                    location.reload();
                }
            });
        });
        $('.eliminar-asignatura').on('click', function (e) {
            e.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'DELETE',
                url: 'asignatura/' + id,
                data: {_token: CSRF_TOKEN},
                success: function (data) {
                    alert('Se elimino correctamente la asignatura');
                    location.reload();
                }
            });
        });
    </script>
@endsection