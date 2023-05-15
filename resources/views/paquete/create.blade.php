<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <input type="hidden" name="status" value="1">
            @include('paquete.form')


        </div>
    </div>
    <div class="box-footer mt20">
        <button type="button" onclick="showDiv()" class="btn btn-danger">{{ __('CERRAR') }}</button>

        <button type="submit" class="btn btn-success">{{ __('GUARDAR') }}</button>
    </div>
</section>