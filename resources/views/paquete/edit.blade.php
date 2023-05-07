@extends('adminlte::page')

@section('template_title')
{{ __('Update') }} Paquete
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title" class="m-0 text-uppercase">
                            <b> {{ __('Actualizar') }} Paquete</b>

                        </span>


                        <div class="float-right">
                            <b class="text-primary">Código:{{$paquete->id}}</b>
                            &nbsp; <a class="btn btn-sm btn-primary" href="{{ route('paquetes.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('paquetes.update', $paquete->id) }}" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="status" value="1">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('paquete.form')
                        <button type="submit" class="btn btn-block btn-success">{{ __('ACTUALIZAR') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('articulo.index')
@endsection