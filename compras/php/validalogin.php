<?php
/*Login inteligente */
/* recibimos los datos escritos en nuestros inputs con los name del registro a través del método $_post*/
$rfc=$_POST['rfc']; /* trae lo que se escribió en el login */
$usuario=$_POST['rfc']; /*es una variable que aun no contiene nada pero tomara valor mas abajo */
$contrasena=$_POST['contrasena']; /* trae lo que se escribió en el login */
SESSION_START();
/*Comenzamos iniciando una sesión vaciá con php que contendrá los datos de sesión
según las instrucciones que determinaremos mas abajo  */
require("../conexion/conexion.php");
/*  Importamos nuestra conexión de php para poder trabajar con la bd */
$consulta="SELECT*FROM altaproveedor WHERE rfc = '$rfc' AND contrasena='$contrasena' ";
$resultado=mysqli_query($con,$consulta);
/* crearemos una consulta que contendra todos los datos de la tabla altaproveedor donde se alojan los proveedores y prospectos*/

$consulta2="SELECT*FROM comprador WHERE usuario = '$usuario' AND contrasena='$contrasena' ";
$resultado2=mysqli_query($con,$consulta2);
/* Al mismo tiempo creamos otra consulta a la bd que contendrá todos los datos de la tabla compradores.*/

$filas=mysqli_num_rows($resultado); /*proveedor */
$filas2=mysqli_num_rows($resultado2);/*comprador */
/*le damos una variable que contendrá los resultados de cada tabla */

/*Mediante un if y un ciclo while le decimos básicamente: con los datos que te escribieron en el login y las consultas que te definí de todos los campos de cada tabla,
buscame primero en la tabla proveedores si existe algo que coincida, si lo encuentras, me tomas con las palabras reservadas de php, los datos para crear una sesión

pero si no encuentras nada, ahora buscame entonces en la tabla comprador si encuentras algo que coincida, y si lo encuentras, me creas la sesión con otras variables diferentes
del proveedor para crear asi la sesión de comprador, me tomas el usuario del comprador, y el tipo y me lo guardas.

pero si aun asi no me encuentras nada, entonces manda una alerta en donde digas que hay error en la autentificaron. (No existen esos datos en la bd) */
if ($filas2) {
   
while($mostrar=mysqli_fetch_array($resultado2)){
    

$mostrar['tipo'];

    $_SESSION['tipo']=$mostrar['tipo']; /* si encontraste datos en la tabla de comprador, me guardas el tipo de comprador 
    (rol) y después procedes a tomarme el nombre de usuario y a redirigir. a su index de comprador, se realiza esta comprobación primero para evitar que nos redirija antes de tomar su rol de comprador */ 
    $tipo=$_SESSION['tipo'];
}

}


/*ejecutamos la funcion de buscar en tablas y darle sus valores para inicio de sesión*/
if($filas){
    $_SESSION['username']=$rfc;
    header("Location:proveedor.php");
    exit();
}else if($filas2){
    $_SESSION['user']=$usuario;
        header("Location:compras.php");

}

/*si no encuentras nada sales y muestras el error y lo rediriges al login*/
else{
    
     echo "<script type='text/javascript'>
        alert('Error en la autentificación');
         window.history.back();
        </script>";



}

?>