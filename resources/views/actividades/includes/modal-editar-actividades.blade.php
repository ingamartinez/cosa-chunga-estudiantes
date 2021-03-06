<div class="modal fade" id="modal-editar-actividad" tabindex="-1" role="dialog" aria-labelledby="modal-editar-actividad">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id=modal-editar-actividad">Editar Estudiante</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['route'=>['actividad.destroy',':PACIENTE_ID'],'method'=> 'POST','autocomplete'=>'off' ,'id'=>'form-editar-actividad']) !!}
                <input id="modal-editar-id-actividad" name="id-paciente" type="hidden" value="">

                <div class="form-group">
                    {!! Form::label('nombre','Nombre') !!}
                    {!! Form::text('nombre',null,['class'=>'form-control','id'=>'modal-editar-nombre']) !!}
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Editar Actividad</button>

                {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>