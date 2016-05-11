@extends('layouts.app')

@section('content')
    @include('estudiantes.includes.modal-agregar-estudiante')
    @include('estudiantes.includes.modal-editar-estudiante')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Estudiantes</div>

                    <div class="panel-body">
                        <button style="margin-bottom: 10px" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-agregar-estudiante">Agregar Estudiante</button>

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Semestre</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @forelse($estudiantes as $estudiante)
                                        <tr data-id="{{$estudiante->id}}">
                                            <td>{{$estudiante->cod_estudiante}}</td>
                                            <td>{{$estudiante->nombre}}</td>
                                            <td>{{$estudiante->semestre}}</td>
                                            <td>
                                                <a class="editar-estudiante" href="#">Editar</a>
                                                <a class="eliminar-estudiante" href="#">Eliminar</a>
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
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/a5734b29083/i18n/Spanish.json"
            }
        });
    } );

    $('.editar-estudiante').on('click', function (e) {
        e.preventDefault();
        var fila = $(this).parents('tr');
        var id = fila.data('id');
        $.ajax({
            type: 'GET',
            url: 'estudiante/'+id,
            success: function(data){
                console.log(data);
                $("#modal-editar-cod-estudiante").val(data.cod_estudiante);
                $("#modal-editar-nombre").val(data.nombre);
                $("#modal-editar-semestre").val(data.semestre);
                $("#modal-editar-id-estudiante").val(data.id);

                $("#modal-editar-estudiante").modal('toggle');
            }
        });
    });
    $('#form-editar-estudiante').on('submit', function (e) {
        e.preventDefault();
        var id=$("#modal-editar-id-estudiante").val();

        $.ajax({
            type: 'PUT',
            url: 'estudiante/'+id,
            data: $('#form-editar-estudiante').serialize(),
            success: function(){
                location.reload();
            }
        });
    });
    $('.eliminar-estudiante').on('click', function (e) {
        e.preventDefault();
        var fila = $(this).parents('tr');
        var id = fila.data('id');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'DELETE',
            url: 'estudiante/'+id,
            data:{_token:CSRF_TOKEN},
            success: function(data){
                alert('Se elimino correctamente el estudiante');
                location.reload();
            }
        });
    });
</script>
@endsection