<!DOCTYPE HTML>
<!--
	Directive by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>e-Transs</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    
    {{-- <link rel="stylesheet" href="../Styles/main.css" />
    <link rel="stylesheet" href="../Styles/bootstrap.min.css"> --}}

    <link href="{{ asset('Styles/main.css') }}" rel="stylesheet">
    <link href="{{ asset('Styles/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body class="is-preload">
    <!--Probando, probando, probando, probando. Esto es para el domingo y lo estamos trabajando el sábado en la madrugada -->

    <!-- Prueba 2  -->

    <!-- Header -->
    <div id="header">

        <span>
					<img class="logoH" src="../Images/logo.png" alt=""></span>
        <h1>Bienvenido a E-Transs</h1>
        <p>Adquiere tus boletos de forma rápida, segura y sin complicaciones.</p>
        <br>
        <div class="contenedor-btn">
            @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}" class="btn-acceso">Inicio</a>
            @else
            <a href="{{ route('login') }}"   class="btn-acceso">Iniciar sesión</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn-acceso">Registrarse</a>
                @endif
            @endauth
        </div>
    @endif

        </div>
    </div>

    <!-- Main -->
    <div id="main">

        <header class="major container medium">
            <h2>VIAJA A NUESTROS PRINCIPALES
                <br /> DESTINOS
            </h2>
            <!--
					<p>Tellus erat mauris ipsum fermentum<br />
					etiam vivamus nunc nibh morbi.</p>
					-->
        </header>

        <!-- Inicio del menú de las ciudades principales que sirven de origen para las rutas -->

        <div class="box alt container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="ciudad border ">
                            <div class="titulo">Tegucigalpa</div>
                            <div class="contenedor-icono">
                                <i class="fas fa-bus bus-ciudad"></i>
                            </div>
                            <article class="detalle-ciudad">Partiendo de la ciudad de <br> Tegucigalpa</article>

                            <div class="contenedor-btn-salida">
                                <button class="btn-ver-salidas" data-toggle="modal" data-target="#modalTGU">Ver todas las salidas</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="ciudad border ">
                            <div class="titulo">San Pedro Sula</div>
                            <div class="contenedor-icono">
                                <i class="fas fa-bus bus-ciudad"></i>
                            </div>
                            <article class="detalle-ciudad">Partiendo de la ciudad de <br> San Pedro Sula</article>
                            <div class="contenedor-btn-salida">
                                <button class="btn-ver-salidas" data-toggle="modal" data-target="#modalSPS">Ver todas las salidas</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="ciudad border">
                            <div class="titulo">La Ceiba</div>
                            <div class="contenedor-icono">
                                <i class="fas fa-bus bus-ciudad"></i>
                            </div>
                            <article class="detalle-ciudad">Partiendo de la ciudad de <br> La Ceiba</article>
                            <div class="contenedor-btn-salida">
                                <button class="btn-ver-salidas" data-toggle="modal" data-target="#modalCE">Ver todas las salidas</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="ciudad border ">
                            <div class="titulo">Siguatepeque</div>
                            <div class="contenedor-icono">
                                <i class="fas fa-bus bus-ciudad"></i>
                            </div>
                            <article class="detalle-ciudad">Partiendo de la ciudad de <br> Santa Rosa de Siguatepeque</article>
                            <div class="contenedor-btn-salida">
                                <button class="btn-ver-salidas" data-toggle="modal" data-target="#modalSIG">Ver todas las salidas</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="ciudad border">
                            <div class="titulo">Catacamas</div>
                            <div class="contenedor-icono">
                                <i class="fas fa-bus bus-ciudad"></i>
                            </div>
                            <article class="detalle-ciudad">Partiendo de la ciudad de <br> Catacamas</article>
                            <div class="contenedor-btn-salida">
                                <button class="btn-ver-salidas" data-toggle="modal" data-target="#modalCAT">Ver todas las salidas</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="ciudad border">
                            <div class="titulo">Choluteca</div>
                            <div class="contenedor-icono">
                                <i class="fas fa-bus bus-ciudad"></i>
                            </div>
                            <article class="detalle-ciudad">Partiendo de la ciudad de <br> Choluteca</article>
                            <div class="contenedor-btn-salida">
                                <button class="btn-ver-salidas" data-toggle="modal" data-target="#modalCHO">Ver todas las salidas</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="ciudad border ">
                            <div class="titulo">Lago de Yojoa</div>
                            <div class="contenedor-icono">
                                <i class="fas fa-bus bus-ciudad"></i>
                            </div>
                            <article class="detalle-ciudad">Partiendo del <br> Lago de Yojoa</article>
                            <div class="contenedor-btn-salida">
                                <button class="btn-ver-salidas" data-toggle="modal" data-target="#modalLY">Ver todas las salidas</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="ciudad border">
                            <div class="titulo">Trujillo</div>
                            <div class="contenedor-icono">
                                <i class="fas fa-bus bus-ciudad"></i>
                            </div>
                            <article class="detalle-ciudad">Partiendo de la ciudad de <br> Trujillo</article>
                            <div class="contenedor-btn-salida">
                                <button class="btn-ver-salidas" data-toggle="modal" data-target="#modalTRU">Ver todas las salidas</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="ciudad border">
                            <div class="titulo">Danlí</div>
                            <div class="contenedor-icono">
                                <i class="fas fa-bus bus-ciudad"></i>
                            </div>
                            <article class="detalle-ciudad">Partiendo de la ciudad de <br> Danlí</article>
                            <div class="contenedor-btn-salida">
                                <button class="btn-ver-salidas" data-toggle="modal" data-target="#modalDAN">Ver todas las salidas</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin del menú de las ciudades principales que sirven de origen para las rutas -->



        <footer class="major container medium">
            <h3>Observa, aprende y ejecuta</h3>
            <p>E- Transs te ofrece una manera rápida y efectiva con la que puedes adquirir tus boletos.</p>
            <ul class="actions special">
                <li><a href="#" class="button">Ver vídeo</a></li>
            </ul>
        </footer>

    </div>


    <!-- Modal -->
    <div class="modal fade bd-example-modal-lgl" id="modalTGU" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span> <img class="logoM" src="../Images/logo.png" alt=""></span>
                    <span><h5 class="modal-title " id="exampleModalCenterTitle">Horario disponible</h5></span>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr><b>
                                <th scope="col"> <b>Salida</b></th>
                                <th scope="col"><b>Destino</b></th>
                                <th scope="col"><b>Hora de Salida</b></th>
                                <th scope="col"><b>Tarifa</b></th>
                                </b>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tegucigalpa</td>
                                <td>San Pedro Sula</td>
                                <td>8:00 am y 2:00 pm</td>
                                <td>300 lps</td>
                            </tr>

                            <tr>
                                <td>Tegucigalpa</td>
                                <td>Siguatepeque</td>
                                <td>8:00 am y 2:00 pm</td>
                                <td>100 lps</td>
                            </tr>
                            <tr>
                                <td>Tegucigalpa</td>
                                <td>Lago de Yojoa</td>
                                <td>8:00 am y 2:00 pm</td>
                                <td>180 lps</td>
                            </tr>
                            <tr>
                                <td>Tegucigalpa</td>
                                <td>Choluteca</td>
                                <td>7:00 am y 1:00 pm</td>
                                <td>200 lps</td>
                            </tr>
                            <tr>
                                <td>Tegucigalpa</td>
                                <td>Danli</td>
                                <td>10:00 am y 3:00 pm</td>
                                <td>100 lps</td>
                            </tr>
                            <tr>
                                <td>Tegucigalpa</td>
                                <td>Catacamas</td>
                                <td>9:00 am y 2:00 pm</td>
                                <td>250 lps</td>
                            </tr>
                            <tr>
                                <td>Tegucigalpa</td>
                                <td>Ceiba</td>
                                <td>5:00 am </td>
                                <td>380 lps</td>
                            </tr>
                            <tr>
                                <td>Tegucigalpa</td>
                                <td>Trujillo</td>
                                <td>5:00 am </td>
                                <td>500 lps</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <table class="table table-borderless">
                        <tr>
                            <td class="table-m"><button type="button" class=" btn-m" data-dismiss="modal">Cerrar</button></td>
                            <td class="table-m"><button type="button " class=" btn-m ">Comprar Boleto</button></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="modal fade bd-example-modal-lg" id="modalSPS" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span> <img class="logoM" src="../Images/logo.png" alt=""></span>
                    <span><h5 class="modal-title" id="exampleModalCenterTitle">Horario disponible</h5></span>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr><b>
                                <th scope="col"> <b>Salida</b></th>
                                <th scope="col"><b>Destino</b></th>
                                <th scope="col"><b>Hora de Salida</b></th>
                                <th scope="col"><b>Tarifa</b></th>
                                </b>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>San Pdero Sula</td>
                                <td>Tegucigalpa</td>
                                <td>10:00 am y 3:00 pm</td>
                                <td>300 lps</td>
                            </tr>
                            <tr>
                                <td>San Pedro Sula</td>
                                <td>Siguatepeque</td>
                                <td>10:00 am y 3:00 pm</td>
                                <td>200 lps</td>
                            </tr>
                            <tr>
                                <td>San Pedro Sula</td>
                                <td>Lago de Yojoa</td>
                                <td>10:00 am y 3:00 pm</td>
                                <td>150 lps</td>
                            </tr>
                            <tr>
                                <td>San Pedro Sula</td>
                                <td>Ceiba</td>
                                <td>7:00 am</td>
                                <td>200 lps</td>
                            </tr>
                            <tr>
                                <td>San Pedro Sula</td>
                                <td>Trujillo</td>
                                <td>7:00 am</td>
                                <td>350 lps</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <table class="table table-borderless">
                        <tr>
                            <td class="table-m"><button type="button" class=" btn-m" data-dismiss="modal">Cerrar</button></td>
                            <td class="table-m"><button type="button " class=" btn-m ">Comprar Boleto</button></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="modal fade bd-example-modal-lg" id="modalCE" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span> <img class="logoM" src="../Images/logo.png" alt=""></span>
                    <span><h5 class="modal-title" id="exampleModalCenterTitle">Horario disponible</h5></span>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr><b>
                                <th scope="col"> <b>Salida</b></th>
                                <th scope="col"><b>Destino</b></th>
                                <th scope="col"><b>Hora de Salida</b></th>
                                <th scope="col"><b>Tarifa</b></th>
                                </b>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ceiba</td>
                                <td>Tegucigalpa</td>
                                <td>2:00 pm</td>
                                <td>380 lps</td>
                            </tr>
                            <tr>
                                <td>Ceiba </td>
                                <td>San Pedro Sula</td>
                                <td>11:00 am</td>
                                <td>200 lps</td>
                            </tr>
                            <tr>
                                <td>Ceiba</td>
                                <td>Trujillo</td>
                                <td>10:00 am y 12:00 m</td>
                                <td>150 lps</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <table class="table table-borderless">
                        <tr>
                            <td class="table-m"><button type="button" class=" btn-m" data-dismiss="modal">Cerrar</button></td>
                            <td class="table-m"><button type="button " class=" btn-m ">Comprar Boleto</button></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="modalSIG" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span> <img class="logoM" src="../Images/logo.png" alt=""></span>
                    <span><h5 class="modal-title" id="exampleModalCenterTitle">Horario disponible</h5></span>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr><b>
                                <th scope="col"> <b>Salida</b></th>
                                <th scope="col"><b>Destino</b></th>
                                <th scope="col"><b>Hora de Salida</b></th>
                                <th scope="col"><b>Tarifa</b></th>
                                </b>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Siguatepeque</td>
                                <td>Tegucigalpa</td>
                                <td>1:00 pm y 6:00 pm</td>
                                <td>100 lps</td>
                            </tr>
                            <tr>
                                <td>Siguatepeque</td>
                                <td>San Pedro Sula</td>
                                <td>10:00 am y 4:00 pm</td>
                                <td>200 lps</td>
                            </tr>
                            <tr>
                                <td>Siguatepeque</td>
                                <td>Lago de Yojoa</td>
                                <td>10:00 pm y 4:00 pm</td>
                                <td>100 lps</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <table class="table table-borderless">
                        <tr>
                            <td class="table-m"><button type="button" class=" btn-m" data-dismiss="modal">Cerrar</button></td>
                            <td class="table-m"><button type="button " class=" btn-m ">Comprar Boleto</button></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="modal fade bd-example-modal-lg" id="modalCAT" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span> <img class="logoM" src="../Images/logo.png" alt=""></span>
                    <span><h5 class="modal-title" id="exampleModalCenterTitle">Horario disponible</h5></span>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr><b>
                                <th scope="col"> <b>Salida</b></th>
                                <th scope="col"><b>Destino</b></th>
                                <th scope="col"><b>Hora de Salida</b></th>
                                <th scope="col"><b>Tarifa</b></th>
                                </b>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Catacamas</td>
                                <td>Tegucigalpa</td>
                                <td>10 am</td>
                                <td>250 lps</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <table class="table table-borderless">
                        <tr>
                            <td class="table-m"><button type="button" class=" btn-m" data-dismiss="modal">Cerrar</button></td>
                            <td class="table-m"><button type="button " class=" btn-m ">Comprar Boleto</button></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="modalCHO" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span> <img class="logoM" src="../Images/logo.png" alt=""></span>
                    <span><h5 class="modal-title" id="exampleModalCenterTitle">Horario disponible</h5></span>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr><b>
                                <th scope="col"> <b>Salida</b></th>
                                <th scope="col"><b>Destino</b></th>
                                <th scope="col"><b>Hora de Salida</b></th>
                                <th scope="col"><b>Tarifa</b></th>
                                </b>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Choluteca</td>
                                <td>Tegucigalpa</td>
                                <td>11:00 am</td>
                                <td>200 lps</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <table class="table table-borderless">
                        <tr>
                            <td class="table-m"><button type="button" class=" btn-m" data-dismiss="modal">Cerrar</button></td>
                            <td class="table-m"><button type="button " class=" btn-m ">Comprar Boleto</button></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="modal fade bd-example-modal-lg" id="modalLY" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span> <img class="logoM" src="../Images/logo.png" alt=""></span>
                    <span><h5 class="modal-title" id="exampleModalCenterTitle">Horario disponible</h5></span>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr><b>
                                <th scope="col"> <b>Salida</b></th>
                                <th scope="col"><b>Destino</b></th>
                                <th scope="col"><b>Hora de Salida</b></th>
                                <th scope="col"><b>Tarifa</b></th>
                                </b>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Lago de Yojoa</td>
                                <td>Tegucigalpa</td>
                                <td>12:00 m y 5:00 pm</td>
                                <td>180 lps</td>
                            </tr>
                            <tr>
                                <td>Lago de Yojoa</td>
                                <td>San Pedro Sula</td>
                                <td>11:00 m y 5:00 pm</td>
                                <td>150 lps</td>
                            </tr>
                            <tr>
                                <td>Lago de Yojoa</td>
                                <td>Siguatepeque</td>
                                <td>12:00 m y 5:00 pm</td>
                                <td>100 lps</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <table class="table table-borderless">
                        <tr>
                            <td class="table-m"><button type="button" class=" btn-m" data-dismiss="modal">Cerrar</button></td>
                            <td class="table-m"><button type="button " class=" btn-m ">Comprar Boleto</button></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="modal fade bd-example-modal-lg" id="modalTRU" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span> <img class="logoM" src="../Images/logo.png" alt=""></span>
                    <span><h5 class="modal-title" id="exampleModalCenterTitle">Horario disponible</h5></span>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr><b>
                                <th scope="col"> <b>Salida</b></th>
                                <th scope="col"><b>Destino</b></th>
                                <th scope="col"><b>Hora de Salida</b></th>
                                <th scope="col"><b>Tarifa</b></th>
                                </b>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Trujillo</td>
                                <td>Tegucigalpa</td>
                                <td>11:00 am</td>
                                <td>500 lps</td>
                            </tr>
                            <tr>
                                <td>Trujillo</td>
                                <td>San Pedro Sula</td>
                                <td>8:00 am</td>
                                <td>350 lps</td>
                            </tr>
                            <tr>
                                <td>Trujillo</td>
                                <td>Ceiba</td>
                                <td>8:00 am y 11:00 am</td>
                                <td>500 lps</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <table class="table table-borderless">
                        <tr>
                            <td class="table-m"><button type="button" class=" btn-m" data-dismiss="modal">Cerrar</button></td>
                            <td class="table-m"><button type="button " class=" btn-m ">Comprar Boleto</button></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="modal fade bd-example-modal-lg" id="modalDAN" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span> <img class="logoM" src="../Images/logo.png" alt=""></span>
                    <span><h5 class="modal-title" id="exampleModalCenterTitle">Horario disponible</h5></span>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr><b>
                                <th scope="col"> <b>Salida</b></th>
                                <th scope="col"><b>Destino</b></th>
                                <th scope="col"><b>Hora de Salida</b></th>
                                <th scope="col"><b>Tarifa</b></th>
                                </b>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Danli</td>
                                <td>Tegucigalpa</td>
                                <td>1:00 pm am</td>
                                <td>100 lps</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <table class="table table-borderless">
                        <tr>
                            <td class="table-m"><button type="button" class=" btn-m" data-dismiss="modal">Cerrar</button></td>
                            <td class="table-m"><button type="button " class=" btn-m ">Comprar Boleto</button></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Footer -->
        

 
    <div id="footer">
        <div class="container medium">
        <header class="major last">
                <h2>Contáctanos</h2>
            </header>

            <p>Recuerda que tu cercanía con nuestra plataforma nos hace crecer, puedes enviar tus preguntas o comentarios.</p>
            
            <form method="POST" action="{{route('index')}}  " >
            @csrf
                <div class="row">
                    <div class="col-6 col-12-mobilep">
                        <input  type="text" name="name" placeholder="Nombre" value="{{old('name')}}" />
                        {!! $errors->first('name', '<small style="color:red">:message</small>') !!}
                    </div>
                    <div class="col-6 col-12-mobilep">
                        <input  type="text" name="email" placeholder="Email" value="{{old('email')}}" />
                        {!! $errors->first('email', '<small style="color:red">:message</small>') !!}
                    </div>
                    <div class="col-6 col-12-mobilep" style="display:none">
                        <input  type="text" name="subject" placeholder="Email" value="Contacto-Cliente"  />
                        {!! $errors->first('subject', '<small style="color:red">:message</small>') !!}
                    </div>
                    <div class="col-12">
                        <textarea  name="message" placeholder="Mensaje" rows="6" value="{{old('message')}}"></textarea>
                        {!! $errors->first('message', '<small style="color:red">:message</small>') !!}
                    </div>
                  <div class="col-12">
                        <ul class="actions special">
                            <li><input type="submit" value="Enviar mensaje" id="btn-enviar" /></li>
                        </ul>
                    </div>
                </div>
            </form>

            <ul class="icons">
                <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
                <li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
            </ul>

            <ul class="copyright">
                <li>&copy; E-Transs. Todos los derechos reservados.</li>
            </ul>

        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('Controladores/jquery.min.js') }}"></script>
    <script src="{{ asset('Controladores/browser.min.js') }}"></script>
    <script src="{{ asset('Controladores/breakpoints.min.js') }}"></script>
    <script src="{{ asset('Controladores/util.js') }}"></script>
    <script src="{{ asset('Controladores/main.js') }}"></script>
    <script src="{{ asset('Controladores/bootstrap.min.js') }}"></script>

</body>

</html>
