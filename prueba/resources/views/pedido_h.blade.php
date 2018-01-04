<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pedidos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
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
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    PEDIDO
                </div>

                <div class="form">
            <form action="guardar.php" method="POST">
                <label for="Tipo">Tipo: </label>
                <br>
                <select name="Tipo">
                        <option value="Pedido">Pedido</option>
                        <option value="Dictamen">Dictamen</option>
                </select>
                <br>
                <label for="Grupo">Grupo: </label>
                <br>
                <select name="Grupo">
                        <option value="Viveres">Viveres</option>
                        <option value="Almacen">Almacen</option>
                        <option value="Farmacia">Farmacia</option>      
                </select>
                <br>
                <label for="No.Pedido">No. Pedido:</label>
                <br>
                <input type="text" name="NoPedido" placeholder="No. Pedido" required></input>
                <br>
                <br>
                <input type="submit" value="Generar Pedido">
            </form>
        </div>
        <div class="form">
            <form action="prueba.php" method="POST">
                <p>DETALLE PEDIDO</p>
                <label for="CveArt">Clave Articulo: </label>
                <br>
                <select>
                    <option value="0">Seleccion:</option>
                    <?php
                        $mysqli = new mysqli('localhost', 'root', 'root', 'Proyecto');
                        $query = $mysqli -> query ("SELECT Clave as 'clave', Descripcion as 'desc' FROM Articulos");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[0].'">'.$valores[1].'</option>';
                        }
                    ?>
                </select>
                <br>
                <label for="Cantidad">Cantidad: </label>
                <br>
                <input type="text" name="Cantidad" placeholder="Cantidad"></input>
                <br>
                <label for="UnidadMedida">Unidad de Medida: </label>
                <br>
                <input type="text" name="UnidadMedida" placeholder="Unidad de Medida"></input>
                <br>
                <label for="Importe">Importe: </label>
                <br>
                <input type="text" name="Importe" placeholder="Importe"></input>
                <br>
                <br>
                <input type="submit" value="Realizar Pedido">
            </form>
        </div>
            </div>
        </div>
    </body>
</html>
