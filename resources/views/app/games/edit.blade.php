@extends('app.template')

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fas fa-home"></i>
                            {{ $championship->name }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('championships.games.update', ['id' => $championship->id, 'id_game'=> $game->id]) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="goals_team_1">{{$game->team->name}}</label>
                                            <input type="number" min="0" name="goals_team_1" id="goals_team_1" value="{{$game->goals_team_1}}" class="form-control mb-2" required>
                                        </div>
                                        <div class="form-group  col-6">
                                            <label for="goals_team_2">{{$game->team2->name}}</label>
                                            <input type="number" min="0" name="goals_team_2" value="{{$game->goals_team_2}}" id="goals_team_2" class="form-control mb-2" required>
                                        </div>
                                        <div class="form-group  col-6">
                                            <label for="is_finished">O jogo ja foi encerrado?</label>
                                            <input type="checkbox" id="is_finished" name="is_finished" value="1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Salvar Cadastro</button>
                                        <a href="{{route('championships.games.show', $championship->id)}}" class="btn btn-white">voltar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>
@endsection
