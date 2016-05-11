<div class="modal fade" id="modal-agregar-asignatura" tabindex="-1" role="dialog" aria-labelledby="modal-agregar-asignatura">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-agregar-asignatura">Agregar asignatura</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['route'=>'asignatura.store','method'=> 'POST','autocomplete'=>'off' ,'id'=>'form-agregar-asignatura']) !!}

                <div class="form-group">
                    {!! Form::label('nombre','Nombre') !!}
                    {!! Form::text('nombre',null,['class'=>'form-control','id'=>'nombre']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('semestre_asignatura','Semestre Asignatura') !!}
                    {!! Form::text('semestre_asignatura',null,['class'=>'form-control','id'=>'semestre_asignatura']) !!}
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
                <button type="submit" class="btn btn-info">Agregar Asignatura</button>

                {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>