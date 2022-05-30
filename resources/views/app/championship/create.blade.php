@extends('app.template')

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fas fa-home"></i>
                            Gerir Campeonato - Novo Campeonato
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('championships.create') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nome do campeonato</label>
                                        <input type="text" name="name" id="name" class="form-control mb-2" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Salvar Cadastro</button>
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
