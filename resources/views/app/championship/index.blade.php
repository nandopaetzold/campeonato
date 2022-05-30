@extends('app.template')

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fas fa-home"></i>
                            Gerir Campeonatos
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('championships.store') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    Adicionar Campeonato
                                </a>
                                <h4 class="p-2">Lista de campeonatos</h4>
                                <table class="table table-striped list-championships">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Qtn max de times</th>
                                            <th>Qtn de times</th>
                                            <th> </th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($championships as $championship)
                                            <tr>
                                                <td>{{ $championship->name }}</td>
                                                <td>{{ $championship->max_teams }}</td>
                                                <td>{{count($championship->teamsinchampionship)}}</td>
                                                <td>
                                                    <a href="{{ route('championships.teams', $championship->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                        Equipes
                                                    </a>
                                                    <a href="{{ route('championships.games', $championship->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                        Acompanhar campeonato
                                                    </a>
                                                </td>
                                                <td style="width: 13%">
                                                    <a href="{{ route('championships.edit', $championship->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                        Editar
                                                    </a>
                                                    <a href="{{ route('championships.destroy', $championship->id) }}"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                        Excluir
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
