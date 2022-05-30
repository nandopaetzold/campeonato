@extends('app.template')

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fas fa-home"></i>
                            Tabelas dos jogos do campeonateo - {{ $championship->name }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <h2> Quartas de finais</h2>
                        <table class="table table-striped list-teams">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>G</th>
                                    <th> </th>
                                    <th>G</th>
                                    <th>Time</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody id="games">
                                @foreach ($championship->games->where('championship_stage', 1) as $game)
                                    <tr>
                                        <td>{{ $game->team->name }}</td>
                                        <td>{{ $game->goals_team_1 }}</td>
                                        <td> x </td>
                                        <td>{{ $game->goals_team_2 }}</td>
                                        <td>{{ $game->team2->name }}</td>
                                        @if ($game->is_finished == 0)
                                            <td style="width: 8%"><a
                                                    href="{{ route('championships.games.edit', ['id' => $championship->id, 'id_game' => $game->id]) }}"
                                                    class="btn btn-primary btn-sm">Add
                                                    info</button></td>
                                        @else
                                            <td>Finalizado</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if ($championship->games->where('championship_stage', 2)->count() >= 1)
                            <h2> Semifinais</h2>
                            <table class="table table-striped list-teams">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>G</th>
                                        <th> </th>
                                        <th>G</th>
                                        <th>Time</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody id="games">
                                    @foreach ($championship->games->where('championship_stage', 2) as $game)
                                        <tr>
                                            <td>{{ $game->team->name }}</td>
                                            <td>{{ $game->goals_team_1 }}</td>
                                            <td> x </td>
                                            <td>{{ $game->goals_team_2 }}</td>
                                            <td>{{ $game->team2->name }}</td>
                                            @if ($game->is_finished == 0)
                                                <td style="width: 8%"><a
                                                        href="{{ route('championships.games.edit', ['id' => $championship->id, 'id_game' => $game->id]) }}"
                                                        class="btn btn-primary btn-sm">Add
                                                        info</button></td>
                                            @else
                                                <td>Finalizado</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        @if ($championship->games->where('championship_stage', 3)->count() >= 1)
                            <h2> Final</h2>
                            <table class="table table-striped list-teams">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>G</th>
                                        <th> </th>
                                        <th>G</th>
                                        <th>Time</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody id="games">
                                    @foreach ($championship->games->where('championship_stage', 3) as $game)
                                        <tr>
                                            <td>{{ $game->team->name }}</td>
                                            <td>{{ $game->goals_team_1 }}</td>
                                            <td> x </td>
                                            <td>{{ $game->goals_team_2 }}</td>
                                            <td>{{ $game->team2->name }}</td>
                                            @if ($game->is_finished == 0)
                                                <td style="width: 8%"><a
                                                        href="{{ route('championships.games.edit', ['id' => $championship->id, 'id_game' => $game->id]) }}"
                                                        class="btn btn-primary btn-sm">Add
                                                        info</button></td>
                                            @else
                                                <td>Finalizado</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <a href="{{route('championships.games', $championship->id)}}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                        Voltar
                    </a>
                </div>
            </div>
        </div>

    </main>
@endsection
