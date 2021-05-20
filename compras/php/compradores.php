<?php 
require("headerc.php");
require("../conexion/conexion.php");

if ($tipo=='ESTANDAR') {
    header("location:compradoresus.php");
}


/*importamos conexión bd, y el header del comprador. si no hay sesión iniciada mediante el login, entonces nos redirige a logearnos*/
?>


<!DOCTYPE html>
<html lang="es">
<!-- básicamente este documento muestra los compradores que están en la bd. siendo usuarios administradores
por lo cual cargamos librerías y estilos.css-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="shortcut icon" href="../img/logo.ico" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css" />

    <link rel="stylesheet" type="text/css" href="../css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <title>Compradores</title>
</head>


<body>
    <div class="container principal">
        <a href="acomprador.php">Añadir nuevo comprador</a><!-- con este link podemos agregar un nuevo comprador-->
        <div class="tablap">
            <table class="table table-striped table-bordered  display nowrap" cellspacing="0" width="100%"
                id="tabla-comprador">
                <thead class="table-dark">
                    <tr>
                        <td>USUARIO</td>
                        <td>NOMBRE</td>
                        <td>APELLIDO PATERNO</td>
                        <td>APELLIDO MATERNO</td>

                        <td>PRIVILEGIOS</td>
                        <td>OPCIONES</td>

                </thead>
                </tr>
                <?php //muestra solo si la columna tiene algun valor en contrasena
$consulta="SELECT*FROM comprador";
$resultado=mysqli_query($con,$consulta);
while($mostrar=mysqli_fetch_array($resultado)){ //no hay mucha ciencia aquí, solo muestra los compradores de la tabla comprador mediante una tabla html con td

    ?>

                <tr>
                    <td><?php echo $mostrar['usuario']?></td>
                    <td><?php echo $mostrar['nombre']?></td>
                    <td><?php echo $mostrar['apellido1']?></td>
                    <td><?php echo $mostrar['apellido2']?></td>
                    <td><?php echo $mostrar['tipo']?></td>


                    <?php echo "<td>";
    echo "<a href='borrarc.php?usuario=".$mostrar['usuario']."'>&nbsp;<img  title='Eliminar comprador' src='../img/boterojo.png' width='25px'></a>";
   echo "<a href='editarc.php?usuario=".$mostrar['usuario']."'>&nbsp;&nbsp;&nbsp;&nbsp;<img  title='Editar comprador' src='../img/lapiz.png' width='25px'></a>";
    echo "</td>";

?>




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


    <!-- importamos nuestro JavaScript con el documento datatables. donde se a escrito el buscador, el paginador y todo los demás elementos de la tabla y hacerlo responsivo-->
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