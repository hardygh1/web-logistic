<div class="form-group row">
    <label class="col-sm-12" for="name"> {{ Form::label('Nombre') }}
        {{ Form::text('name', $categoria->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre de la categoría']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </label>


    <div class="col-sm-12">
        {{ Form::label('Descripción') }}
        {{ Form::textarea('description', $categoria->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'rows' => 2, 'placeholder' => 'Ingrese una descripción']) }}
        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}

    </div>

</div>