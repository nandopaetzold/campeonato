@extends('app.template')

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fas fa-home"></i>
                            Times do campeonato -> {{ $championship->name }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <p> Quantidade max de times: <strong>{{ $championship->max_teams }}</strong> - Quantidade de times
                            cadastrados: <strong>{{ count($championship->teamsinchampionship) }}</strong></p>
                        @if (count($championship->teamsinchampionship) > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($championship->teamsinchampionship as $team)
                                        <tr>
                                            <td>
                                                {{ $team->team->name }}
                                            </td>

                                            <td style="width: 7.5%">
                                                @if ($championship->group_stage == 1)
                                                    <a href="{{ route('championships.teams.destroy', [$championship->id, $team->id]) }}"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                        Remover
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle"></i>
                                Nenhum time cadastrado no campeonato.
                            </div>
                        @endif
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-white me-md-2" href="{{ route('championships') }}" type="button">Voltar</a>
                            @if (count($championship->teamsinchampionship) < 8)
                                <a class="btn btn-primary"
                                    href="{{ route('championships.teams.create', ['id' => $championship->id]) }}"
                                    type="button">Adicionar time</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
