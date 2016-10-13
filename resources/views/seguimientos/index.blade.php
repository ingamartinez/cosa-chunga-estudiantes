@extends('layouts.app')

@section('content')
    @include('seguimientos.includes.modal-agregar-seguimientos')
    @include('seguimientos.includes.modal-editar-seguimientos')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Seguimientos</div>

                    <div class="panel-body">
                        <button style="margin-bottom: 10px" type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#modal-agregar-seguimiento">Agregar Seguimientos
                        </button>

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered dataTable" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>

                                    <th>Nombre Estudiante</th>
                                    <th>Nombre Actividad</th>
                                    <th>Fecha de seguimiento</th>

                                    <th>Opciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($seguimientos as $seguimiento)
                                    <tr data-id="{{$seguimiento->id}}">
                                        <td>{{$seguimiento->estudiante->nombre}}</td>
                                        <td>{{$seguimiento->actividad->nombre}}</td>
                                        <td>{{$seguimiento->created_at}}</td>
                                        <td>
                                            <a class="editar-seguimiento" href="#">Editar</a>
                                            <a class="eliminar-seguimiento" href="#">Eliminar</a>
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
            var table=$('#example').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/a5734b29083/i18n/Spanish.json"
                }
            });
//            $.ajax({
//                type: 'GET',
//                url: 'seguimiento',
//                success: function (data) {
//                    for (var rowTable in data) {
//                        console.log(data);
//                        table.row.add( [
//                            data[rowTable].estudiantes_nombre,
//                            data[rowTable].actividades_nombre,
//                            data[rowTable].created_at,
//                            '<a class="editar-seguimiento" href="#">Editar</a> '+
//                            '<a class="eliminar-seguimiento" href="#">Eliminar</a>',
//                        ] ).draw().nodes().to$().attr('data-id',data[rowTable].ide);
//                    }
//
//                }
//            });
        });

        $('.editar-seguimiento').on('click', function (e) {
            alert(':v');
            e.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            $.ajax({
                type: 'GET',
                url: 'seguimiento/' + id,
                success: function (data) {
                    console.log(data);
                    $('select[name="estudiante"]').val(data.estudiantes_id);
                    $('select[name="actividad"]').val(data.actividades_id);
                    $("#modal-editar-id-seguimiento").val(data.id);

                    $("#modal-editar-seguimiento").modal('toggle');
                }
            });
        });
        $('#form-editar-seguimiento').on('submit', function (e) {
            e.preventDefault();
            var id = $("#modal-editar-id-seguimiento").val();

            $.ajax({
                type: 'PUT',
                url: 'seguimiento/' + id,
                data: $('#form-editar-seguimiento').serialize(),
                success: function () {
                    location.reload();
                }
            });
        });
        $('.eliminar-seguimiento').on('click', function (e) {
            e.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'DELETE',
                url: 'seguimiento/' + id,
                data: {_token: CSRF_TOKEN},
                success: function (data) {
                    alert('Se elimino correctamente la el seguimiento');
                    location.reload();
                }
            });
        });
    </script>
@endsection