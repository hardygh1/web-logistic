<div class="form-group row">
    <div class="col-sm-5">
        {{ Form::label('tracking') }}
        {{ Form::number('tracking', $paquete->tracking, ['class' => 'form-control' . ($errors->has('tracking') ? ' is-invalid' : ''),'step' => '0.0001','placeholder' => 'tracking']) }}
        {!! $errors->first('tracking', '<div class="invalid-feedback">:message</div>') !!}
    </div>
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
            <option value="{{ $peso->id }}">{{ $peso->abreviatura }}</option>
            @endforeach
        </select>
    </label>

</div>
<div class="form-group row">
    <div class="col-sm-3">
        {{ Form::label('largo') }}
        {{ Form::number('largo', $paquete->largo, ['class' => 'form-control' . ($errors->has('largo') ? ' is-invalid' : ''),'step' => '0.0001','placeholder' => 'largo']) }}
        {!! $errors->first('largo', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-sm-3">
        {{ Form::label('ancho') }}
        {{ Form::number('ancho', $paquete->ancho, ['class' => 'form-control' . ($errors->has('ancho') ? ' is-invalid' : ''),'step' => '0.0001','placeholder' => 'ancho']) }}
        {!! $errors->first('ancho', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-sm-3">
        {{ Form::label('alto') }}
        {{ Form::number('alto', $paquete->alto, ['class' => 'form-control' . ($errors->has('alto') ? ' is-invalid' : ''),'step' => '0.0001','placeholder' => 'alto']) }}
        {!! $errors->first('alto', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <label class="col-sm-3" for="id_tipo_medida"> {{ Form::label('tipo medida') }}
        <select class="form-control" name="id_tipo_medida" id="id_tipo_medida">
            @foreach($tipo_medida as $medida)
            <option value="{{ $medida->id }}">{{ $medida->abreviatura }}</option>
            @endforeach
        </select>
    </label>
</div>

<div class="form-group row">
    <div class="col-sm-8">
        {{ Form::label('Descripción') }}
        <textarea class="form-control" rows="3" name="description" id="description" placeholder="Ingresa una descripción"></textarea>
        <!-- {{ Form::textarea('description', $paquete->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''),'rows'=>'3', 'placeholder' => 'description']) }}
        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!} -->
    </div>
    <div class="col-sm-2">
        {{ Form::label('Cantidad') }}
        <input type="number" step="0.0001" class="form-control" name="cantidad" id="cantidad" />
        <!-- {{ Form::number('cantidad', $paquete->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''),'step' => '0.0001', 'placeholder' => 'cantidad']) }}
        {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!} -->
    </div>
    <div class="col-sm-2">
        {{ Form::label('Precio') }}
        <input type="number" step="0.0001" class="form-control" name="precio" id="precio" />
        <!-- {{ Form::number('precio',$paquete->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''),'step' => '0.0001', 'placeholder' => 'precio']) }}
        {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!} -->
    </div>