<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Estrat-eGov</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #003366;
                color: #ffffff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 22px;
            }

            .subtitle {
                font-size: 14px;
            }

            .slogantitle {
                font-size: 24px;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Menu del aplicativo</a>
                    @else
                        <a href="{{ route('login') }}">.: Ingreso</a>
                        <a href="{{ route('register') }}">.: Registro</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <br>
                <center><picture><img class='img-responsive' src="{{ asset('images/portada.png') }}" width="300px"></picture></center>

                <div class="title m-b-md">
                    <b>Alcaldia de Dosquebradas</b>
                </div>

                <div class="subtitle m-b-md">
                    Empresa de Todos 2020 - 2023 Planeada | Ordenada | Dinamica
                </div>

                <br><br>

                <div class="slogantitle m-b-md">
                    <b>Estrat-eGov</b> | Gestion pública inteligente
                </div>

                <br><br><hr>

                <div>
                    <small class="d-block mb-3">Estrat-eGov y Estratego &copy; - Derechos reservados Genus Group SAS - Colombia 2020</small>
                </div>

                <br>

                <center><picture><img class='img-responsive' src="{{ asset('images/logo_genus_group.png') }}" width="200px"></picture></center>

            </div>
        </div>

    </body>
</html>
