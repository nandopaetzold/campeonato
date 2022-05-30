@extends('app.template')

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fas fa-home"></i>
                            Home
                        </h4>
                    </div>
                    <div class="card-body">
                        <p>
                            <a href="{{ route('championships.games.create', ['id'=> $championship->id]) }}" class="btn btn-primary" data-toggle="modal"
                                data-target="#createGame">
                                <i class="fas fa-plus"></i>
                                Gerar lista de jogos
                            </a>
                        </p>
                        <p>
                            <a href="{{ route('championships.games.ranking', ['id'=> $championship->id]) }}" class="btn btn-primary" data-toggle="modal"
                                data-target="#createGame">
                                <i class="fas fa-plus"></i>
                               Ranking do campeonato
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
