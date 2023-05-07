@extends('layouts.app')

@section('template_title')
    {{ $tipoPeso->name ?? "{{ __('Show') Tipo Peso" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tipo Peso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipo-pesos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $tipoPeso->name }}
                        </div>
                        <div class="form-group">
                            <strong>Abreviatura:</strong>
                            {{ $tipoPeso->abreviatura }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $tipoPeso->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
