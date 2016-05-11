<div class="modal fade" id="modal-editar-estudiante" tabindex="-1" role="dialog" aria-labelledby="modal-editar-estudiante">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id=modal-editar-estudiante">Editar Estudiante</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['route'=>['estudiante.destroy',':PACIENTE_ID'],'method'=> 'POST','autocomplete'=>'off' ,'id'=>'form-editar-estudiante']) !!}
                <input id="modal-editar-id-estudiante" name="id-paciente" type="hidden" value="">
                <div class="form-group">
                    {!! Form::label('codigo','Codigo') !!}
                    {!! Form::text('cod_estudiante',null,['class'=>'form-control','id'=>'modal-editar-cod-estudiante']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('nombre','Nombre') !!}
                    {!! Form::text('nombre',null,['class'=>'form-control','id'=>'modal-editar-nombre']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Semestre','Semestre') !!}
                    {!! Form::text('semestre',null,['class'=>'form-control','id'=>'modal-editar-semestre']) !!}
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Editar Estudiante</button>

                {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>