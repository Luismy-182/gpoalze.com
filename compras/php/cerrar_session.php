<?php
session_start();
session_destroy();
header("location:../index.php")
//cerramos la session, con lo cual al redirigiremos aquí,
// reanudaremos la sesión con sesion start y procedemos a destruirla con sesión destroy
//al final le pedimos que nos redirija al index y así se cierra una sesión correctamente
?>