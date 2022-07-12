@extends('adminlte::page')

@section('title', "Detalhe do detalhe {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('plans.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('plans.index') }}">Planos</a>
        </li>

        <li class="breadcrumb-item active">
            <a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a>
        </li>

        <li class="breadcrumb-item active">
            <a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a>
        </li>
    </ol>

    <h1>Detalhes do detalhe</h1>
@stop

@section('content')
    <p>Listagem dos detalhes</p>
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong>
                    {{ $detail->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('details.plan.destroy', [$plan->url, $detail->id]) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit">Deletar Detalhe</button>
                <span>{{ $detail->name }} do plano {{ $plan->name }}</span>
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
