@extends('adminlte::page')

@section('title', 'Gestión Paquetes')

@section('content_header')
<!-- <h1 class="m-0 text-dark">Gestión de Paquete</h1> -->
@stop



@section('content')


<div class="card" style="display:none" id="modalCreatePaquete">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">

            <span id="card_title" class="m-0 text-uppercase">
                <b>
                    AGREGAR PAQUETE
                </b>
            </span>


        </div>
    </div>
    <div class="card-body">
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @includeif('partials.errors')

                    <form method="POST" action="{{ route('paquetes.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('paquete.create')

                    </form>


                </div>
            </div>
        </section>
    </div>

</div>



<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title" class="m-0 text-uppercase">
                            <b> {{ __('Gestión de Paquetes') }}</b>
                        </span>

                        <div class="float-right">
                            <button type="button" onclick="showDiv()" class="btn btn-sm btn-success" id="modalCreatePaquete"><i class="fa fa-sm fa-plus"></i>&nbsp; {{ __('Agregar Paquete') }}</button>

                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                @if ($message = Session::get('warning'))
                <div class="alert alert-warning">
                    <p>{{ $message }}</p>
                </div>
                @endif
                @if ($message = Session::get('danger'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">

                    <x-adminlte-datatable id="table1" :heads="$heads" theme="light" striped>
                        @foreach ($paquetes as $index=>$paquete)
                        <tr class="text-uppercase">

                            <td>{{ $index+1 }}</td>
                            <td>{{$paquete->id}}</td>
                            <td>{{$paquete->id_codigo_cliente }} - {{$paquete->cliente->nombre}} {{$paquete->cliente->apellido}} </td>
                            <td>{{$paquete->transportes->name}}</td>
                            <td>{{$paquete->proveedores->nombre}}</td>


                            <td>
                                <form action="{{ route('paquetes.destroy',$paquete->id) }}" method="POST">
                                    <a class="btn btn-sm btn-warning" href="{{ route('paquetes.edit',$paquete->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
            {!! $paquetes->links() !!}
        </div>
    </div>
</div>

<script type="text/javascript">
    
    function showDiv() {
      
        var form = document.getElementById("modalCreatePaquete");
       
        if (form.style.display === "none") {
           
            form.style.display = "block";
           
        } else {
            form.style.display = "none";
        }
    }
   
</script>

@stop