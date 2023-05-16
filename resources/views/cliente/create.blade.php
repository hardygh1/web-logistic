@extends('adminlte::page')

@section('title', 'Easy Box')

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
                    <span class="card-title">
                        <b>
                            {{ __('Crear') }} Cliente
                        </b>
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('clientes.store') }}" role="form" enctype="multipart/form-data">
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
    $("#id_provincia").change(function() {
        var id_provincia = $("#id_provincia").val();

        if (id_provincia != '') {

            $.ajax({
                url: 'https://ubicaciones.paginasweb.cr/provincia/' + id_provincia + '/cantones.json',
                method: 'GET'
            }).then(function(data) {


                $("#id_canton").empty();
                $("#id_distrito").empty();
                calcular_codigo_postal();
                var id_canton = document.getElementById("id_canton");
                var option = document.createElement("option");
                option.text = "Seleccione Canton...";
                id_canton.add(option);
                for (const i in data) {
                    var option = document.createElement("option");
                    option.text = data[i];
                    option.value = i;
                    id_canton.add(option);


                }

            });
        }
    });

    $("#id_canton").change(function() {
        var id_provincia = $("#id_provincia").val();
        var id_canton = $("#id_canton").val();

        if (id_canton != '') {

            $.ajax({
                url: 'https://ubicaciones.paginasweb.cr/provincia/' + id_provincia + '/canton/' + id_canton + '/distritos.json',
                method: 'GET'
            }).then(function(data) {
                $("#id_distrito").empty();
                calcular_codigo_postal();
                var id_distrito = document.getElementById("id_distrito");
                var option = document.createElement("option");
                option.text = "Seleccione Distrito...";
                id_distrito.add(option);
                for (const i in data) {
                    var option = document.createElement("option");
                    option.text = data[i];
                    option.value = i;
                    id_distrito.add(option);
                }

            });
        }
    });

    $("#id_distrito").change(function() {
        calcular_codigo_postal();
    });

    function calcular_codigo_postal() {
        var id_provincia = $("#id_provincia").val() > 0 ? $("#id_provincia").val() : 0;
        var id_canton = $("#id_canton").val() > 0 ? $("#id_canton").val() : 0;
        var id_distrito = $("#id_distrito").val() > 0 ? $("#id_distrito").val() : 0;

        var total = (id_provincia * 10000) + (id_canton * 100) + (id_distrito * 1);
        $('#codigo_postal').val(total);
    }



    document.addEventListener('DOMContentLoaded', function() {
        var identificacionInput = document.querySelector('input[name="identificacion"]');
        var url = identificacionInput.getAttribute('data-url');

        identificacionInput.addEventListener('blur', function() {
            var identificacion = identificacionInput.value;

            fetch(url + '?identificacion=' + encodeURIComponent(identificacion))
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    if (data.valid) {
                        identificacionInput.classList.remove('is-invalid');
                    } else {
                        identificacionInput.classList.add('is-invalid');
                    }
                })
                .catch(function(error) {
                    console.error('Error en la solicitud Ajax:', error);
                });
        });
    });
</script>
<!-- <script>
    $(document).ready(function() {
        // Cuando cambia el select de provincia
        $('#id_provincia').on('change', function() {
            var provinciaId = $(this).val();
            var cantonSelect = $('#id_canton');
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
                var cantonId = $('#id_canton').val();
                if (cantonId) {
                    cantonSelect.val(cantonId).trigger('change');
                }
            });
        });
    });
</script> -->
@stop
