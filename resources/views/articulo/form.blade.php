<div class="form-group row">
    <label class="col-sm-8" for="id_codigo_categoria"> {{ Form::label('categoría') }}
        <select class="form-control" name="id_codigo_categoria" id="id_codigo_categoria">
            @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
            @endforeach
        </select>
    </label>
    <div class="col-sm-2">
        {{ Form::label('peso') }}
        {{ Form::number('peso', $paquete->peso, ['class' => 'form-control' . ($errors->has('peso') ? ' is-invalid' : ''), 'placeholder' => 'Peso']) }}
        {!! $errors->first('peso', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <label class="col-sm-2" for="id_tipo_peso"> {{ Form::label('tipo peso') }}
        <select class="form-control" name="id_tipo_peso" id="id_tipo_peso">
            @foreach($tipo_peso as $peso)
            <option value="{{ $peso->id }}">{{ $peso->name }}</option>
            @endforeach
        </select>
    </label>

</div>
<div class="form-group row">
    <div class="col-sm-3">
        {{ Form::label('largo') }}
        {{ Form::number('largo', $paquete->largo, ['class' => 'form-control' . ($errors->has('largo') ? ' is-invalid' : ''), 'placeholder' => 'largo']) }}
        {!! $errors->first('largo', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-sm-3">
        {{ Form::label('ancho') }}
        {{ Form::number('ancho', $paquete->ancho, ['class' => 'form-control' . ($errors->has('ancho') ? ' is-invalid' : ''), 'placeholder' => 'ancho']) }}
        {!! $errors->first('ancho', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-sm-3">
        {{ Form::label('alto') }}
        {{ Form::number('alto', $paquete->alto, ['class' => 'form-control' . ($errors->has('alto') ? ' is-invalid' : ''), 'placeholder' => 'alto']) }}
        {!! $errors->first('alto', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <label class="col-sm-3" for="id_tipo_medida"> {{ Form::label('tipo medida') }}
        <select class="form-control" name="id_tipo_medida" id="id_tipo_medida">
            @foreach($tipo_medida as $medida)
            <option value="{{ $medida->id }}">{{ $medida->name }}</option>
            @endforeach
        </select>
    </label>
</div>

<div class="form-group row">
    <div class="col-sm-8">
        {{ Form::label('Descripción') }}
        {{ Form::textarea('description', $paquete->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''),'rows'=>'3', 'placeholder' => 'description']) }}
        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-sm-2">
        {{ Form::label('Cantidad') }}
        {{ Form::number('cantidad', $paquete->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'cantidad']) }}
        {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-sm-2">
        {{ Form::label('Precio') }}
        {{ Form::number('precio',$paquete->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'precio']) }}
        {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
    </div>