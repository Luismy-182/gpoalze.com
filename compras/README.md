# compras
Aplicación web para el departamento de compras del CENTRO DE DISTRIBUCIÓN ARAM-LUZ S.A. DE C.V.

ASPECTOS GENERALES.
Librerías del lado del servidor.
*phpmailer
*mpdf
*catcha de Google

Librerías lado del cliente:
*Ajax
*jquery.js
*footable.js
*datatable.js
*bootstrap.js
*papper.js

En la parte del diseño se usa:
*CSS3
*bootstrap.css
*Google Fonts
*Fontawesome
*iconos de flaticon.es

Notas.
¡IMPORTANTE!!!
No borrar el usuario "sin asignar" de la base de datos, de lo contrario no se podrán insertar valores en la bd y el proyecto dejará de recibir registros de nuevos prospectos, 
En caso de eliminar accidentalmente el usuario, solo bastará con entrar al apartado compradores y agregar un nuevo comprador, o directamente desde la base de datos, y crear uno con los siguientes datos:
usuario: Sin asignar
tipo: ADMINISTRADOR

los demás campos pueden ser personalizados, ese es el usuario "root" por defecto al que se le asignan prospectos justo después de insertar el prospecto, y funciona como clave foránea y relación entre compradores y proveedores o prospectos, por lo cual no se debe eliminar.


Si se requiere cambiar el correo electrónico para trabajar con emails, solo basta editar las credenciales de PHP mailer desde la ubicación: /compras/conexion/credencialesphpmailer.php
ya que con solo cambiar los ajustes ahí, bastará para que todo el proyecto vuelva a funcionar, en lugar de cambiarle las credenciales archivo por archivo de este proyecto.



Los scrips para recordar al proveedor de actualizar sus documentos, se hacen mediante cronjobs, mediante consultas sql a la base de datos. Selecciona todos los emails de los representantes de ventas cuando su subida de estado de cuenta o carta de opinión ha superado los 30 días. Si se desea personalizar, solo bastará el >=30 por el número de días de preferencia.

Otros aspectos a destacar: 
por cuestión de tiempo, solo se hizo adaptable la aplicación web en pantallas 360px (la mayoria de smartphones) y equipos superiores a 992px (laptops y pcs de escritorio)

Comentarios del código fuente...
El código se a escrito tratando siempre de tener una buena tabulación y ordenamiento, el código fuente se regalará con una primera y única copia al departamento de sistemas del CENTRO DE DISTRIBUCION ARAM-LUZ S.A DE C.V. En caso de que el código fuente requiera ser actualizado o mejorado, se debe tener en cuenta que este proyecto esta comentado teniendo en consideración, que lo edite tiene conocimientos intermedios en CSS (flexbox, maquetación con floats), responsive web desing, html5, JavaScript, jQuery, php, bases de datos relacionales y en general en algun lenguaje de programación, por lo cual los comentarios del código NO describen que para qué sirve cada atributo propio de CSS, etiquetas html, o palabras reservadas de php, solo nos limitamos a describir que hace cada función o método en cuanto a las necesidades del proyecto que se requieren.

