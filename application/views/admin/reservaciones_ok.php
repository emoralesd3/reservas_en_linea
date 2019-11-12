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
    <link rel="stylesheet" href="/assets/css/bootstrap/dist/css/bootstrap.min.css">
    <link href="/assets/css/responsive/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/estilos.css">
    <link rel="stylesheet" href="/assets/css/font-awesome/css/font-awesbowebower_componentsr_componentsome.min.css">
    <link rel="stylesheet" href="/assets/css/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/js/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

</head>

<body>

    <div class="container">
        <h1><a href="/index.php/admin">Listado de reservaciones</a></h1>
        <a class="btn btn-warning" href="/index.php/admin/cerrar_sesion">Salir</a>
        <hr>
        <h2>Las reservaciones que han realizado los usuarios en el sistema.</h2>
        <hr>
        <div class="row">
            <div class="jumbotron">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tbl_reservacion">
                        <thead>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DPI</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Email</th>
                            <th>Tipo habitación</th>
                            <th>Precio</th>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($reservaciones as $key => $value) {
                            
                            ?>
                            <tr>
                                <td><?php echo $value['nombre']; ?></td>
                                <td><?php echo $value['apellido']; ?></td>
                                <td><?php echo $value['dpi']; ?></td>
                                <td><?php echo $value['telefono']; ?></td>
                                <td><?php echo $value['direccion']; ?></td>
                                <td><?php echo $value['email']; ?></td>
                                <td><?php echo $value['tipo_ha']; ?></td>
                                <td><?php echo $value['precio']; ?></td>
                            </tr>
                            <?php 
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
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

    <script src="/assets/js/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

    <script>
        
        $(document).ready(function(){

            $('#tbl_reservacion').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Información no encontrada",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "search": "Buscar",
                    "processing": "Procesando...",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                    },
                    "buttons": {
                    "colvis": "Mostrar columnas",
                    "print": "Imprimir"
                    }
                },
                "dom": 'Bfrtip',
                "buttons": [
                "colvis", "excel", "csv","pdf"
                ]
            });


            
        })

    </script>
</body>