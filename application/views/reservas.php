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
    
        <br>
        <hr>
        <h1>Resultados</h1>
        <div class="row">
            <?php
                if(count($habitaciones_disponibles) == 0){
            ?>
                <div class="alert alert-info">
                    <p>Información no encontrada con sus parámetros de búsqueda. Intente nuevamente</p>
                </div>
            <?php
                }
                foreach ($habitaciones_disponibles as $key => $value) {

            ?>
                        <div class="col-12 col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <center><h2><?php echo $value['tipo'] ?></h2></center>
                                    <?php echo $value['info'] ?>
                                    <hr>
                                    <br>
                                    <div>
                                        <p style="font-weight:bold;">Precio entre semana:
                                            <?php echo 'Q.'.$value['precio_semanal'] ?>
                                        </p>
                                        <p style="font-weight:bold">Precio fin de semana: 
                                            <?php echo 'Q.'.$value['precio_fin_semana'] ?>
                                        </p>
                                    </div>
                                    <button class="btn btn-success">Reservar</button>
                                </div>
                            </div>
                            <br>
                        </div>
            <?php
                    # code...
                }
            ?>
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