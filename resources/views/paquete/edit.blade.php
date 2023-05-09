@extends('adminlte::page')

@section('template_title')
{{ __('Update') }} Paquete
@endsection

@section('content')
<div class="modal fade" role="dialog" tabindex="-1" id="modalReporte">
    <div class="modal-dialog  modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5>&nbsp;REPORTE PAQUETE</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body row">

                <div class="col-md-12" align="center">
                    <b>Número de Recibo</b>
                </div>
                <div class="col-md-12 text-danger text-uppercase" style="font-size: xx-large;" align="center">
                    <b>{{$paquete->id}}</b>
                </div>
                <div class="col-md-12" align="center">
                    <b>¿Qué desea imprimir?</b>
                    <br><br>
                </div>
                <div class="col-md-4" align="center">
                    <a class="btn btn-block btn-sm btn-primary" href="{{ route('reportes.show',$paquete->id).',1' }}"><i class="fa fa-sm fa-file"></i> {{ __('Etiqueta') }}</a>
                </div>
                <div class="col-md-4" align="center">
                    <a class="btn btn-block btn-sm btn-warning" href="{{ route('reportes.show',$paquete->id).',2' }}"><i class="fa fa-sm fa-bookmark"></i> {{ __('Recibo') }}</a>

                </div>
                <div class="col-md-4" align="center">
                    <a class="btn btn-block btn-sm btn-success" href="{{ route('reportes.show',$paquete->id).',3' }}"><i class="fa fa-sm fa-file-pdf"></i> {{ __('Factura') }}</a>
                </div>



            </div>

        </div>
    </div>
</div>

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
                            <b class="text-primary">Código:{{$paquete->id}}</b>&nbsp;
                            <a class="btn btn-sm btn-primary" href="{{ route('paquetes.index') }}"> {{ __('Regresar') }}</a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" id="modalReporte" data-target="#modalReporte"> <em class="fa fa-sm fa-file-pdf"></em>&nbsp;Reporte</button>

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