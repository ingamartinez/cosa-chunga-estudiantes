<div class="modal fade" id="modal-editar-seguimiento" tabindex="-1" role="dialog" aria-labelledby="modal-editar-seguimiento">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id=modal-editar-seguimiento">Editar Estudiante</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['route'=>['seguimiento.destroy',':PACIENTE_ID'],'method'=> 'POST','autocomplete'=>'off' ,'id'=>'form-editar-seguimiento']) !!}
                <input id="modal-editar-id-seguimiento" name="id-paciente" type="hidden" value="">

                <div class="form-group formCategoria">
                    {!! Form::label('estudiantes','Estudiantes') !!}
                    <select class="form-control" name="estudiante" id="estudiante">
                        @foreach($estudiantes as $estudiante)
                            <option value='{{$estudiante->id}}'>{{$estudiante->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group formCategoria">
                    {!! Form::label('actividad','Actividades') !!}
                    <select class="form-control" name="actividad" id="actividad">
                        @foreach($actividades as $actividad)
                            <option value='{{$actividad->id}}'>{{$actividad->nombre}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Editar seguimiento</button>

                {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>