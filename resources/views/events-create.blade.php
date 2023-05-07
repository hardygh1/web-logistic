@extends('adminlte::page')

@section('title', 'Easy Box')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Evento</h1>
@stop

@section('content')

<div>
    <div class="row">
        <x-adminlte-input name="name" label="Nombre" placeholder="Ingrese el nombre"
            fgroup-class="col-md-6" />
    </div>

    <div class="row">
        <x-adminlte-textarea name="description" label="Descripcion" placeholder="Descripcion del evento" fgroup-class="col-md-6" >
        </x-adminlte-textarea>
    </div>

    <div class="row">
        <x-adminlte-select name="status" label="Estado" fgroup-class="col-md-6">
            <option>--Seleccione</option>
            <option>Borrador</option>
            <option>Publicado</option>
        </x-adminlte-select>
    </div>

    <div class="row">
        <x-adminlte-select2 name="type" label="Tipo" data-placeholder="Seleccione" fgroup-class="col-md-6">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="fas fa-building"></i>
                </div>
            </x-slot>

            <option>Concierto</option>
            <option>Fútbol</option>
            <option>Teatro</option>
</x-adminlte-select2>
    </div>

    <div class="row">
        @php
$config = ['format' => 'YYYY-MM-DD'];
@endphp
<x-adminlte-input-date name="date" :config="$config" placeholder="Seleccionar Fecha" fgroup-class="col-md-6">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info">
            <i class="fas fa-clock"></i>
        </div>
    </x-slot>
</x-adminlte-input-date>
    </div>

    <div class="row">
        <div fgroup-class="col-md-6">
            <x-adminlte-button label="Registrar" theme="primary" icon="fas fa-save"/>
        </div>

    </div>
</div>

@stop
