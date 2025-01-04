@extends('adminlte::page')
@section('title', 'Eventos')
@section('content_header')
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Eventos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Eventos</li>
                </ol>
            </div>
        </div>
    </div>
@stop
@section('content')
    @livewire('eventos')
@stop
@section('css')
@stop
@section('js')
@stop
