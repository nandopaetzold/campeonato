@extends('app.template')

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fas fa-home"></i>
                            {{ $championship->name }} - Adicionar time
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('championships.teams.store', $championship->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nome do campeonato</label>
                                        <select name="team_id" id="team_id" class="form-control mb-2">
                                            <option value="" selected>Selecione um opção</option>
                                            @foreach ($teams as $team)
                                           
                                            @if(!in_array($team->id, $championship->teamsinchampionship->pluck('team_id')->toArray()))
                                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Add Time</button>
                                        <a href="{{ route('championships.teams', $championship->id) }}"
                                            class="btn btn-white">Cancelar</a>
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
