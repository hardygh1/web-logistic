<div class="modal fade" role="dialog" tabindex="-1" id="modalCreateArticulo">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5>&nbsp;AGREGAR ARTÍCULO</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <section class="content container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            @includeif('partials.errors')

                            <form method="POST" action="{{ route('articulos.store') }}" role="form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" id="id" name="id">
                                @include('articulo.create')

                            </form>


                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">

                    <span id="card_title" class="m-0 text-uppercase">
                        <b> {{ __('Gestión de Artículos') }}</b>
                    </span>

                    <div class="float-right">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" id="modalCreateArticulo" data-target="#modalCreateArticulo"><i class="fa fa-sm fa-plus"></i>&nbsp; {{ __('Agregar Artículo') }}</button>

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
                    @foreach ($articulos as $index=>$articulo)
                    <tr>

                        <td>{{$index+1 }}</td>
                        <td> {{$articulo->name}}</td>
                        <td> {{$articulo->description}}<br><small><b>Cantidad:</b> {{$articulo->cantidad}} / <b>Precio:</b> {{$articulo->precio}} </small></td>
                        <td> {{$articulo->peso}} {{$articulo->abreviatura}}</td>
                        <td> {{$articulo->largo}} {{$articulo->abreviatura}} x {{$articulo->ancho}} {{$articulo->abreviatura}} x {{$articulo->alto}} {{$articulo->abreviatura}}</td>

                        <td> {{$articulo->volumen_kilo}}</td>
                        <td> {{$articulo->pies_cubicos}}</td>
                        <td>
                            <form action="{{ route('articulos.destroy',$articulo->id) }}" method="POST">
                                @csrf
                                <a class="btn btn-sm btn-warning" id="modalCreateArticulo" data-toggle="modal" data-target="#modalCreateArticulo" onclick="Update('{{ $articulo->id }}','{{$articulo->id_codigo_categoria}}','{{$articulo->peso}}','{{$articulo->id_tipo_peso}}','{{$articulo->largo}}','{{$articulo->ancho}}','{{$articulo->alto}}','{{$articulo->id_tipo_medida}}','{{$articulo->description}}','{{$articulo->cantidad}}','{{$articulo->precio}}');"><i class="fa fa-fw fa-edit"></i></a>

                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </x-adminlte-datatable>
            </div>
        </div>

    </div>
</div>

@section('js')
<script type="text/javascript">
    Update = function(id, id_codigo_categoria, peso,id_tipo_peso,largo,ancho,alto,id_tipo_medida,description,cantidad,precio) {
        $('#id').val(id);
        $('#id_codigo_categoria').val(id_codigo_categoria);
        $('#peso').val(peso);
        $('#id_tipo_peso').val(id_tipo_peso);
        $('#largo').val(largo);
        $('#ancho').val(ancho);
        $('#alto').val(alto);
        $('#id_tipo_medida').val(id_tipo_medida);
        $('#description').val(description);
        $('#cantidad').val(cantidad);
        $('#precio').val(precio);
       
    };
</script>
@stop