<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="form-group col-md-6">
                <label for="cliente_id">Cliente:</label>
                <select name="cliente_id" id="cliente_id" class="form-control">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="id_proveedor">Proveedor:</label>
                <select name="id_proveedor" id="id_proveedor" class="form-control">
                    @foreach($proveedores as $proveedore)
                        <option value="{{ $proveedore->id }}">{{ $proveedore->nombre }}</option>
                    @endforeach
                </select>
            </div>




        </div>

        <div class="row">
            <div class="form-group form-group col-md-6">
                {{ Form::label('tipo_transporte') }}
                {{ Form::text('tipo_transporte', $paquete->tipo_transporte, ['class' => 'form-control' . ($errors->has('tipo_transporte') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Transporte']) }}
                {!! $errors->first('tipo_transporte', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Agregar') }}</button>
    </div>
</div>
