<?php 
require("headerc.php");
require("../conexion/conexion.php");
/*esto es el mismo documento de compras.php aquí vienen a parar todos los compradores que son usuarios estandar
por lo cual esto es solo un espejo pero quitando funciones como la de asignar credenciales y borrar proveedores
por lo cual no es necesario volver a comentar todo el código, ya que no hay nada nuevo que no haya en compras.php
*/


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.ico" />

    <!-- cargamos librerías y estilos  CSS -->
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css" />

    <link rel="stylesheet" type="text/css" href="../css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <title>Panel principal</title>
</head>


<body>
    <div class="principal">

        <table class="table table-striped table-bordered  display nowrap" cellspacing="0" width="100%"
            id="tabla-comprador">
            <thead class="table-dark">
                <tr>
                    <td>R.F.C.</td>
                    <td>EMPRESA</td>
                    <td>RAZÓN SOCIAL</td>
                    <td>GIRO</td>
                    <td>REPRESENTANTE DE VENTAS</td>
                    <td>TELÉFONO</td>
                    <td>EMAIL DEL REPRESENTANTE DE VENTAS</td>
                    <td>EMAIL PARA AVISO DE DEPÓSITO</td>
                    <td>COMPRADOR ASIGNADO</td>
                    <td>ESTATUS</td>
                    <td>TIPO</td>
                    <td>OPCIONES</td>

            </thead>
            </tr>
            <?php //muestra solo si la columna tiene algun valor en contrasena
$consulta="SELECT*FROM altaproveedor WHERE contrasena<>'' and usuarioc='$user' ";
$resultado=mysqli_query($con,$consulta);
while($mostrar=mysqli_fetch_array($resultado)){

    ?>

            <tr>
                <td><?php echo $mostrar['rfc']?></td>
                <td><?php echo $mostrar['empresa']?></td>
                <td><?php echo $mostrar['razon_social']?></td>
                <td><?php echo $mostrar['giro_empresa']?></td>
                <td><?php echo $mostrar['repres_ventas']?></td>
                <td><?php echo $mostrar['tel_repre']?></td>


                <?php echo "<td>";
    echo "<a href='email.php?email_repre=".$mostrar['email_repre']."&repres_ventas=".$mostrar['repres_ventas']."'>".$mostrar['email_repre']."</a>";

    echo "</td>";?>
                <?php echo "<td>";
    echo "<a href='correo_avisodeposito.php?correo_aviso=".$mostrar['correo_aviso']."&razon_social=".$mostrar['razon_social']."'>".$mostrar['correo_aviso']."</a>";
    echo "</td>";?>


                <td><?php echo $mostrar['usuarioc']?></td>
                <td><?php echo $mostrar['estatusp']?></td>
                <td><?php echo $mostrar['tipop']?></td>


                <?php echo "<td>";
    echo "<a href='documentacion.php?rfc=".$mostrar['rfc'] ."'><img title='Ver documentación' src='/compras/img/carpeta.png' width='26px'  alt='Documentacion' </a>";
    
    echo "<a target='_blank' href='crearpdf.php?rfc=".$mostrar['rfc'] ."'><img title='Generar pdf' src='/compras/img/pdf.png' width='26px'  alt='Documentacion' </a>";
    echo "<a href='ajustesalproveedorp.php?rfc=".$mostrar['rfc'] ."'><img title='Ajustes al proveedor' src='/compras/img/ajustes.png' width='26px'  alt='Documentacion' </a>";
    echo "</td>";

?>




            </tr>
            <?php

}

?>
        </table>
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