@extends('adminlte::page')

@section('title', 'Atualizar plano')

@section('content_header')
    <h1>Editar plano {{ $plan->name }}</h1>
@stop

@section('content')
    <p>Atualizar planos</p>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plan.update', $plan->url) }}" class="form" method="POST">
                @method('PUT')
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
