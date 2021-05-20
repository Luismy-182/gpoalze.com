<?php
/*esto es un espejo de crear pdf por lo cual no es necesario volver a documentar el código, si quiere saber como funciona abra el documento */
require("../conexion/conexion.php");
require ('mpdf/vendor/autoload.php');
$mpdf = new \Mpdf\Mpdf();

$mpdf->SetFont('Calibri', 'B', '16');

$rfcc=$_GET['rfc'];



/*literalmente el unico cambio que tiene es que en lugar de alta de proveedor dice alta de prospecto, lo demás es lo mismo*/
$consulta="SELECT*FROM altaproveedor WHERE rfc='$rfcc'";
$resultado=mysqli_query($con,$consulta);
while($mostrar=mysqli_fetch_array($resultado)){
$mostrar['fecha_alta'];
$mostrar['razon_social'];
$mostrar['giro_empresa'];
$mostrar['dfc'];
$mostrar['dfn'];
$mostrar['colonia'];
$mostrar['cp'];
$mostrar['municipio'];
$mostrar['rfc'];
$mostrar['cond_credito'];
$mostrar['empresa'];
$mostrar['clase_fact'];
$mostrar['tiempo_entrega'];
$mostrar['penalizacion_inc'];
$mostrar['costos'];
$mostrar['clabe_banc'];
$mostrar['pagina_web'];
$mostrar['banco'];
$mostrar['correo_aviso'];
$mostrar['director_general'];
$mostrar['telefono_dir'];
$mostrar['email_dir'];
$mostrar['repres_ventas'];
$mostrar['tel_repre'];
$mostrar['email_repre'];
$mostrar['otro_contacto'];
$mostrar['telefono_otro'];
$mostrar['email_otro'];
$mostrar['email_otro'];
$mostrar['nombre1'];
$mostrar['contacto1'];
$mostrar['telefono1'];
$mostrar['nombre2'];
$mostrar['contacto2'];
$mostrar['telefono2'];

$html = ' 
<img src="../img/logo.jpg">
<h1 ALIGN="CENTER">ALTA DE PROSPECTO</h1>
<h6 ALIGN="CENTER">DEPARTAMENTO DE COMPRAS</h6>

<div class="contenedor">
<p ALIGN="right">FECHA DE ALTA: '.$mostrar['fecha_alta'].'<br></p>



<p aling="left">RAZÓN SOCIAL: '.$mostrar['razon_social'].'<br></p>
<p aling="left">GIRO DE LA EMPRESA: '.$mostrar['giro_empresa'].'<br>
<p>R.F.C.: '.$mostrar['rfc'].' <br></p>
<p>PAGINA WEB.: '.$mostrar['pagina_web'].' <br></p>
<p aling="left">DIRECCIÓN FISCAL (calle): '.$mostrar['dfc'].', No. '.$mostrar['dfn'].', colonia: '.$mostrar['colonia'].', C.P: '.$mostrar['cp'].', Municipio y/o delegación: '.$mostrar['municipio'].' <br></p>

<p aling="left">DIAS DE CRÉDITO: '.$mostrar['diasc'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; LIMITE DE CRÉDITO (monto): '.$mostrar['limitec'].'<br></p>
<p aling="left">EMPRESA A LA QUE BRINDA SERVICIOS: '.$mostrar['empresa'].'<br>
<p aling="left">TIEMPO DE ENTREGA (días): '.$mostrar['tiempo_entrega'].'<br>

<p aling="left">COSTOS: '.$mostrar['costos'].'<br>

<p aling="left">BANCO: '.$mostrar['banco'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CUENTA BANCARIA: '.$mostrar['cuentabancaria'].' <br>
<p>CLABE BANCARIA: '.$mostrar['clabe_banc'].'<br>
<p>EMAIL PARA AVISO DE DEPOSITO: '.$mostrar['correo_aviso'].'<br>
<div class="c2">
<h3 align="center">DATOS DE CONTACTO</h3>
</div>
<p>DIRECTOR GENERAL: '.$mostrar['director_general'].'<br>
<p>TELEFONO: '.$mostrar['telefono_dir'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EMAIL: '.$mostrar['email_dir'].'<br>
<p>REPRESENTANTE DE VENTAS: '.$mostrar['repres_ventas'].'<br>
<p>TELEFONO: '.$mostrar['tel_repre'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EMAIL: '.$mostrar['email_repre'].'<br>

<p>OTRO CONTACTO: '.$mostrar['otro_contacto'].'<br>
<p>TELEFONO: '.$mostrar['telefono_otro'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EMAIL: '.$mostrar['email_otro'].'<br>

<div class="c1">
<h3 align="center">REFERENCIAS DE CLIENTES</h3>
</div>
<p align="center" class="cliente">CLIENTE 1</p>
<p>NOMBRE: '.$mostrar['nombre1'].'<br>
<p>CONTACTO: '.$mostrar['contacto1'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; TELÉFONO: '.$mostrar['telefono1']. '<br>
<br><p align="center" class="cliente">CLIENTE 2</p>
<p>NOMBRE: '.$mostrar['nombre2'].'<br>
<p>CONTACTO: '.$mostrar['contacto2'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; TELÉFONO: '.$mostrar['telefono2']. '<br>


</div>
<style> 
.contenedor{
	border-left: 1px solid black;
	   border-right: 1px solid black;
	   border-bottom: 1px solid black;
	   border-top: 1px solid black;
}
.c1,.c2{
	   border-left: 1px solid black;
	   border-right: 1px solid black;
	   border-bottom: 1px solid black;
	   border-top: 1px solid black;

}
img{
	position:absolute;
	width:65px;
	float:left;
	margin:0;
	padding:0;
	 top: 40px;
  left : 40px;
}
p{
	font-family: calibri;
	font-size:11px;
}
p.cliente{
	font-weight: bold;
}
h3{
}

</style>
' ;
}
$mpdf -> WriteHTML($html);
$mpdf -> output();