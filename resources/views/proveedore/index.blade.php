@extends('adminlte::page')

@section('title', 'EasyBox Proveedores')

@section('content_header')

@stop

@section('content')

<div class="details" style="display:none">
    <div class="card">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;" >
                <span class="card-title" class="m-0 text-uppercase">
                    <b>{{ __('AGREGAR PROVEEDOR') }}</b>
                </span>
            </div>

        </div>
        <div class="card-body">

            <section class="content container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        @includeif('partials.errors')


                        <form method="POST" action="{{ route('proveedores.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('proveedore.create')

                        </form>
                    </div>
                </div>

            </section>

        </div>
    </div>
</div>




<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">


                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title" class="m-0 text-uppercase">
                            <b>{{ __('Gestión Proveedores') }} </b>
                        </span>

                         <div class="float-right">
                            <!-- <a href="{{ route('proveedores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                              {{ __('Crear un Proveedor') }}
                            </a>-->

                            <button type="button" onclick="$('.details').slideToggle(function(){$('#modalCreateProveedor').html($('.details').is(':visible')?'Cerrar':'Agregar Proveedor');});" class="btn btn-sm btn-success" id="modalCreateProveedor"><i class="fa fa-sm fa-plus"></i>&nbsp; {{ __('Agregar Proveedor') }}</button>


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

                        @foreach ($proveedores as $proveedore)
                        <tr>
                            <td>{{ ++$i }}</td>

                            <td>{{ $proveedore->nombre }}</td>

                            <td>
                                @if($proveedore->estado=='Activo')
                                <label style="color: green;">Activo</label>
                                @else
                                <label style="color: red;">No activo</label>
                                @endif

                            </td>

                            <td>
                                <form action="{{ route('proveedores.destroy',$proveedore->id) }}" method="POST">
                                    <a class="btn btn-sm btn-success" href="{{ route('proveedores.edit',$proveedore->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>

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
            {!! $proveedores->links() !!}
        </div>
    </div>
</div>


@stop
