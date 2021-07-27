<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Estrat-eGov</title>

        <!-- Styles -->
        <link href="{{ asset('css/fondoAnimado.css') }}" rel="stylesheet">

        <!-- JavaScript -->
        <script type="text/javascript" src="{{ asset('js/fondoAnimado.js') }}"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #28A745;
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
                background-color: #ffffff;
                color: #000000;
            }

            .footer {
                text-align: center;
            }

            .title {
                font-size: 22px;
            }

            .subtitle {
                font-size: 16px;
                font-weight: normal;
            }

            .subsubtitle {
                font-size: 20px;
                font-weight: normal;
            }

            .slogantitle {
                font-size: 24px;
            }

            .saludo {
                font-size: 16px;
            }

            .version {
                font-size: 14px;
            }

            .links > a {
                color: #000000;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                /*text-transform: uppercase;*/
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="row">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Menu del aplicativo</a>
                    @else
                        <a href="{{ route('login') }}">.:: Ingreso ::. </a>
                        <a href="{{ route('register') }}">.:: Registro ::.</a>
                    @endauth

                    <br><br>
                </div>
            @endif

            <div class="col-md-12 content">

                <br><br><br>

                <!-- <div id="particles-js"></div> -->

                <div><iframe width="60%" height="400" src="https://www.youtube.com/embed/FVfCXhthgGc?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>

            </div>

            <br>

            <div class="col-md-12 footer">

                <div class="saludo m-b-md">
                    <br>
                    Estimado ciudadan@ bienvenido a nuestra <b>Plataforma de Seguimiento y Control Social</b>  del plan de desarrollo <b>Dosquebradas Empresa de Todos 2020 - 2023</b>
                    <br><br>
                    Hemos dispuesto de esta herramienta web como mecanismo para que conozcas más al detalle nuestra gestión pública, lo que hemos hecho y lo que nos queda por hacer,
                    <br>
                    si es la primera vez que nos visitas, te invitamos a que previamente te <a href="{{ route('register') }}">registres aquí</a> para poder ingresar.
                    <br>
                </div>

                <div class="slogantitle m-b-md">
                    <b>EstrateGov</b> | Gestion pública inteligente
                </div>


                <div>
                    <small class="d-block mb-3">EstrateGov y Estratego &copy; - Ver 1.505 (14.06.2021) - Derechos reservados Genus Group SAS - Colombia 2021</small>
                </div>

                <br><br><center><picture><img class='img-responsive' src="{{ asset('images/logo_genus_group.png') }}" width="160px"></picture></center>

            </div>
        </div>

    </body>
</html>
