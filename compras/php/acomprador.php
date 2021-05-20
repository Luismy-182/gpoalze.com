<?php 
require("../conexion/conexion.php");

?>
<!-- formulario para agregar comprador-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="shortcut icon" href="../img/logo.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <title>Añadiendo comprador</title>
</head>
<body>
<?php
require("headerc.php"); //importamos nuestro header de comprador
?>
<!-- esto es un formulario ordinario -->
<div class="container">
    <div class="form-group text-center"><!--clase reservada para centrar objetos -->

<form action="validaa.php" method="POST" autocomplete="off" class="comprador compradores" >
  <div class="form-group">
    <i title="Añadiendo comprador" class="fas fa-user-plus"></i><br>
    <label for="formGroupExampleInput">Nombre de usuario:</label>
    <input type="text"  name="usuario" required class="form-control">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Escriba la contraseña del usuario</label>
    <input type="password" class="form-control" id="pass2" name="contrasena" required>
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput2">Nombre</label>
    <input type="text" class="form-control" id="contrasena" name="nombre" required>
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput2">Apellido paterno</label>
    <input type="text" class="form-control" id="contrasena" name="apellido1" required>
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput2">Apellido materno</label>
    <input type="text" class="form-control" id="contrasena" name="apellido2" required>
  </div>

      <div class="form-group">
    <label for="formGroupExampleInput2">Correo electrónico</label>
    <input type="text" class="form-control" id="contrasena" name="correo" required><br>
  </div>

     <div class="form-group"> <!-- Aquí podemos agregar los privilegios de usuarios -->
    <label for="formGroupExampleInput2">Privilegios de usuario</label>
    <select name="tipo" required>
<option value="" class="form-control">--ASIGNAR PRIVILEGIOS--</option><!--Se deja sin valor para que el usuario no pueda guardar con esta primera posición -->
<option value="ADMINISTRADOR">ADMINISTRADOR</option>
<option value="ESTANDAR">USUARIO ESTÁNDAR</option>
</select><br><br>
  </div>

<input type="submit" class="btn btn-secondary" value="Crear comprador" >



</form>
</div>

</div>





<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>