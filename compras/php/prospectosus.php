<?php 
require("../conexion/conexion.php");

//tabla de prospecto, vista usuario estándar
/*esto es un espejo de prospectos.php lo único que cambia es que se agrega el apartado opinión de cumplimiento y la 
caratula bancaria, de ahi en fuera lo demás es lo mismo, por lo cual no es necesario volver a documentar el código, si desea saber como funciona el código puede visitar ese archivo*/
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.ico" />
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <title>Prospectos</title>
</head>

<?php
require("headerc.php");

?>

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
                    <td>COSTOS</td>
                    <td>CONTACTO</td>
                    <td>TELÉFONO</td>
                    <td>EMAIL DEL REPRESENTANTE DE VENTAS</td>
                    <td>EMAIL PARA AVISO DE DEPOSITO</td>
                    <td>OPINIÓN DE CUMPLIMIENTO</td>
                    <td>CARATULA BANCARIA</td>
                    <td>OPCIONES</td>

            </thead>
            </tr>
            <?php
$consulta="SELECT*FROM altaproveedor WHERE contrasena='' OR contrasena is null";
$resultado=mysqli_query($con,$consulta);
while($mostrar=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){

    ?>

            <?php

   $doc1=$mostrar['positiva']; 
   $doc2=$mostrar['estadocuenta']; 
$ruta1=$mostrar['ubicacion7'];
$ruta2=$mostrar['ubicacion0'];

?>

            <tr>
                <td><?php echo $mostrar['rfc']?></td>
                <td><?php echo $mostrar['empresa']?></td>
                <td><?php echo $mostrar['razon_social']?></td>
                <td><?php echo $mostrar['giro_empresa']?></td>
                <td><?php echo $mostrar['costos']?></td>
                <td><?php echo $mostrar['repres_ventas']?></td>
                <td><?php echo $mostrar['tel_repre']?></td>
                <?php echo "<td>";
    echo "<a href='email.php?email_repre=".$mostrar['email_repre']."&repres_ventas=".$mostrar['repres_ventas']."'>".$mostrar['email_repre']."</a>";

    echo "</td>";?>
                <?php echo "<td>";
    echo "<a href='correo_avisodeposito.php?correo_aviso=".$mostrar['correo_aviso']."&razon_social=".$mostrar['razon_social']."'>".$mostrar['correo_aviso']."</a>";

    echo "</td>";?>


                <td><?php echo "<a  href=\"$ruta1\" target=\"_blank\">$doc1</a>";?> </td>
                <td><?php echo "<a  href=\"$ruta2\" target=\"_blank\">$doc2</a>";?> </td>

                <?php echo "<td>";
    //Desactivamos esta funcion para el usuario estandar. si se requiere, solo borrar este comentario. */ echo "<a href='credenciales.php?rfc=".$mostrar['rfc'] ."'><img title='Convertir a proveedor oficial' src='/compras/img/agregar-usuario.png' width='20px'  alt='Hacer proveedor oficial' </a>";
    echo "<a href='eliminarprospecto.php?rfc=".$mostrar['rfc'] ."'><img  title='Borrar prospecto' src='/compras/img/basura.png' width='20px'   alt='Eliminar prospecto' </a>";
    echo "<a target='_blank' href='prospectopdf.php?rfc=".$mostrar['rfc'] ."'><img  title='Generar pdf de prospecto' src='/compras/img/pdf.png' width='20px'  alt='Documentacion' </a>";
    echo "</td>";
/*--en estos últimos href, al final le agregamos el icono de nuestra preferencia para cada acción y le pasamos el rfc del usuario por GET a ese link mediante el signo ? y se abrirá cuando demos click, de esa forma abriremos un html con las variables del proveedor que debemos recibir con $_GET.
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

    <!-- Optional JavaScript -->
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
</footer>

</html>