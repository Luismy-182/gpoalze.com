<?php 
require("../conexion/conexion.php");
$rfc=$_GET['rfc'];
$query="SELECT razon_social FROM altaproveedor where rfc='$rfc'";
$resultado=mysqli_query($con,$query);
while ($mostrar=mysqli_fetch_array($resultado)) {
  $razon=$mostrar['razon_social'];
}

/*pantalla para asignar credenciales al prospecto
comenzamos como siempre, importamos la conexión ala bd y mediante un while y con el rfc por get, sacamos la razón social del proveedor. con el fin de que el ingeniero Daniel
tenga mas comodidad para observar y recordar a quien le esta asignando credenciales. 
*/

$consulta="SELECT usuario FROM comprador"; //creamos una consulta para después mostrar os usuarios compradores de la bd dentro de un select de html
$resultado=mysqli_query($con,$consulta);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../img/logo.ico" />
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <title>Creación de credenciales</title>
</head>

<?php
require("headerc.php");

?>

<body>
    <div class="container">
        <div class="form-group text-center">

            <form action="validacredenciales.php" method="POST" class="comprador">
                <input type="hidden" name="rfc" value="<?php echo $rfc ?>" placeholder="Contraseña"><br>
                <div class="form-group">
                    <i title="Convirtiendo a proveedor oficial" class="fa fa-user-check"></i><br><br>
                    <h3>ASIGNANDO CREDENCIALES<h3>
                            <h5>PROSPECTO: <?php echo $rfc;?></h5>
                            <!--mostramos el rfc del prospecto y su razón social -->
                            <h5>RAZÓN SOCIAL: <?php echo $razon;?></h5><br>
                            <div class="form-group">
                                <div>Seleccione el comprador responsable de dar seguimiento al proveedor <br>
                                    <select name="usuarioc" required>
                                        <!--Con la consulta del select anterior mostramos los compradores de la bd a quien el ing daniel quiere hacer responsable -->
                                        <option class="form-control" value="">--Asignar comprador--</option>
                                        <?php while($mostrar=mysqli_fetch_array($resultado)) { ?>
                                        <option value="<?php echo $mostrar['usuario']; ?>">
                                            <?php echo $mostrar['usuario'];?> </option>
                                        <!--después de seleccionar se mandara por post todo este formulario y se insertara en la bd-->
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <br><input type="submit" class="btn btn-secondary" value="Convertir a proveedor oficial">


                </div>

            </form>
        </div>

    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>



</html>