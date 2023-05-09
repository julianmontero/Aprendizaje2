function tieneValorVacio(idCampo) {
  return document.getElementById(idCampo).value=="";
}

function tieneValorIgualA(idCampo,valor) {
  return document.getElementById(idCampo).value==valor;
}

function noEsCampoNumerico(idCampo) {
  return isNaN(document.getElementById(idCampo).value);
}

function excedeLimiteDeCaracteres(idCampo,limite) {
  return document.getElementById(idCampo).value.length > limite;
}

function estaChequeado(idCampo) {
   return document.getElementById(idCampo).checked;
}
function esEmailValido(idCampo) {
  /* Chequea que el valor del campo "email" sea una
   * posible direcci�n de e-mail v�lida.
   *
   * "apos" guarda la posici�n de la @ respecto del valor ingresado
   * en el campo "email". Si no hay ninguna @, en vez de devolver la
   * posici�n de la misma devuelve -1. 
   */
  var apos=document.getElementById(idCampo).value.indexOf("@");
  /* "puntopos" guarda la posici�n de la �ltima aparici�n de un punto
   * en el valor ingresado en el campo "email".
   */
  var puntopos=document.getElementById(idCampo).value.lastIndexOf(".");
  //"long" es la longitud en caracteres del valor ingresado en "email"
  var long=document.getElementById(idCampo).value.length;
  /* Si el email empieza con @, o entre la @ y el �ltimo punto hay menos de un caracter,
   * o si el �nico punto est� en el primer caracter, o si el �ltimo punto est�
   * en el �ltimo caracter, ser� un email inv�lido.
   */
  return (apos<1 || puntopos-apos<2 || puntopos<1 || puntopos==long-1) 
 
}

function opcionElegidaIgualA(idCampo,valorOpcion) {
  var select = document.getElementById(idCampo);
  return select.options[select.selectedIndex].value==valorOpcion;
}

function opcionVaciaEstaSeleccionada(idCampo) {
  var select = document.getElementById(idCampo);
  return select.options[select.selectedIndex].value=="";
}

function validarTextVacio(idCampo,mensajeDeError) {
  if(tieneValorVacio(idCampo)) {
    campoError(idCampo,mensajeDeError);
    return false;
  } else {
    campoCorrecto(idCampo);
    return true;
  }
}

function validarTextLongitud(idCampo,longitud,mensajeDeError) {
  if(excedeLimiteDeCaracteres(idCampo,longitud)) {
    campoError(idCampo,mensajeDeError);
   return false;
  } else {
    campoCorrecto(idCampo);
    return true;
  }
}

function validarTextNumerico(idCampo,mensajeDeError) {
  if(noEsCampoNumerico(idCampo)) {
    campoError(idCampo,mensajeDeError);
   return false;
  } else {
    campoCorrecto(idCampo);
    return true;
  }
}

function validarTextEmail(idCampo,mensajeDeError) {
  if(esEmailValido(idCampo)) {
    campoError(idCampo,mensajeDeError);
   return false;
  } else {
    campoCorrecto(idCampo);
    return true;
  }
}

function validarSelectVacio(idCampo,mensajeDeError) {
  if(opcionVaciaEstaSeleccionada(idCampo)) {
    campoError(idCampo,mensajeDeError);
   return false;
  } else {
    campoCorrecto(idCampo);
    return true;
  }
}

function validarRadioChequeado(nameCampo,mensajeDeError) {
  var radios=document.getElementsByName(nameCampo);
  for (i=0;i<radios.length;i++) {
    //Preguntamos por cada radiobutton
    //si est� chequeado o no.
    if (radios[i].checked) {
      campoCorrecto(radios[radios.length-1].id);
      //Si est� chequeado, ya podemos decir que hay uno chequeado
      return true;
    }
  }
  //Si en todo el recorrido del for no se encontr� a ning�n 
  //radiobutton marcado, se devuelve false}
  campoError(radios[radios.length-1].id,mensajeDeError);
  return false;
}

var formularioOk = true;

function Validar(idFormulario) {  
  //Valido que el valor en el campo "nombre" no este vac�o
  if(validarTextVacio("nombre", "El campo Nombre es obligatorio")) {

    //Valido que el valor en el campo "nombre" no exceda los 15 caracteres
    validarTextLongitud("nombre",15,"El campo Nombre no puede exceder los 15 caracteres");
  }

  //Valido que el valor en el campo "apellido" no este vac�o
  if(validarTextVacio("apellido", "El campo Apellido es obligatorio")) {

    //Valido que el valor en el campo "apellido" no exceda los 15 caracteres
    validarTextLongitud("apellido",15,"El campo Apellido no puede exceder los 15 caracteres");
  }

  //Valido que el valor en el campo "edad" no este vac�o
  if(validarTextVacio("edad", "El campo Edad es obligatorio")) {

    //Valido que el valor en el campo "edad" sea un valor num�rico
    validarTextNumerico("edad","El campo Edad debe tener un valor num�rico");
  }
  //Valido que el valor en el campo "email" no este vac�o
  if(validarTextVacio("email", "El campo E-mail es obligatorio")) {
    
    //Valido que el valor en el campo "email" sea un email v�lido
    validarTextEmail("email","El campo E-mail debe tener un e-mail v�lido");
  }

  //Valido que se haya seleccionado una opci�n en el select "estadocivil" que no sea la predeterminada (vac�a)
  validarSelectVacio("estadocivil","Debe elegir una opci�n de Estado Civil");

  //Si la opcion elegida del Estado Civil es Casado, hay que validar el nombre del conyuge
  if(opcionElegidaIgualA("estadocivil","C")) {
    //Valido que el valor en el campo "apellido" no este vac�o
    validarTextVacio("conyuge", "El campo Nombre del C�nyuge es obligatorio");
  }
  
  //Valido que se haya elegido un radiobutton de las Horas frente a la PC
  validarRadioChequeado("horas","Debe elegir una opci�n para las Horas frente a la PC");

  //Si el checkbox de "Tengo una cuenta de usuario" est� chequeado, valido que el campo username no est� vac�o
  if(estaChequeado("usuario")) {
     validarTextVacio("username", "El campo Username es obligatorio");
  }

  if(formularioOk) document.getElementById(idFormulario).submit();
  else formularioOk = true;
}

//Esta funci�n habilita el campo "username" en caso de que el
//usuario indique que tiene cuenta de usuario, si no lo
//indica se deshabilita el campo "username"
function habilitarUsername() {
	if(estaChequeado("usuario")){
	//Habilito el campo "username"
		document.getElementById("username").disabled=false;
	} else {
	//Deshabilito el campo "username"
		document.getElementById("username").disabled=true;
	}
}

//Esta funci�n despliega un campo de texto para ingresar el
//nombre del c�nyuge en caso de que se elija "Casado" en el select "estadocivil"
function desplegarCampoConyuge(){
  if(OpcionElegidaIgualA("estadocivil","C")){
  document.getElementById("divescondido").innerHTML='<label>Nombre del c�nyuge: <input type="text" name="conyuge" id="conyuge"></label>';
  }
  else {
  document.getElementById("divescondido").innerHTML="";
  }
}


function campoError(idCampo,mensajeDeError) {
	var campo = document.getElementById(idCampo);
	//Al campo le cambio la clase CSS para que se muestre en rojo
	if(campo.className!="campoError") {
    campo.className="campoError";
    //Agrego el mensaje de error al lado del campo
    error = document.createElement('span');
    error.appendChild(document.createTextNode(mensajeDeError));
    campo.parentNode.appendChild(error);
   }
   formularioOk = false;
}

function campoCorrecto(idCampo) {
  var campo = document.getElementById(idCampo);
	//Al campo le cambio la clase CSS para que se muestre con borde verde
	if(campo.className=="campoError") {
    campo.className="campoCorrecto";
    //Remuevo el mensaje de error
    campo.parentNode.removeChild(campo.parentNode.lastChild);
   }
}
