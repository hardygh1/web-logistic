@extends('layouts.app')

@section('template_title')
    {{ $transporte->name ?? "{{ __('Show') Transporte" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Transporte</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('transportes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $transporte->name }}
                        </div>
                        <div class="form-group">
                            <strong>Abreviatura:</strong>
                            {{ $transporte->abreviatura }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $transporte->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
