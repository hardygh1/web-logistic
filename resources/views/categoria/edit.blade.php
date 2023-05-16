@extends('adminlte::page')

@section('template_title')
{{ __('Update') }} Categoria
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title" class="m-0 text-uppercase">
                            <b> {{ __('Actualizar') }} Categoría</b>
                        </span>

                        <div class="float-right">
                            <a class="btn btn-sm btn-primary" href="{{ route('categorias.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('categorias.update', $categoria->id) }}" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="status" value="1">

                        {{ method_field('PATCH') }}
                        @csrf

                        @include('categoria.form')
                        <button type="submit" class="btn btn-block btn-success">{{ __('ACTUALIZAR') }}</button>
                    </form>

                </div>

            </div>


        </div>

    </div>
</section>
@endsection
