<?php 
require("headerc.php");
require("../conexion/conexion.php");//incluimos nuestra conexion a la bd, y nuestro header de comprador

if ($tipo=='ESTANDAR') {
    header("location:comprasus.php");
}
//index principal para compradores. si al logearnos el tipo de usuario es estándar, lo redijira al documento comprasus.php
//esto con el fin de ahi recrear el index pero sin incluir las funciones de administrador. si es un administrador lo deja seguir con el código de este documento

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- incluimos librerías y estilos css -->
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css" />

    <link rel="stylesheet" type="text/css" href="../css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../img/logo.ico" />

    <title>Panel principal</title>
</head>


<body>

    <div class="container principal">
        <!--Metemos nuestra tabla en un contenedor -->
        <table class="table table-striped table-bordered  display nowrap" cellspacing="0" width="100%"
            id="tabla-comprador">
            <!--Tabla que contendrá y mostrara todos los proveedores oficiales -->
            <thead class="table-dark">
                <!--Todos estos campos son tomados del registro del proveedor -->
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
$consulta="SELECT*FROM altaproveedor WHERE contrasena<>''"; /*la magia del la tabla proveedores oficiales es que me va a buscar con una consulta, todos los proveedores 
que contengan una contrasena o cualquier cadena, mediante <>'' en el campo contrasena de la bd, y todos los que tengan contrasena significaran que son proveedores oficiales*/
$resultado=mysqli_query($con,$consulta);
while($mostrar=mysqli_fetch_array($resultado)){

    ?>

            <tr>
                <!--Ahora que ya me encontro todos los proveedores con contrasena pasamos a mostrar sus columnas mediante el while -->
                <td><?php echo $mostrar['rfc']?></td>
                <td><?php echo $mostrar['empresa']?></td>
                <td><?php echo $mostrar['razon_social']?></td>
                <td><?php echo $mostrar['giro_empresa']?></td>
                <td><?php echo $mostrar['repres_ventas']?></td>
                <td><?php echo $mostrar['tel_repre']?></td>


                <?php echo "<td>";//este es para mandar email al representante de ventas
    echo "<a href='email.php?email_repre=".$mostrar['email_repre']."&repres_ventas=".$mostrar['repres_ventas']."'>".$mostrar['email_repre']."</a>";
    echo "</td>";

?>
                <?php echo "<td>";//este es para mandar email al correo electronico para aviso de deposito que lleno el proveedor al registrarse.
    echo "<a href='correo_avisodeposito.php?correo_aviso=".$mostrar['correo_aviso']."&razon_social=".$mostrar['razon_social']."'>".$mostrar['correo_aviso']."</a>";
    echo "</td>";?>


                <td><?php echo $mostrar['usuarioc']?></td>
                <td><?php echo $mostrar['estatusp']?></td>
                <td><?php echo $mostrar['tipop']?></td>


                <?php echo "<td>";
    echo "<a href='documentacion.php?rfc=".$mostrar['rfc']."'><img title='Ver documentación' src='/compras/img/carpeta.png' width='26px'  alt='Documentacion' </a>";
    echo "<a href='borraproveedor.php?rfc=".$mostrar['rfc']."'><img title='Eliminar proveedor' src='/compras/img/basura.png' width='26px'  alt='Documentacion' </a>";
    echo "<a target='_blank' href='crearpdf.php?rfc=".$mostrar['rfc'] ."'><img title='Generar pdf del proveedor' src='/compras/img/pdf.png' width='26px'  alt='Documentacion' </a>";
    echo "<a href='ajustesalproveedor.php?rfc=".$mostrar['rfc'] ."'><img title='Ajustes al proveedor' src='/compras/img/ajustes.png' width='26px'  alt='Documentacion' </a>";
    echo "</td>";
/*--en estos últimos href, al final le agregamos el icono de nuestra preferencia para cada acción y le pasamos el rfc por GET a ese link mediante el signo ? y se abrirá cuando demos click, de esa forma abriremos un html con las variables del proveedor que deseemos enviar.
mediante el title asignamos la descripción de que hace cada icono y mediante &nbsp; sirve para dar un espaciado y que el icono no quede pegado-*/
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



    <!--incluimos nuestros  JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script src="../js/datatables.min.js"></script>

    <script src="../js/dataTables.responsive.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#tabla-comprador')
    .DataTable({ //estamos haciendo referencia mediante jquery a la tabla con el id tabla-comprador y a esa le asignamos las funciones mas abajo descritas
            responsive: true,
            autowidth: false, //con esto quitamos el auto ajuste que en muchas ocasiones deforma la página


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