@extends('layouts.app')

@section('content')
    @include('notas.includes.modal-agregar-nota')
    @include('notas.includes.modal-editar-nota')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Notas</div>

                    <div class="panel-body">
                        <button style="margin-bottom: 10px" type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#modal-agregar-nota">Agregar Notas
                        </button>

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered dataTable" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>Estudiante</th>
                                    <th>Asignatura</th>
                                    <th>Corte 1</th>
                                    <th>Corte 2</th>
                                    <th>Corte 3</th>
                                    <th>Definitiva</th>

                                    <th>Opciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($notas as $nota)
                                    <tr data-id="{{$nota->id}}">
                                        <td>{{$nota->estudiante->nombre}}</td>
                                        <td>{{$nota->asignatura->nombre}}</td>
                                        <td>{{$nota->corte1}}</td>
                                        <td>{{$nota->corte2}}</td>
                                        <td>{{$nota->corte3}}</td>
                                        <td>{{$nota->definitiva}}</td>
                                        <td>
                                            <a class="editar-nota" href="#">Editar</a>
                                            <a class="eliminar-nota" href="#">Eliminar</a>
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

        $('.editar-nota').on('click', function (e) {
            e.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            $.ajax({
                type: 'GET',
                url: 'nota/' + id,
                success: function (data) {
                    console.log(data);
                    $('select[name="estudiante"]').val(data.estudiantes_id);
                    $('select[name="asignatura"]').val(data.asignaturas_id);
                    $("#modal-editar-corte1").val(data.corte1);
                    $("#modal-editar-corte2").val(data.corte2);
                    $("#modal-editar-corte3").val(data.corte3);

                    $("#modal-editar-id-nota").val(data.id);

                    $("#modal-editar-nota").modal('toggle');
                }
            });
        });
        $('#form-editar-nota').on('submit', function (e) {
            e.preventDefault();
            var id = $("#modal-editar-id-nota").val();

            $.ajax({
                type: 'PUT',
                url: 'nota/' + id,
                data: $('#form-editar-nota').serialize(),
                success: function () {
                    location.reload();
                }
            });
        });
        $('.eliminar-nota').on('click', function (e) {
            e.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'DELETE',
                url: 'nota/' + id,
                data: {_token: CSRF_TOKEN},
                success: function (data) {
                    alert('Se elimino correctamente la nota');
                    location.reload();
                }
            });
        });
    </script>
@endsection