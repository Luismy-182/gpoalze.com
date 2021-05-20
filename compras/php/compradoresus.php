<?php 
require("headerc.php");
require("../conexion/conexion.php");
//lo único que podemos decir de aquí, es que es la vista del comprador con rol estandar, por lo demas es casi igual a compradores.php
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.ico" />
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css" />

    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="../css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="../css/estilos.css">


    <title>Compradores</title>
</head>
<!--no puede agregar otros compradores por no ser administrador, pero solo puede ver los demás compradores-->

<body>
    <div class="container principal">

        <h1 align="center">LISTA DE COMPRADORES</h1>
        <table class="table table-striped table-bordered  display nowrap" cellspacing="0" width="100%"
            id="tabla-comprador">
            <thead class="table-dark">

                <a href="editarmidatos.php">Editar mis datos de comprador</a>

                <tr>
                    <td>USUARIO</td>
                    <td>NOMBRE</td>
                    <td>APELLIDO PATERNO</td>
                    <td>APELLIDO MATERNO</td>


            </thead>
            </tr>
            <?php //muestra a los demas compradores mediante una consulta y un while
$consulta="SELECT*FROM comprador";
$resultado=mysqli_query($con,$consulta);
while($mostrar=mysqli_fetch_array($resultado)){

    ?>

            <tr>
                <td><?php echo $mostrar['usuario']?></td>
                <td><?php echo $mostrar['nombre']?></td>
                <td><?php echo $mostrar['apellido1']?></td>
                <td><?php echo $mostrar['apellido2']?></td>









            </tr>
            <?php

}

?>
        </table>
    </div>

    </div>




    <div class="clearfix"></div>

    <?php
require("footer-index.php");
?>

    <!-- JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/dataTables.responsive.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#tabla-comprador').DataTable({
            responsive: true,
            autowidth: false,


            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No existen datos - disculpe",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": 'Buscar',
                "paginate": {
                    "next": 'Siguiente',
                    "previous": 'Anterior'
                }
            }


        });
    });
    </script>


</body>

</html>