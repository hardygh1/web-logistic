<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <input  type="hidden" name="status" value="1" >
            @include('proveedore.form')
        </div>
    </div>

    <div class="box-footer mt20">
        <button type="submit" class="btn btn-block btn-success">{{ __('GUARDAR') }}</button>
    </div>

</section>

