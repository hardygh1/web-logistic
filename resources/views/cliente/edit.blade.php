@extends('adminlte::page')

@section('title', 'Easy Box')

@section('template_title')
{{ __('Update') }} Editar Cliente
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Update') }} Cliente</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('clientes.update', $cliente->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
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
    var id_provincia = $("#id_provincia").val();

    if (id_provincia != '') {

        $.ajax({
            url: 'https://ubicaciones.paginasweb.cr/provincia/' + id_provincia + '/cantones.json',
            method: 'GET'
        }).then(function(data) {



            var id_canton = document.getElementById("id_canton");
            var option = document.createElement("option");
            option.text = "Seleccione Canton...";
            id_canton.add(option);
            for (const i in data) {
                var canton = $("#canton").val();
                var option = document.createElement("option");
                option.text = data[i];
                option.value = i;
                if (canton == i) {
                    
                    option.selected = true
                    calcular_codigo_postal_sin_id();

                }
                id_canton.add(option);

            }

        });
    }

    var canton = $("#canton").val();

    if (canton != '') {

        $.ajax({
            url: 'https://ubicaciones.paginasweb.cr/provincia/' + id_provincia + '/canton/' + canton + '/distritos.json',
            method: 'GET'
        }).then(function(data) {
           
            var id_distrito = document.getElementById("id_distrito");
            var option = document.createElement("option");
            option.text = "Seleccione Distrito...";
            id_distrito.add(option);
            for (const i in data) {
                var distrito = $("#distrito").val();
                var option = document.createElement("option");
                option.text = data[i];
                option.value = i;
                if (distrito == i) {
                  
                    option.selected = true
                    calcular_codigo_postal_sin_id();

                }
                id_distrito.add(option);
            }

        });
    }


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
    function calcular_codigo_postal_sin_id() {
        var id_provincia = $("#id_provincia").val() > 0 ? $("#id_provincia").val() : 0;
        var canton = $("#canton").val() > 0 ? $("#canton").val() : 0;
        var distrito = $("#distrito").val() > 0 ? $("#distrito").val() : 0;

        var total = (id_provincia * 10000) + (canton * 100) + (distrito * 1);
        $('#codigo_postal').val(total);
    }
</script>
@stop