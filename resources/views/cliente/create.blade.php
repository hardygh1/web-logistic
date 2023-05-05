@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('template_title')
    {{ __('Create') }} Registrar Cliente
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Cliente</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('clientes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('cliente.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
        // Cuando cambia el select de provincia
        $('#provincia_id').on('change', function() {
            var provinciaId = $(this).val();
            var cantonSelect = $('#canton_id');
            var distritoSelect = $('#distrito_id');

            // Si no hay provincia seleccionada, vaciar los selects de cantón y distrito
            if (!provinciaId) {
                cantonSelect.empty();
                distritoSelect.empty();
                return;
            }

            // Hacer una petición AJAX para obtener los cantones
            $.getJSON(`/ubicaciones/provincia/${provinciaId}/cantones`, function(cantones) {
                // Rellenar el select de cantón
                cantonSelect.empty().append($('<option>', {
                    value: '',
                    text: 'Seleccione un cantón'
                }));
                $.each(cantones, function(cantonId, cantonNombre) {
                    cantonSelect.append($('<option>', {
                        value: cantonId,
                        text: cantonNombre
                    }));
                });

                // Si había un cantón seleccionado previamente, seleccionarlo de nuevo
                var cantonId = $('#canton_id').val();
                if (cantonId) {
                    cantonSelect.val(cantonId).trigger('change');
                }
            });
        });
    });

    </script>
@stop
