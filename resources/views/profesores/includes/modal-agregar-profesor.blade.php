<div class="modal fade" id="modal-agregar-profesor" tabindex="-1" role="dialog" aria-labelledby="modal-agregar-profesor">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-agregar-profesor">Agregar profesor</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['route'=>'profesor.store','method'=> 'POST','autocomplete'=>'off' ,'id'=>'form-agregar-profesor']) !!}

                <div class="form-group">
                    {!! Form::label('nombre','Nombre') !!}
                    {!! Form::text('nombre',null,['class'=>'form-control','id'=>'nombre']) !!}
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Agregar profesor</button>

                {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>