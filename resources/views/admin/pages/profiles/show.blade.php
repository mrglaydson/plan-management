@extends('adminlte::page')

@section('title', "Detalhes do perfil {$profile->name}")

@section('content_header')
    <h1>Delhates do Perfil {{ $profile->name }}</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong>
                    {{ $profile->name }}
                </li>
                <li>
                    <strong>Descrição: </strong>
                    {{ $profile->description }}
                </li>
            </ul>
            <div style="display: flex">
                <a href="{{ route('profiles.index') }}" class="btn btn-dark">Voltar</a>         
                <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
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
