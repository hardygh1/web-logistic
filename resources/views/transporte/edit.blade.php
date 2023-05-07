@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Transporte
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Transporte</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('transportes.update', $transporte->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('transporte.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
