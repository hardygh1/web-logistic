<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <label for="cliente_id">Cliente:</label>
            <select name="cliente_id" id="cliente_id" class="form-control">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {{ Form::label('tipo_transporte') }}
            {{ Form::text('tipo_transporte', $paquete->tipo_transporte, ['class' => 'form-control' . ($errors->has('tipo_transporte') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Transporte']) }}
            {!! $errors->first('tipo_transporte', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_proveedor') }}
            {{ Form::text('tipo_proveedor', $paquete->tipo_proveedor, ['class' => 'form-control' . ($errors->has('tipo_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Proveedor']) }}
            {!! $errors->first('tipo_proveedor', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Agregar') }}</button>
    </div>
</div>
