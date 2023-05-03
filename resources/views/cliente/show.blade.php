@extends('layouts.app')

@section('template_title')
    {{ $cliente->name ?? "{{ __('Show') Cliente" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clientes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Identificacion:</strong>
                            {{ $cliente->identificacion }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cliente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $cliente->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $cliente->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Nro Celular:</strong>
                            {{ $cliente->nro_celular }}
                        </div>
                        <div class="form-group">
                            <strong>Nro Casa:</strong>
                            {{ $cliente->nro_casa }}
                        </div>
                        <div class="form-group">
                            <strong>Nro Oficina:</strong>
                            {{ $cliente->nro_oficina }}
                        </div>
                        <div class="form-group">
                            <strong>Id Distrito:</strong>
                            {{ $cliente->id_distrito }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion 1:</strong>
                            {{ $cliente->direccion_1 }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion 2:</strong>
                            {{ $cliente->direccion_2 }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
