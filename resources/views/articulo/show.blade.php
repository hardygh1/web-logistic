@extends('layouts.app')

@section('template_title')
    {{ $articulo->name ?? "{{ __('Show') Articulo" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Articulo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('articulos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Codigo Paquete:</strong>
                            {{ $articulo->id_codigo_paquete }}
                        </div>
                        <div class="form-group">
                            <strong>Id Codigo Categoria:</strong>
                            {{ $articulo->id_codigo_categoria }}
                        </div>
                        <div class="form-group">
                            <strong>Peso:</strong>
                            {{ $articulo->peso }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tipo Peso:</strong>
                            {{ $articulo->id_tipo_peso }}
                        </div>
                        <div class="form-group">
                            <strong>Largo:</strong>
                            {{ $articulo->largo }}
                        </div>
                        <div class="form-group">
                            <strong>Ancho:</strong>
                            {{ $articulo->ancho }}
                        </div>
                        <div class="form-group">
                            <strong>Alto:</strong>
                            {{ $articulo->alto }}
                        </div>
                        <div class="form-group">
                            <strong>Volumen Kilo:</strong>
                            {{ $articulo->volumen_kilo }}
                        </div>
                        <div class="form-group">
                            <strong>Pies Cubicos:</strong>
                            {{ $articulo->pies_cubicos }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tipo Medida:</strong>
                            {{ $articulo->id_tipo_medida }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $articulo->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $articulo->description }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $articulo->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $articulo->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
