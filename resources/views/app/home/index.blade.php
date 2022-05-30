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

                        <h1>Meu campeonato</h1>

                        <p>1- Criar o banco de dados</p>
                        <p>2- Subir os migrate</p>
                        <p>3- Adicionar os time e campeonatos</p>


                        <h4>Como utilizar</h4>

                        <p>Para acompanhar os jogos clique no botão vermelho referente ao campeonato.<br>
                            Ao clicar no botão -> Gerar lista de jogos, é possivel informar os dados dos jogos da rodada ou
                            criar uma rodada nova.<br>
                            No botão Ranking é possivel ver o ranking dos times.<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
