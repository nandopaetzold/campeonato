<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meu Campeonato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    @yield('css')
</head>

<body>
    @include('app.navbar')
    <div class="display-info">
        @if (\Session::has('success'))
            <div class="card bg-success box-info">
                <div class="card-header">
                    <h3 class="card-title">Sucesso</h3>

                   
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p>{!! \Session::get('success') !!}</p>
                </div>
                <!-- /.card-body -->
            </div>
        @endif
        @if ($errors->any())
            <div class="card bg-danger errorBox box-info">
                <div class="card-header">
                    <h3 class="card-title">Erro</h3>

                    
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p>{!! $errors->first() !!}</p>
                </div>
                <!-- /.card-body -->
            </div>
        @endif
        @if (\Session::has('error'))
            <div class="card bg-danger box-info">
                <div class="card-header">
                    <h3 class="card-title">Erro</h3>

                   
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p>{!! \Session::get('error') !!}</p>
                </div>
                <!-- /.card-body -->
            </div>
        @endif
    </div>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>

    @yield('scripts')
</body>

</html>
