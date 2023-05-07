@extends('adminlte::page')

@section('title', 'Easy Box')

@section('content_header')
<!-- <h1 class="m-0 text-dark">Gestión de Categorías</h1> -->
@stop



@section('content')


<div class="modal fade" role="dialog" tabindex="-1" id="modalCreateCategoria">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5>&nbsp;AGREGAR CATEGORÍA</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <section class="content container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            @includeif('partials.errors')

                            <form method="POST" action="{{ route('categorias.store') }}" role="form" enctype="multipart/form-data">
                                @csrf

                                @include('categoria.create')

                            </form>


                        </div>
                    </div>
                </section>
            </div>

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
                            <b> {{ __('Gestión de Categorías') }}</b>
                        </span>

                        <div class="float-right">
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" id="modalCreateCategoria" data-target="#modalCreateCategoria"><i class="fa fa-sm fa-plus"></i>&nbsp; {{ __('Agregar Categoría') }}</button>

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
                        @foreach ($categorias as $categoria)
                        <tr>

                            <td>{{++$i}}</td>
                            <td>{{ $categoria->name }}</td>
                            <td>{{ $categoria->description }}</td>
                            <td>
                                @if($categoria->status==1)
                                <label style="color: green;">Activo</label>
                                @else
                                <label style="color: red;">No activo</label>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST">
                                    <a class="btn btn-sm btn-warning" href="{{ route('categorias.edit',$categoria->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>

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
            {!! $categorias->links() !!}
        </div>
    </div>
</div>
@stop