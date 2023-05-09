@extends('adminlte::page')

@section('title', 'Easy Box')

@section('content_header')
    <h1 class="m-0 text-dark">Gestión de Clientes</h1>
@stop



@section('content')



    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Clientes / Lista de Clientes') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                    <div class="card-body">
                            <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>
                                @foreach ($clientes as $cliente)


                                        <tr>

                                            <td>{{ $cliente-> identificacion }}</td>
                                            <td>3000{{ $cliente-> id }}</td>
                                            <td>{{ $cliente-> nombre }}</td>
                                            <td>{{ $cliente-> apellido }}</td>
                                            <td>{{ $cliente-> correo }}</td>

                                            <td>
                                                <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                                                    <!-- <a class="btn btn-sm btn-primary " href="{{ route('clientes.show',$cliente->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a> -->
                                                    <a class="btn btn-sm btn-success" href="{{ route('clientes.edit',$cliente->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
