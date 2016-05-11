<div class="modal fade" id="modal-editar-asignatura" tabindex="-1" role="dialog" aria-labelledby="modal-editar-asignatura">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id=modal-editar-asignatura">Editar Asignatura</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['route'=>['asignatura.destroy',':PACIENTE_ID'],'method'=> 'POST','autocomplete'=>'off' ,'id'=>'form-editar-asignatura']) !!}
                <input id="modal-editar-id-asignatura" name="id-paciente" type="hidden" value="">

                <div class="form-group">
                    {!! Form::label('nombre','Nombre') !!}
                    {!! Form::text('nombre',null,['class'=>'form-control','id'=>'modal-editar-nombre']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('semestre-asignatura','Semestre Asignatura') !!}
                    {!! Form::text('semestre_asignatura',null,['class'=>'form-control','id'=>'modal-editar-semestre-asignatura']) !!}
                </div>

                <div class="form-group formCategoria">
                    {!! Form::label('profesor','Profesor') !!}
                    <select class="form-control" name="profesor" id="profesor">
                        @foreach($profesores as $profesor)
                            <option value='{{$profesor->id}}'>{{$profesor->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Editar Asignatura</button>

                {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>