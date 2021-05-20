<?php
require("../conexion/conexion.php");

//cargamos la conexion a la bd
if (isset($_POST["email"]) && (!empty($_POST["email"]))) { // si se mando algo por post de email y si el campo email no llego vacío entonces
    $email = $_POST["email"]; //recibimos el email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL); /*satirizamos los datos de email recibidos del formulario*/
    $email = filter_var($email, FILTER_VALIDATE_EMAIL); //se sanitiza para evitar que en esos input no nos llegue código javascript malicioso, y si llega las instrucciones no se ejecuten
    if (!$email) {
        echo "Email invalido, por favor introdusca una direccion valida!"; // después de sanitizar,  si no es un email y es codigo malicioso, manda ese mensaje.
    } else {
/*se sigue el mismo principio de búsqueda de coincidencias entre tablas como en el archivo validarlogin.php*/
        $consulta = "SELECT*FROM altaproveedor WHERE email_repre = '$email'";
        $resultado = mysqli_query($con, $consulta); //consulta para seleccionar todos los campos cuando se encuentre la palabra email en algún campo de la tabla proveedor

        $consulta2 = "SELECT*FROM comprador WHERE  correo='$email'";
        $resultado2 = mysqli_query($con, $consulta2);//consulta para seleccionar todos los campos cuando se encuentre la palabra email en algún campo de la tabla comprador

        $proveedor = mysqli_num_rows($resultado); //guardamos las consultas en sus variables correspondientes
        $comprador = mysqli_num_rows($resultado2);




        if ($proveedor) { //si se encontró algo en la consulta del proveedor entonces disparamos el archivo recoveryproveedor.php
/*disparamos el scrpt del proveedor*/
            include "recoveryproveedor.php"; //estos scripts ya tienen todo preparado para tomar valores del post formulario: para mas info visite: https://www.w3schools.com/php/php_includes.asp

            /*aqui termina */
        } else if ($comprador) { //si no encontró nada en la consulta del proveedor entonces busca en la consulta comprador y si encuentra algo entonces...
            /**disparamos el script del comprador */
include "recoverycomprador.php";
            /*aqui termina */
        } else {
            echo '<script type="text/javascript">
    alert("Usuario no registrado o no válido.");
    window.location.href="recuperacontrasena.php";
    </script>';// y si no encontró nada en ninguna consulta, entonces el usuario no existe y manda la alerta
        }
    }
}