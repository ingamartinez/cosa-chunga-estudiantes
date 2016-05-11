<div class="modal fade" id="modal-agregar-seguimiento" tabindex="-1" role="dialog" aria-labelledby="modal-agregar-seguimiento">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-agregar-seguimiento">Agregar seguimiento</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['route'=>'seguimiento.store','method'=> 'POST','autocomplete'=>'off' ,'id'=>'form-agregar-seguimiento']) !!}

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
                <button type="submit" class="btn btn-info">Agregar Actividad</button>

                {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>