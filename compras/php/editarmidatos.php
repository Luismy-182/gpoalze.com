<?php 
//editar mis propios datos desde la vista usuario estandar
//este documento no tiene nada de especial, simplemente cargamos el header y la conexión a la bd
//después mediante una consulta buscamos todos los campos de la tabla comprador y después mediante un formulario y un while
//mostraremos esos valores que ya estaban en la bd para asi poder editarlos y volverlos a actualizar en la bd mediante un update.
require("../conexion/conexion.php");
require("headerc.php");
$consulta="SELECT*FROM comprador WHERE usuario='$user'";
$resultado=mysqli_query($con,$consulta);
while($mostrar=mysqli_fetch_array($resultado)){



               
                    $usuario=$mostrar['usuario'];
                      $nombre=$mostrar['nombre'];
                      $apellido1=$mostrar['apellido1'];
                      $apellido2=$mostrar['apellido2'];
                      $correo=$mostrar['correo'];
                     
}

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
    <link rel="shortcut icon" href="../img/logo.ico" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Editar comprador</title>
</head>

<body>

    <div class="container">
        <div class="form-group text-center">

            <form action="actualizadatosus.php" method="POST" autocomplete="off" class="comprador compradores">
                <input type="hidden" name="usuario" value="<?php echo $user;?> " placeholder="Contraseña">
                <div class="form-group">
                    <i class="fa fa-user-edit "></i><br>
                    <label>Nombre de usuario:</label><br>
                    <input class="form-control" type="text" name="usuarioc" value="<?php echo $usuario; ?>"><br>
                </div>
                <div class="form-group">
                    <label> contraseña:</label><br>
                    <input class="form-control" type="password" name="contrasena" placeholder="Actualice su contraseña"
                        required><br>
                </div>
                <div class="form-group">
                    <label>Nombre:</label><br>
                    <input class="form-control" type="text" name="nombre" value="<?php echo $nombre;?>"><br>
                </div>
                <div class="form-group">
                    <label>Apellido paterno:</label><br>
                    <input class="form-control" type="text" name="apellido1" value="<?php echo $apellido1;?>"><br>
                </div>
                <div class="form-group">
                    <label>Apellido materno:</label><br>
                    <input class="form-control" type="text" name="apellido2" value="<?php echo $apellido2;?>"><br>
                </div>
                <div class="form-group">
                    <label>Correo:</label><br>
                    <input class="form-control" type="text" name="correo" value="<?php echo $correo;?>"><br>
                    <!--Nótese que en los value siempre se pondrá los campos que recorrimos con while  -->
                </div>


                <input type="submit" class="btn btn-secondary terminar" value="Guardar cambios">
                <br><br>
            </form>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>