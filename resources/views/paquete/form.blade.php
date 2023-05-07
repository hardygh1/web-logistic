<div class="form-group row">
    <label class="col-sm-6" for="name"> {{ Form::label('Cliente') }}
        <select class="form-control form-control-sm" name="id_codigo_cliente" id="id_codigo_cliente">
            @foreach($clientes as $cliente)
            @if (isset($paquete->id_codigo_cliente))
            <option {{ (($paquete->id_codigo_cliente == $cliente->id) ) ? 'selected' : null }} value="{{$cliente->id}}">{{$cliente->id}} - {{$cliente->nombre}} {{$cliente->apellido}}</option>
            @else
            <option value="{{ $cliente->id }}">{{$cliente->id}} - {{$cliente->nombre}} {{$cliente->apellido}}</option>
            @endif
            @endforeach
        </select>
    </label>

    <label class="col-sm-3" for="name"> {{ Form::label('Transporte') }}
        <select class="form-control form-control-sm" name="id_tipo_transporte" id="id_tipo_transporte">
            @foreach($transportes as $transporte)
            @if (isset($paquete->id_tipo_transporte))
            <option {{ (($paquete->id_tipo_transporte == $transporte->id) ) ? 'selected' : null }} value="{{$transporte->id}}">{{$transporte->name}}</option>
            @else
            <option value="{{ $transporte->id }}">{{ $transporte->name }}</option>
            @endif
            @endforeach
        </select>
    </label>
    <label class="col-sm-3" for="name"> {{ Form::label('Proveedor') }}
        <select class="form-control form-control-sm" name="id_proveedor" id="id_proveedor">
            @foreach($proveedores as $proveedor)
            @if (isset($paquete->id_proveedor))
            <option {{ (($paquete->id_proveedor == $proveedor->id) ) ? 'selected' : null }} value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
            @else
            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
            @endif
            @endforeach
        </select>
    </label>



</div>