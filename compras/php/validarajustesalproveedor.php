<?php
require("../conexion/conexion.php");



/*este codigo solo valida el insertado dml del formulario ajustesal proveedor, por lo cual solo recibe los datos por post y actualiza los campos con esta nueva información*/

if (!empty($_POST)) {//si no esta vacío post entonces
    if(isset($_POST["usuario"]) && isset($_POST["rfc"]) && isset($_POST["estatus"])&& isset($_POST["tipo"])) { //si en post hay un rfc, un estus de proveedor y un tipo. entonces
        if($_POST["usuario"]!="" && $_POST["rfc"]!="" && $_POST["estatus"]!=""&& $_POST["tipo"]!=""){//si los campos por post no están vacíos entonces 
        $usuario=$_POST["usuario"];
            $rfc=$_POST["rfc"];
            $estatusp=$_POST["estatus"];
            $tipop=$_POST["tipo"];//le damos variables a los $_post

            $found = false;
            $sql1 = "SELECT * FROM altaproveedor WHERE rfc=\"$_POST[rfc]\"";//creamos nuestra consulta seleccionando todo los campos de alta proveedor cuando rfc sea nuestro rfc
            $query=$con->query($sql1);
            while($r=$query->fetch_array()) {//recorremos el while asta que nos de un true
                $found = true;
                break;
            }
        
    


            $sql="UPDATE altaproveedor SET usuarioc=\"$usuario\",estatusp=\"$estatusp\",tipop=\"$tipop\" WHERE rfc=\"$rfc\"";//entonces creamos nuestra consulta con update y actualizamos los campos de la bd
            $query = $con->query($sql);
           if($query){
                print "<script>alert(\"Éxito al actualizar los ajustes del proveedor.\");window.location='compras.php';</script>";//si todo sale bien, se muestra esta alerta
                    

            }
        }
    }
}echo'<script type="text/javascript">
    alert("No as seleccionado nada");
    window.history.back();
    </script>';// si esta vacío y solo le dieron click sin elegir nada entonces muestra este mensaje y no actualiza nada asta que de verdad se seleccione algo

?>