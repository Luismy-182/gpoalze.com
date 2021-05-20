<?php
require("../conexion/conexion.php");

//actualizamos datos de compradores, es como tal solo un update a la tabla comprador con los nuevos datos recibidos por post del formulario



            $usuario=$_POST["usuario"];
            $usuarioc=$_POST["usuarioc"];
            $contrasena=$_POST["contrasena"];
            $nombre=$_POST["nombre"];
            $apellido1=$_POST["apellido1"];
            $apellido2=$_POST["apellido2"];
            $correo=$_POST["correo"];


            $sql="UPDATE comprador SET usuario='$usuarioc', contrasena='$contrasena',nombre='$nombre',apellido1='$apellido1',apellido2='$apellido2',correo='$correo' WHERE usuario='$usuario'";
            $query = $con->query($sql);
           if($query!=null){
                print "<script>alert(\"Exito al actualizar los ajustes del proveedor.\");window.location='compras.php';</script>"; //esto se ejecuta si hubo éxito. no hace falta poner un else, ya que si la bd existe jamas dará un error
           }
          ?>