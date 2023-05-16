@extends('adminlte::page')

@section('template_title')
    {{ __('Update') }} Proveedor
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title">
                                <b>{{ __('Actualizar') }} Proveedores</b>
                            </span>

                            <div class="float-right">
                                <a class="btn btn-sm btn-primary" href="{{ route('proveedores.index') }}"> {{ __('Regresar') }}</a>
                            </div>

                        </div>



                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('proveedores.update', $proveedore->id) }}"  role="form" enctype="multipart/form-data">

                            <input type="hidden" name="estado" value="Activo">

                            {{ method_field('PATCH') }}
                            @csrf

                            @include('proveedore.form')
                            <button type="submit" class="btn btn-block btn-success">{{ __('ACTUALIZAR') }}</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
