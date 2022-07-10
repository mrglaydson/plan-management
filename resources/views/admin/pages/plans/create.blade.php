@extends('adminlte::page')

@section('title', 'Cadastrar Novo plano')

@section('content_header')
    <h1>Planos</h1>
@stop

@section('content')
    <p>Adicionar planos</p>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" class="form" method="POST">
                @include('admin.pages.plans._partils.form')
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
