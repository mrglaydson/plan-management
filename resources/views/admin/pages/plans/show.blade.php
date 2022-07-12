@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <h1>Delhates do plano {{ $plan->name }}</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong>
                    {{ $plan->name }}
                </li>
                <li>
                    <strong>Preço: </strong>
                    R$ {{ number_format($plan->price, 2, ',', '.') }}
                </li>
                <li>
                    <strong>Descrição: </strong>
                    {{ $plan->description }}
                </li>
            </ul>
            <div style="display: flex">
                <a href="{{ route('plans.index') }}" class="btn btn-dark">Voltar</a>         
                <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Remover</button>  
                </form>
            </div>
                
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
