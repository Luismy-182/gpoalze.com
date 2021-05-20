<?php
//eliminación de comprador
//es una simple instrucción DML en la bd por lo cual solo se usa la conexión y se captura el usuario por get y con ese mismo se elimina en delete from where 

require("../conexion/conexion.php");
session_start();
$usuario=$_GET['usuario'];


$borra="DELETE FROM comprador WHERE usuario='$usuario'";
$resultado=mysqli_query($con,$borra);
if($resultado){
    echo "<script> alert('Se ha eliminado el nuevo usuario.');
    window.location.href='compradores.php';
    </script>";
}










?>