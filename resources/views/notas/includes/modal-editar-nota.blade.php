<div class="modal fade" id="modal-editar-nota" tabindex="-1" role="dialog" aria-labelledby="modal-editar-nota">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id=modal-editar-nota">Editar Nota</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['route'=>['nota.destroy',':PACIENTE_ID'],'method'=> 'POST','autocomplete'=>'off' ,'id'=>'form-editar-nota']) !!}
                <input id="modal-editar-id-nota" name="id-paciente" type="hidden" value="">

                <div class="form-group formCategoria">
                    {!! Form::label('estudiante','Estudiante') !!}
                    <select class="form-control" name="estudiante" id="estudiante">
                        @foreach($estudiantes as $estudiante)
                            <option value='{{$estudiante->id}}'>{{$estudiante->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group formCategoria">
                    {!! Form::label('asignatura','Asignatura') !!}
                    <select class="form-control" name="asignatura" id="asignatura">
                        @foreach($asignaturas as $asignatura)
                            <option value='{{$asignatura->id}}'>{{$asignatura->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label('corte1','Corte 1') !!}
                    {!! Form::text('corte1',null,['class'=>'form-control','id'=>'modal-editar-corte1']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('corte2','Corte 2') !!}
                    {!! Form::text('corte2',null,['class'=>'form-control','id'=>'modal-editar-corte2']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('corte3','Corte 3') !!}
                    {!! Form::text('corte3',null,['class'=>'form-control','id'=>'modal-editar-corte3']) !!}
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Editar Asignatura</button>

                {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>