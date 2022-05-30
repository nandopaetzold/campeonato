@extends('app.template')

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fas fa-home"></i>
                            Gerir Times
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('teams.store') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    Adicionar Time
                                </a>
                                <h4 class="p-2">Lista de times</h4>
                                <table class="table table-striped list-teams">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Ano de criação</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teams as $team)
                                            <tr>
                                                <td>{{ $team->name }}</td>
                                                <td>{{ $team->year }}</td>
                                                <td style="width: 13%">
                                                    <a href="{{ route('teams.edit', $team->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                        Editar
                                                    </a>
                                                    <a href="{{ route('teams.destroy', $team->id) }}"
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
