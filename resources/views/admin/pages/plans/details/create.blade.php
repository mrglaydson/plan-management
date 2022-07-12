@extends('adminlte::page')

@section('title', "Detalhe do plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('plans.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('plans.index') }}">Planos</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a>
        </li>

        <li class="breadcrumb-item active">
            <a href="{{ route('details.plan.create', $plan->url) }}">Criar Detalhes</a>
        </li>
    </ol>

    <h1>Adicionar novos detalhes <a href="{{ route('details.plan.create', $plan->url) }}"><i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <p>Listagem dos planos</p>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('details.plan.store', $plan->url) }}" method="POST">
                @include('admin.pages.plans.details._partils.form')
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
