<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')
            <input type="hidden" name="id_codigo_paquete" value="{{$paquete->id}}">
            <input type="hidden" name="status" value="1">
            <input type="hidden" name="volumen_kilo" value="1">
            <input type="hidden" name="pies_cubicos" value="1">
            @include('articulo.form')


        </div>
        <div class="box-footer mt20">
            <button type="submit" class="btn btn-block btn-success">{{ __('GUARDAR') }}</button>
        </div>
    </div>

</section>