<?php
require("../conexion/conexion.php");
//valida formulario de añade nuevo comprador
/*no es la gran cosa es solo una operacion dml de insertado de datos en la bd*/

//por lo cual solo recibimos los datos que mandamos por POST en el formulario anterior y procedemos a insertarlos
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
$nombre=$_POST['nombre'];
$apellido1=$_POST['apellido1'];
$apellido2=$_POST['apellido2'];
$correo=$_POST['correo'];
$tipo=$_POST['tipo'];


$sql="INSERT INTO comprador 
(usuario,contrasena,nombre,apellido1,apellido2,correo,tipo) VALUES (
'$usuario',
'$contrasena',
'$nombre',
'$apellido1',
'$apellido2',
'$correo',
'$tipo'
)" or die(mysql_error($con)); //y así se crea un nuevo comprador en la bd



$resultado=mysqli_query($con,$sql);
if($resultado){
    echo "<script> alert('Se ha creado el nuevo usuario.');
    window.location.href='compradores.php';
    </script>";
}















?>