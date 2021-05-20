<?php
require("headerc.php");
require("../conexion/conexion.php");

$rfc=$_GET['rfc'];
$query="SELECT razon_social FROM altaproveedor where rfc='$rfc'";
$resultado=mysqli_query($con,$query);
while ($mostrar=mysqli_fetch_array($resultado)) {
  $razon=$mostrar['razon_social'];
}

/*hacemos lo mismo de siempre, importamos nuestra conexión a la bd y el header y después con el rfc por GET mostramos su documentación*/
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.ico" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css" />

    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="../css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Documentación de proveedor</title>
</head>

<body>
    <div class="container">
        <br>
        <H2 align="center">DOCUMENTACIÓN DEL PROVEEDOR: <?php echo $rfc;?> </H2>
        <!--Mostramos su rfc y su razón social -->
        <H5 align="center">RAZÓN SOCIAL: <?php echo $razon;?> </H5>

        <table class="table table-striped table-bordered  display nowrap" cellspacing="0" width="100%"
            id="tabla-comprador">
            <!--con estas clases ya predefinidas en el documento datatable.js le decimos que no de espacios entre celdas y que tome todo el 100 del contenedor
        y adicionalmente a esto le decimos que la tabla tendrá el id tabla-comprador, para después usar datatable.js y agregarle todas las propiedades con ajax-->
            <thead class="table-dark">
                <!-- encabezado de tabla con color oscuro, con css hemos modificado este color-->
                <tr>
                    <td>CONSTANCIA DE SITUACIÓN FISCAL</td>
                    <td>ACTA CONSTITUTIVA</td>
                    <td>IDENTIFICACIÓN OFICIAL DEL REPRESENTANTE LEGAL</td>
                    <td>CARTA DE CONDICIONES COMERCIALES</td>
                    <td>LISTA DE PRECIOS</td>
                    <td>COMPROBANTE DE DOMICILIO</td>
                    <td>OPINIÓN DE CUMPLIMIENTO</td>
                    <td>CARATULA BANCARIA</td>
                    <td>ESTADO DE CUENTA</td>
                    <td>EVALUACIÓN DE PROVEEDOR</td>


                </tr>
            </thead>

            <?php


$consulta="SELECT*FROM altaproveedor WHERE rfc='$rfc'";
$resultado=mysqli_query($con,$consulta);
while($mostrar=mysqli_fetch_array($resultado)){//con este while mostramos cada dato del proveedor y juntamos el nombre de sus documentos y su ubicación que se guardaron el la bd
    //esto consiste en crear un <a href="ubicacion">nombre del documento</a> y estos datos se tomaran de la bd que anteriormente guardo la ubicación con php y html
    ?>
            <?php
   $doc1=$mostrar['formato_r2_alta']; 
   $doc2=$mostrar['form_rfc']; 
   $doc3=$mostrar['id_oficial_repre_legal']; 
   $doc4=$mostrar['cart_cond_comerciales']; 
   $doc5=$mostrar['lista_precios']; 
   $doc6=$mostrar['comprobante_domicilio']; 
   $doc7=$mostrar['positiva']; 
   $cuenta=$mostrar['estadocuenta'];
   $fechacd=$mostrar['fecha_subidad'];
   $nuestro_estado=$mostrar['nuestro_estado']; 

$ruta0=$mostrar['ubicacion0'];
$ruta1=$mostrar['ubicacion1'];
$ruta2=$mostrar['ubicacion2'];
$ruta3=$mostrar['ubicacion3'];
$ruta4=$mostrar['ubicacion4'];
$ruta5=$mostrar['ubicacion5'];
$ruta6=$mostrar['ubicacion6'];
$ruta7=$mostrar['ubicacion7'];
$ubnuestro_estado=$mostrar['ubnuestro_estado'];



?>
            <tr>
                <!-- <td>/*  echo $fechacd;*/ </td><-->
                <td><?php echo "<a  href=\"$ruta1\" target=\"_blank\">$doc1</a>";?> </td>
                <td><?php echo "<a  href=\"$ruta2\" target=\"_blank\">$doc2</a>";?> </td>
                <td><?php echo "<a  href=\"$ruta3\" target=\"_blank\">$doc3</a>";?> </td>
                <td><?php echo "<a  href=\"$ruta4\" target=\"_blank\">$doc4</a>";?> </td>
                <td><?php echo "<a  href=\"$ruta5\" target=\"_blank\">$doc5</a>","<a  href='historiallp.php?rfc=".$mostrar['rfc']."'target=\"_blank\">&nbsp;<img title='Historial de lista de precios' src='/compras/img/reloj.png' width='20px'  alt='Actualizar lista de precios' </a>";?>
                </td>
                <td><?php echo "<a  href=\"$ruta6\" target=\"_blank\">$doc6</a>";?> </td>
                <td><?php echo "<a  href=\"$ruta7\" target=\"_blank\">$doc7</a>","<a  href='historialCP.php?rfc=".$mostrar['rfc']."'target=\"_blank\">&nbsp;<img title='Historial de carta de asignación' src='/compras/img/reloj.png' width='20px'  alt='Historial de cumplimiento positiva' </a>";?>
                </td>
                <td><?php echo "<a  href=\"$ruta0\" target=\"_blank\">$cuenta</a>";?> </td>
                <td><?php echo "<a  href=\"$ubnuestro_estado\" target=\"_blank\">$nuestro_estado</a>","<a  href='historial-estadocuenta.php?rfc=".$mostrar['rfc']."'target=\"_blank\">&nbsp;<img title='Historial del estado de cuenta' src='/compras/img/reloj.png' width='20px'  alt='Historial de cumplimiento positiva' </a>";?>
                </td>

                <?php echo "<td>";
    echo "<a href='calificaciones.php?rfc=".$mostrar['rfc'] ."'>&nbsp;<img title='Ver calificaciones asignadas' src='/compras/img/carpetac.png' width='45px'  alt='Documentacion' </a>";
    
    echo "</td>";

//con estos echo mostramos mediante html un icono de carpeta el cual al darle click tomara el rfc mediante el símbolo ? y lo enviara con un href a otra pagina donde deberemos retomar esos datos con $_GET

    ?>

            </tr>
            <?php

}

?>
        </table>







    </div>



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