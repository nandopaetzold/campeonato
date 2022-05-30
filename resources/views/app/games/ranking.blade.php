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

                        <table class="table table-striped list-teams">
                            <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Time</th>
                                    <th>Pontuação</th>
                                    <th>Saldo de Gols</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <?php $i = 1; ?>
                                @foreach ($championship->rank->sortByDesc('points') as $team)
                                    <tr>
                                        <td>#{{ $i++ }}</td>
                                        <td>{{ $team->team->name }}</td>
                                        <td>{{ $team->points }}</td>
                                        <td>{{ $team->goals }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
