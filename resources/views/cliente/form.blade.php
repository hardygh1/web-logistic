<div class="box box-info padding-1">
    <div class="box-body">



            <div class="form-group">
                {{ Form::label('identificacion') }}
                {{ Form::text('identificacion', $cliente->identificacion, ['class' => 'form-control' . ($errors->has('identificacion') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese su Identificacion']) }}
                {!! $errors->first('identificacion', '<div class="invalid-feedback">:message</div>') !!}
            </div>



        <div class="row">
            <div class="form-group col-md-6">
                {{ Form::label('nombre') }}
                {{ Form::text('nombre', $cliente->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-md-6">
                {{ Form::label('apellido') }}
                {{ Form::text('apellido', $cliente->apellido, ['class' => 'form-control' . ($errors->has('apellido') ? ' is-invalid' : ''), 'placeholder' => 'Apellido']) }}
                {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>


            <div class="form-group">
                {{ Form::label('correo') }}
                {{ Form::text('correo', $cliente->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
                {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
            </div>


        <div class="row">
            <div class="form-group col-md-4">
                {{ Form::label('nro_celular') }}
                {{ Form::text('nro_celular', $cliente->nro_celular, ['class' => 'form-control' . ($errors->has('nro_celular') ? ' is-invalid' : ''), 'placeholder' => 'Nro Celular']) }}
                {!! $errors->first('nro_celular', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('nro_casa') }}
                {{ Form::text('nro_casa', $cliente->nro_casa, ['class' => 'form-control' . ($errors->has('nro_casa') ? ' is-invalid' : ''), 'placeholder' => 'Nro Casa']) }}
                {!! $errors->first('nro_casa', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('nro_oficina') }}
                {{ Form::text('nro_oficina', $cliente->nro_oficina, ['class' => 'form-control' . ($errors->has('nro_oficina') ? ' is-invalid' : ''), 'placeholder' => 'Nro Oficina']) }}
                {!! $errors->first('nro_oficina', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>





        <div class="row">

        <div class="form-group col-md-6">
            {{ Form::label('direccion_1') }}
            {{ Form::text('direccion_1', $cliente->direccion_1, ['class' => 'form-control' . ($errors->has('direccion_1') ? ' is-invalid' : ''), 'placeholder' => 'Direccion 1']) }}
            {!! $errors->first('direccion_1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('direccion_2') }}
            {{ Form::text('direccion_2', $cliente->direccion_2, ['class' => 'form-control' . ($errors->has('direccion_2') ? ' is-invalid' : ''), 'placeholder' => 'Direccion 2']) }}
            {!! $errors->first('direccion_2', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
