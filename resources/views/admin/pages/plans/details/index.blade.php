@extends('adminlte::page')

@section('title', "Detalhe do plano {$plan->name}")

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

    <h1>Detalhes <a href="{{ route('details.plan.create', $plan->url) }}"><i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <p>Listagem dos detalhes</p>
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th style="width: 150px;">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->name }}</td>
                            <td>
                                <a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
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
