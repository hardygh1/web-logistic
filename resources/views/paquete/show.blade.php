@extends('adminlte::page')

@section('template_title')
    {{ $paquete->name ?? "{{ __('Show') Paquete" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Paquete</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('paquetes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Id Codigo Cliente:</strong>
                            {{ $paquete->id_codigo_cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Transporte:</strong>
                            {{ $paquete->tipo_transporte }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Proveedor:</strong>
                            {{ $paquete->tipo_proveedor }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
