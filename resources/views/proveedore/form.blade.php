<div class="form-group row">

    <label class="col-sm-6" for="name">
        {{ Form::label('nombre') }}
        {{ Form::text('nombre', $proveedore->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre de la categoría']) }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
    </label>

    <label class="col-sm-6" for="name">
        {{ Form::label('Estado') }}
        {{ Form::select('estado', ['Activo' => 'Activo', 'No activo' => 'No activo'], $proveedore->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el estado']) }}
        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
    </label>

</div>



