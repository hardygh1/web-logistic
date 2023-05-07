@extends('layouts.app')

@section('template_title')
    {{ $tipoMedida->name ?? "{{ __('Show') Tipo Medida" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tipo Medida</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipo-medidas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $tipoMedida->name }}
                        </div>
                        <div class="form-group">
                            <strong>Abreviatura:</strong>
                            {{ $tipoMedida->abreviatura }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $tipoMedida->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
