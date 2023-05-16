@extends('adminlte::page')

@section('title', 'Easy Box')

@section('content_header')
@stop



@section('content')



    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title" class="m-0 text-uppercase">
                                <b> {{ __('Gestión de Clientes') }}</b>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('clientes.create') }}" class="btn btn-sm btn-success"  data-placement="left">
                                  {{ __('Agregar Cliente') }}
                                </a>
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
                            <x-adminlte-datatable id="table1" :heads="$heads"  theme="light" striped>
                                @foreach ($clientes as $cliente)


                                        <tr class="text-uppercase">

                                            <td>{{ $cliente->identificacion }}</td>
                                            <td>{{ $cliente->id }}</td>
                                            <td>{{ $cliente->nombre }}</td>
                                            <td>{{ $cliente->apellido }}</td>
                                            <td>{{ $cliente->correo }}</td>

                                            <td>
                                                <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                                                    <!-- <a class="btn btn-sm btn-primary " href="{{ route('clientes.show',$cliente->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a> -->
                                                    <a class="btn btn-sm btn-warning" href="{{ route('clientes.edit',$cliente->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $clientes->links() !!}
            </div>
        </div>
    </div>
@stop
