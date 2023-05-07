<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="form-group col-md-6">
                {{ Form::label('nombre') }}
                {{ Form::text('nombre', $proveedore->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                {{ Form::label('Estado') }}
                {{ Form::select('estado', ['Activo' => 'Activo', 'No activo' => 'No activo'], $proveedore->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el estado']) }}
                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>



    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Agregar') }}</button>
        <a href="{{ route('proveedores.index') }}" class="btn btn-secondary" >
            {{ __('Cancelar') }}
          </a>
    </div>
</div>
