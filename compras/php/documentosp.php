<?php 
require("headerp.php");
require("../conexion/conexion.php"); //importamos conexión y header proveedor
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../css/fontawesome/css/all.css">
              <link rel="shortcut icon" href="../img/logo.ico"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/footable.bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <!--cargamos librerías, se a elaborado un documento llamado footable donde se tienen todas las clases y variables para hacer responsiva y comprimir el ancho de la tabla, favor de no tocar nada de ahi -->
    <title>Mis documentos</title>
</head>
<body>
    <div class="principal">
<table class="table table-striped table-hover"> 
<thead class="color-tabla">
<tr>
<td><h6>CONSTANCIA DE SITUACIÓN FISCAL</h6></td>
<td><h6>ACTA CONSTITUTIVA</h6></td><!--si no hay data-breakpoints=" "  significa que siempre se mostrara sin importar que sea pantalla pequeña o grande-->
<td data-breakpoints="xs"><h6>IDENTIFICACIÓN OFICIAL DEL REPRESENTANTE LEGAL</h6></td> <!-- data breakpoint sirve para indicarle a footable.js asta donde se encojera la tabla en pantallas pequeñas.-->
<td data-breakpoints="xs"><h6>CARTA DE CONDICIONES COMERCIALES</h6></td><!--xs significa extra small, pantallas pequeñas por lo cual apartir de pantallas xs se comenzara a mostrar-->
<td data-breakpoints="xs sm"><h6>LISTA DE PRECIOS</h6></td><!--en pantallas xs y sm se comenzara a mostrar los demás apartados de la tabla, sm significa small middle pantallas un poco mas grandes-->
<td data-breakpoints="xs sm"><h6>COMPROBANTE DE DOMICILIO</h6></td>
<td data-breakpoints="xs sm"><h6>CARTA DE OPINIÓN DE CUMPLIMIENTO, CALIFICACIÓN POSITIVA</h6></td>
<td data-breakpoints="xs sm"><h6>CARATULA BANCARIA</h6></td>
<td data-breakpoints="xs sm"><h6>ESTADO DE CUENTA</h6></td>
<td data-breakpoints="xs sm"><h6>EVALUACIÓN DE PROVEEDOR</h6></td>

</tr>
</thead>

<?php


$consulta="SELECT*FROM altaproveedor WHERE rfc='$rfc'";//hacemos una consulta y mediante un while mostraremos toda la consulta para después jalar el nombre de los archivos y su ubicación de cada uno.
$resultado=mysqli_query($con,$consulta);
while($mostrar=mysqli_fetch_array($resultado)){
    ?>
    
    <?php 
    /*Tenemos el nombre del archivo y la ubicación del archivo guardado en la bd, de cuando se cargo el documento por $_FILES de php y el formulario encletype de html
     lo que queremos hacer es traer el nombre y la ubicación del archivo y mostrarlo mediante un a href
      para abrirlo en una nueva pestaña los documentos o descargarlos*/
    //en este caso deseamos mostrar el nombre del documento pdf o excel y mediante un a href de html tomaremos la ubicacion de dicho archivo con el apartado href
   $doc1=$mostrar['formato_r2_alta']; 
   $doc2=$mostrar['form_rfc']; 
   $doc3=$mostrar['id_oficial_repre_legal']; 
   $doc4=$mostrar['cart_cond_comerciales']; 
   $doc5=$mostrar['lista_precios']; 
   $doc6=$mostrar['comprobante_domicilio']; //nombre del link a href <a href="y aquí su ubicación del documento ">'aquí iría el nombre con su extension de archivo'<a>
   $doc7=$mostrar['positiva']; 
   $doc0=$mostrar['estadocuenta'];
   $doc8=$mostrar['nuestro_estado'];
   $fechacd=$mostrar['fecha_subidad'];


$ruta1=$mostrar['ubicacion1'];
$ruta2=$mostrar['ubicacion2'];
$ruta3=$mostrar['ubicacion3'];//estas son las ubicaciones para cada documento que se guardo en la bd
$ruta4=$mostrar['ubicacion4'];
$ruta5=$mostrar['ubicacion5'];
$ruta6=$mostrar['ubicacion6'];
$ruta7=$mostrar['ubicacion7'];
$ruta8=$mostrar['ubnuestro_estado'];
$ruta0=$mostrar['ubicacion0'];

?>
    <tr>
      
    <td><?php echo "<a  href=\"$ruta1\" target=\"_blank\">$doc1</a>";?> </td><!--aquí ya solo juntamos tod en el a href -->
    <td><?php echo "<a  href=\"$ruta2\" target=\"_blank\">$doc2</a>";?> </td><!-- los \ sirven para escaparar las comillas y que php no marque error"-->
    <td><?php echo "<a  href=\"$ruta3\" target=\"_blank\">$doc3</a>";?> </td>
    <td><?php echo "<a  href=\"$ruta4\" target=\"_blank\">$doc4</a>";?> </td>
    <td><?php echo "<a  href=\"$ruta5\" target=\"_blank\">$doc5</a>","<a  href='actualizarlp.php?rfc=".$mostrar['rfc'] ."'>&nbsp;<img title='Actualizar lista de precios' src='/compras/img/editar.png' width='20px'  alt='Actualizar lista de precios' </a>";;?> </td>
    <td><?php echo "<a  href=\"$ruta6\" target=\"_blank\">$doc6</a>";?> </td>
    <td><?php echo "<a  href=\"$ruta7\" target=\"_blank\">$doc7</a>","<a href='actualizarcp.php?rfc=".$mostrar['rfc'] ."'>&nbsp;<img  title='Actualizar carta de cumplimiento' src='/compras/img/editar.png' width='20px'  alt='Actualizar lista de precios' </a>";;?> </td>
    <td><?php echo "<a  href=\"$ruta0\" target=\"_blank\">$doc0</a>";?> </td>
    <td><?php echo "<a  href=\"$ruta8\" target=\"_blank\">$doc8</a>","<a href='actualizarec.php?rfc=".$mostrar['rfc'] ."'>&nbsp;<img  title='Actualizar el estado de cuenta' src='/compras/img/editar.png' width='20px'  alt='Actualizar lista de precios' </a>";;?> </td>
<!--en estos últimos href, al final le agregamos el icono de nuestra preferencia para cada acción y le pasamos el rfc a ese link mediante el símbolo ? y que se abrirá cuando demos click, de esa forma abriremos un html con las variables del proveedor que deseemos enviar.
mediante el title asignamos la descripción de que hace cada icono y mediante &nbsp; sirve para dar un espaciado y que el icono no quede pegado-->
    <?php echo "<td>";
    echo "<a href='micalificacionp.php?rfc=".$mostrar['rfc'] ."'><img title='Ver sus calificaciones' src='/compras/img/carpetac.png' width='45px'  style: align='center' alt='Documentación' </a>";
    
    echo "</td>";?>
    
    </tr>
    <?php

}

?>
</table>
</div>
<?php
require("footer-index.php");
?>
</body>

 <!-- JavaScript al final antes del body incluimos nuestros javascript para que footable funcione, de lo contrario no funcionara el responsive web desing-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/footable.min.js"></script>  
      <script>
      jQuery(function($){
	$('.table').footable();
});
      </script>
</html>