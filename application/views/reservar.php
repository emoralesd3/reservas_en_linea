<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags --> 

    <!-- Title -->
    <title>Reservas en linea</title>

    <!-- Favicon -->
    <link rel="icon" href="/assets/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="/assets/css/responsive/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/estilos.css">

</head>

<body>

    <div class="container">
        <h1><a href="/">Regresar</a></h1>
        <hr>
        <h2>Complete el siguiente formulario para reservar la habitación.</h2>
        <hr>
        <div class="row">
            <div class="jumbotron">
                <p><?php echo $habitacion->result()[0]->descripcion ?></p>
                <hr>
                <p><span style="font-weight:bold;">Precio entre semana: </span>Q.<?php echo $habitacion->result()[0]->precio_semanal ?>.00</p>
                <p><span style="font-weight:bold;">Precio fin de semana: </span>Q.<?php echo $habitacion->result()[0]->precio_fin_semana ?>.00</p>

            </div>
            <div class="reservation-form-area">
                <form action="/index.php/success" method="post">
                    <input type="hidden" name="id_habitacion" value="<?php echo $habitacion->result()[0]->id ?>">
                    <input type="hidden" name="precio_semanal" value="<?php echo $habitacion->result()[0]->precio_semanal ?>">
                    <input type="hidden" name="precio_fin" value="<?php echo $habitacion->result()[0]->precio_fin_semana ?>">
                    <input type="hidden" name="descripcion" value="<?php echo $habitacion->result()[0]->descripcion ?>">
                    <input type="text" name="nombre" placeholder="Nombre" class="form-control" required>
                    <input type="text" name="apellido" placeholder="Apellido" class="form-control" required>
                    <input type="text" name="dpi" placeholder="DPI" class="form-control" required>
                    <input type="text" name="tel" placeholder="Teléfono" class="form-control" required>
                    <input type="text" name="mail" placeholder="Correo electrónico" class="form-control" required>
                    <input type="text" name="direccion" placeholder="Dirección" class="form-control" required>
                    <div class="input-group">
                        <label for="dia_hospedaje">Día hospedaje:</label>
                        <select name="dia_hospedaje" id="dia_hospedaje" class="form-control" required>
                            <option value="0">Seleccione una opción</option>
                            <option value="1">Lunes</option>
                            <option value="2">Martes</option>
                            <option value="3">Miercoles</option>
                            <option value="4">Jueves</option>
                            <option value="5">Viernes</option>
                            <option value="6">Sábado</option>
                            <option value="7">Domingo</option>
                        </select>
                    </div>
                    <br>
                    <button class="btn btn-success btn-lg btn-block" type="submit">Procesar</button>
                </form>

            </div>
        </div>
    </div>

    <!-- Jquery-2.2.4 js -->
    <script src="/assets/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/assets/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="/assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="/assets/js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="/assets/js/active.js"></script>
</body>