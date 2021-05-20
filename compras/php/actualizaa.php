


<?php
/*instrucciones dml para actualizar los datos del usuario comprador en el formulario editac comprador editarc.php y solo los puede editar el comprador administrador */
require("../conexion/conexion.php");





    
            $usuario=$_POST["usuario"];
            $usuarioc=$_POST["usuarioc"];
            $contrasena=$_POST["contrasena"];
            $nombre=$_POST["nombre"];
            $apellido1=$_POST["apellido1"];
            $apellido2=$_POST["apellido2"];


            $sql="UPDATE comprador SET usuario='$usuarioc', contrasena='$contrasena',nombre='$nombre',apellido1='$apellido1',apellido2='$apellido2' WHERE usuario='$usuario'";
            $query = $con->query($sql);
           if($query!=null){
                print "<script>alert(\"Exito al actualizar los ajustes del proveedor.\");window.location='compras.php';</script>";
           }

          ?>