<!--Este formularios sirve para eliminar al prospecto, por lo cual cargamos header de comprador y al mismo tiempo
la conexión a la bd y el rfc con get de la tabla anterior-->
<?php 
require("../conexion/conexion.php");

$rfc=$_GET['rfc'];


$query="SELECT razon_social FROM altaproveedor where rfc='$rfc'";
$resultado=mysqli_query($con,$query);
while ($mostrar=mysqli_fetch_array($resultado)) {
  $razon=$mostrar['razon_social'];
}

//ahora con un while y una consulta a la tabla proveedor procedemos a sacar la razón social del proveedor


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
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <title>ELIMINACIÓN DE PROSPECTO</title>
</head>

<?php
require("headerc.php");

?>

<body>
    <div class="container">




        <div class="form-group text-center">

            <!--al confirma que si procederemos a validar la eliminación del prospecto y todos sus documentos y registros en la bd -->
            <form action="validareliminarprospecto.php" method="POST" class="comprador">
                <i title="Eliminar prospecto" class="fas fa-user-times "></i>
                <br><br>
                <H2>ELIMINACIÓN DE PROSPECTO <?php echo $rfc;?> </H2>
                <div class="form-group">
                    <input type="hidden" name="rfc" value="<?php echo $rfc;?>">
                    <label for="myfile">Esta a punto de eliminar al prospecto de <?php echo $razon;?> ¿Esta seguro?,
                        ¡Esta acción no se puede deshacer!</label><br>
                </div>
                </br><input type="submit" value="Si, eliminar prospecto" class="btn btn-secondary">
        </div>
        </form>
    </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>