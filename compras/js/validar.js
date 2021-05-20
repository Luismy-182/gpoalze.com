/* Función para validar cada uno de los campos del formulario de registro, comenzaremos por jalar a través de id cada uno de
los campos del formulario de registro (input) y le indicaremos a js que deseamos obtener el valor de cada input */


function validar() {

    //declaramos nuestras variables para después pasarle los valores de los inputs por id
var razon_social,giro_empresa,rfc,pagina_web,dfc,dfn,colonia,cp,municipio,cond_credito,diasc,limitec,tiempo_entrega,penalizacion_inc,costos,empresa,banco,cuentabancaria,clabe_banc,correo_aviso,estadocuenta,positiva,director_general,telefono_dir,email_dir,otro_contacto,telefono_otro,email_otro,repres_ventas,tel_repre,email_repre,nombre1,contacto1,telefono1,nombre2,contacto2,telefono2,expresion;

razon_social=document.getElementById("razon_social").value;
giro_empresa=document.getElementById("giro_empresa").value;
rfc=document.getElementById("rfc").value;
pagina_web=document.getElementById("pagina_web").value;
dfc=document.getElementById("dfc").value;
dfn=document.getElementById("dfn").value;
colonia=document.getElementById("colonia").value;
cp=document.getElementById("cp").value;
municipio=document.getElementById("municipio").value;
cond_credito=document.getElementById("cond_credito").value;
diasc=document.getElementById("diasc").value;
limitec=document.getElementById("limitec").value;
tiempo_entrega=document.getElementById("tiempo_entrega").value;
penalizacion_inc=document.getElementById("penalizacion_inc").value;
costos=document.getElementById("costos").value;
empresa=document.getElementById("empresa").value;
banco=document.getElementById("banco").value;
cuentabancaria=document.getElementById("cuentabancaria").value;
clabe_banc=document.getElementById("clabe_banc").value;
correo_aviso=document.getElementById("correo_aviso").value;
estadocuenta=document.getElementById("estadocuenta").value;
positiva=document.getElementById("positiva").value;
director_general=document.getElementById("director_general").value;
telefono_dir=document.getElementById("telefono_dir").value;
email_dir=document.getElementById("email_dir").value;
otro_contacto=document.getElementById("otro_contacto").value;
telefono_otro=document.getElementById("telefono_otro").value;
email_otro=document.getElementById("email_otro").value;
repres_ventas=document.getElementById("repres_ventas").value;
tel_repre=document.getElementById("tel_repre").value;
email_repre=document.getElementById("email_repre").value;
nombre1=document.getElementById("nombre1").value;
contacto1=document.getElementById("contacto1").value;
telefono1=document.getElementById("telefono1").value;
nombre2=document.getElementById("nombre2").value;
contacto2=document.getElementById("contacto2").value;
telefono2=document.getElementById("telefono2").value;
expresion=/\w+@\w+\.+[a-z]/; //con esta expresión  regular podremos validar que realmente sea un correo electrónico lo que nos declaren en cada input de email
//para mas información de expresiones regulares consulte: https://developer.mozilla.org/es/docs/Web/JavaScript/Guide/Regular_Expressions



/*Aqui le indicamos que si razón social o (el signo || significa o) rfc o giro_empresa e.t.c. están vacíos y si son obligatorios entonces que mande una alerta diciendo que los campos
no pueden estar vacíos, ademas con el return false, hacemos que la pagina no cargue nada después de mostrar la alerta y se mantenga en la misma pagina */
if (razon_social===""||giro_empresa===""||rfc===""||dfc===""||dfn===""||colonia===""||cp===""||municipio===""||cond_credito===""||diasc===""||limitec===""||tiempo_entrega===""||penalizacion_inc===""||costos===""||empresa===""||banco===""||cuentabancaria===""||clabe_banc===""||correo_aviso===""||estadocuenta===""||director_general===""||telefono_dir===""||email_dir===""||repres_ventas===""||tel_repre===""||email_repre===""||nombre1===""||contacto1===""||telefono1==="") {
    alert("Por favor llene todos los campos obligatorios *");
    return false;
}

/*en esta parte le decimos a js que si la cadena de cada id del input supera el limite que tenemos declarado en la bd, mande una alerta diciendo que no se pueden enviar cadenas largas, 
con el fin de que no se envié la cadena y al usuario no le muestre un error la bd al superar la capacidad de campo. */
else if (razon_social.length>200||colonia.length>200||municipio.length>200||penalizacion_inc.length>200||pagina_web.length>200||banco.length>200||correo_aviso.length>200||director_general.length>200) {
    alert("La razón social,colonia,municipio,penalización por incumplimiento, pagina web, banco, correo para aviso de deposito y el nombre del director general, solo pueden tener 200 caracteres como máximo");
    return false;//por ejemplo que razon_social no supere los 200 caracteres, y para ello usamos la propiedad.length. con esto mismo aprovechamos para que no introduzcan mas de 10 numero en los teléfonos o números de cuenta bancarias

}else if(giro_empresa.length>500||dfc.length>500||cond_credito.length>500||estadocuenta.length>500){
alert("El giro de la empresa, calle de la dirección fiscal, condiciones de credito, y el nombre del archivo de datos bancarios no pueden exceder mas de 500 caracteres");
return false;
}else if(rfc.length>13){
alert("El rfc no puede tener mas de 13 caracteres como máximo");
    return false;

}else if(dfn.length>10){
    alert("El numero de la dirección fiscal no puede exceder mas de 10 caracteres");
    return false;
}else if(cp.length>9){
    alert("El código postal no puede superar los 9 caracteres");
    return false;
}else if(diasc.length>5){
    alert("El campo días de credito no puede ser superior a 5 dígitos");
    return false;

}else if(tiempo_entrega.length>10){
alert("El tiempo de entrega no puede ser mayor a 10 dígitos");
return false;
}else if(clabe_banc.length>18){
alert("La clabe interbancaria no puede ser mayor a 18 dígitos");
return false;
}else if(cuentabancaria.length>10){
    alert("El numero de cuenta bancario no puede ser mayor a 10 dígitos ");
    return false;
}else if(positiva.length>200){
    alert("El nombre del documento de carta de calificación es demasiado largo");
    return false;
}else if(telefono_dir.length>10||telefono1.length>10||telefono2.length>10||telefono_otro.length>10){
alert("Ningún numero telefónico puede exceder mas de 10 dígitos y no pueden contener letras");
return false;
}else if(telefono_dir.length<10||telefono1.length<10||telefono2.length<10){
alert("Ningún numero telefónico puede tener menos de 10 dígitos y no pueden contener letras");
return false;
}
else if(email_otro.length>200||email_dir.length>200||email_repre.length>200){
    alert("Los correos electrónicos no pueden superar mas de 200 caracteres.");
    return false;
}else if(repres_ventas.length>300){
    alert("El nombre y apellido del representante de ventas debe ser menor a 300 caracteres");
    return false;

}else if(nombre1.length>300||nombre2.length>300){
alert("El nombre en la referencia de clientes debe ser menor a 300 caracteres");
return false;
}else if(contacto1.length>300||contacto2.length>300){
    alert("El nombre del contacto en la referencia de clientes es demasiado largo");
    return false;
}else if(isNaN(limitec)){ //con la propiedad isNaN probamos que sea un numero y no una cadena, isNaN significa Is Not A Number (si no es un número)
 alert("El limite de credito no puede contener letras, solo números");//si no es un numero entonces mostramos esto, y retornamos un falso para que no se manden los datos
    return false;
    }else if(limitec.length>7){
alert("El limite de credito no puede exceder mas de 7 dígitos");
    return false;
    }
    else if(isNaN(diasc)){
 alert("El campo días de credito no puede contener letras, solo números");
    return false;
    }else if(diasc.length>3){
alert("El campo días de credito no puede exceder mas de 3 dígitos");
    return false;
    }else if(isNaN(dfn)){
 alert("El numero de dirección fiscal no puede contener letras, solo números");
    return false;
    }else if(dfn.length>8){
alert("El numero de dirección fiscal no puede exceder mas de 8 dígitos");
    return false;
    }else if(isNaN(tiempo_entrega)){
 alert("El campo tiempo de entrega no puede contener letras, solo números");
    return false;
    }else if(tiempo_entrega.length>3){
alert("El campo tiempo de entrega no puede exceder mas de 3 dígitos");
    return false;
    }else if(isNaN(cuentabancaria)){
 alert("El numero de cuenta bancaria no puede contener letras, solo números");
    return false;
    }else if(cuentabancaria.length>10){
alert("El numero de cuenta no puede exceder mas de 8 dígitos");
    return false;
    }else if(isNaN(clabe_banc)){
 alert("El campo de clabe interbancaria no puede contener letras, solo números");
    return false;
    }
    else if(isNaN(cp)){
 alert("El código postal no puede contener letras, solo números");
    return false;
    }else if(cp.length>5){
alert("El código postal no puede exceder mas de 5 dígitos");
    return false;
    }else if(isNaN(tel_repre)||isNaN(telefono1)||isNaN(telefono2)||isNaN(telefono_dir)||isNaN(telefono_otro)){
    alert("Los números telefónicos no pueden contener letras y solo debe tener 10 dígitos");
    return false;
}else if (!expresion.test(email_dir)){/*recuerda la expresión regular al inicio del documento? bueno, pues ahora la usamos para validar si los emails son realmente un email y no una cadena con otros valores*/
    alert("El email del apartado \"Email del director general\" no es un correo valido");//se ocupa la variable expresión y se hace un test, con la palabra reservada test
    return false;//si no es un correo retornamos un falso con una alerta 
}else if (!expresion.test(email_otro)){
    alert("El email opcional del apartado \"otro contacto\" no es un email valido");
    return false;
}
else if (!expresion.test(email_repre)){
    alert("El email del representante de ventas, no es un email valido");
    return false;
}
else if (!expresion.test(correo_aviso)){
    alert("El email para aviso de deposito, no es un email valido");
    return false;
}
}//fin de la función


function solonumeros(e){ //función para escribir solo números en los input donde se esperan números, 
    key=e.KeyCode||e.which; //a las palabras reservadas e.key y e.wich (funciones para el teclado) les asignamos una variable, en este caso key
    teclado=String.fromCharCode(key);//a la variable  teclado le asignamos este método. Este método devuelve una cadena y no un objeto String.
    numeros="0123456789";//validamos que números puede contener
    especiales="8-37-38-46";//estos números, corresponden a teclas especiales, las cuales permitiremos como borrar, suprimir, espacial etc, para mas información consulte: https://salinasjavi.wordpress.com/2010/06/09/codigos-javascript-del-teclado-keycodes/
    teclado_especial=false; //inicializamos nuestra variable booleana en falso, par después proceder a hacerla true cuando se presionen las teclas especiales, como borrar y que estas se puedan usar. De lo contrario esas teclas especiales no funcionaran.
    for(var i in especiales){//con un for recorreremos todo el arreglo ingresado en las teclas, si el teclado encuentra que pulsamos una tecla especial como borrar, se volverá true y ejecutara la acción, de lo contrario no escribirá. 
        if (key==especiales[i]){
            teclado_especial=true;//cuando la encuentra se vuelve true y permite el funcionamiento solo de esas teclas especiales
        }
    }
    if(numeros.indexOf(teclado)==-1 && !teclado_especial) {
        return false;//si las teclas presionadas no son números y no hay ninguna tecla especial entonces devuelve un false para no hacer nada y no deja escribir a menos que sea número, o una tecla especial
    }
}

