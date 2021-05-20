# compras
Aplicación web para el departamento de compras del CENTRO DE DISTRIBUCIÓN ARAM-LUZ S.A. DE C.V.

ASPECTOS GENERALES.
Librerias del lado del servidor:
*phpmailer
*mpdf
*catcha de google

Librerias lado del cliente:
*ajax
*jquery.js
*footable.js
*datatable.js
*bootstrap.js
*papper.js

En la parte del diseño se usa 
*CSS3
*bootstrap.css
*Google Fonts
*Fontawesome
*iconos de flaticon.es

Notas.
IMPORTANTE!!!
No borrar el usuario Sin asignar de la base de datos, de lo contrario no se podra insertar valores en la bd y el proyecto dejara de recibir registros de nuevos prospectos, 
En caso de eliminar accidentalmente el usuario, solo bastara con entrar al apartado compradores y agregar un nuevo comprador, o directamente desde la base de datos, y crear uno con los siguientes datos:
usuario: Sin asignar
tipo: ADMINISTRADOR

los demas campos pueden ser personalizados, ese es el usuario "root" por defecto al que se le asignan prospectos justo despues de insertar el prospecto, y funciona como clave foranea y relacion entre compradores y proveedores o prospectos, por lo cual no se debe eliminar.


Si se requiere cambiar el correo electronico para trabajar con emails, solo basta editar las credenciales de php mailer desde la ubicación: /compras/conexion/credencialesphpmailer.php
ya que con solo cambiar los ajuste ahi, bastara para que todo el proyecto vuelva a funcionar, en lugar de cambiarle las credenciales archivo por archivo de este proyecto.



Los escrips para recordar al proveedor de actualizar sus documentos, se hacen mediante cronjobs, mediante consultas sql a la base de datos. Selecciona todos los emails del los representantes de ventas cuando su subida de estado de cuenta o carta de opinion a superado los 30 dias, si se desea personalizar solo bastara el >=30 por el numero de dias de preferencia.

Otros aspectos a destacar: 
por cuestion de tiempo, solo se hizo adaptable la aplicacion web en pantallas 360px (la mayoria de smartphones) y equipos superiores a 992px (laptops y pcs de escritorio)

Comentarios del codigo fuente...
El codigo se a escrito tratatando siempre de tener una buena tabulación y ordenamiento, el codigo fuente se regalara con una primera y unica copia al departamento de sistemas del CENTRO DE DISTRIBUCION ARAM-LUZ S.A DE C.V. En caso de que el codigo fuente requiera ser actualizado o mejorado, se debe tener encuenta que este proyecto esta comentado teniendo en consideración, que el que lo edita tiene conocimientos intermedios en css3(flexbox, maquetación con floats), responsive web desing, html5, javascript, jquery, php, bases de datos relacionales y en general en algun lenguaje de programación, por lo cual los comentarios del codigo NO describen que para que sirve cada atributo propio de css3, etiquetas html, o palabras reservadas de php, solo nos limitamos a describir que hace cada funcion u metodo en cuanto a las necesidades del proyecto que se requieren.

