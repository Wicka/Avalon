
//VERIFICACION DE QUE LOS CAMPOS ESTAN RELLENADOS Y CON LOS PARAMETROS QUE QUIERO

	//************************LOGIN*****************/
	//******FUNCIONES USADAS EN INDEX Y EN ALTAS****/
	//**********************************************/
function rellena_alias(){

				var alias = document.getElementById("alias").value;
				if (alias == "") {
						document.getElementById("message_nick").innerHTML = "Escribe tu nick!";
					}else{
							document.getElementById("message_nick").innerHTML = "";
							return true;
					}
}


function rellena_login_password(){
		var pwd = document.getElementById("pwd").value;
		if (pwd == "") {
				document.getElementById("message_pwd").innerHTML = "Escribe la Contraseña!";
				}else{
							document.getElementById("message_pwd").innerHTML = "";
							return true
			}
}

function valida_login(){
	if (rellena_alias() && rellena_password()){
		//	AMBOS CAMPOS RELLENADOS SIN ERRORES
		console.log("true");
		return true;
	}else{
		//	CAMPOS SIN RELLENAR
		return false;
	}
}

	//************************LOGIN*****************/
	//******FUNCIONES USADAS PARA ALTAS Y EDITAR ****/
	//**********************************************/

function check_alias() {
		var resultat =  $.ajax({ //ajax
				url: "../verificaciones/checkuser.php", //l'arxiu php que valida
				data: {alias:$("#alias").val()}, //el nom del campo post con el valor campo html
				type: "POST", //tipus d'enviament (POST)

				success: function(resposta){ //si es correcte la resposta de checkuser.php

						if (resposta == 0){ //si checkuser.php diu: 0 ES QUE NO HAY OTRO nick igual en tabla

									$("#message_nick").html(""); //limpio mensaje

						}else if(resposta == 1){	// si checkuser.php diu: 1 encontro un nick igual en tabla ya

									$("#message_nick").html("usuari " + $("#alias").val() + " no disponible"); //mostrem missatge
									document.getElementById("alias").value="";
						}
				},

				error:function (){
		      	$("#div_error").html("Ocurrio algo en la conexion a datos"); //
				}

	});
  console.log(resultat); //Muestro el objeto resultante
  return resultat;
}



function rellena_email(){
		var email = document.getElementById("email").value;

		if (email == "") {
				document.getElementById("message_email").innerHTML = "Escribe tu email !";
			}else{


					 if( validar_email( email ) )
					 {
							 document.getElementById("message_email").innerHTML = "";
							 return true;
					 }
					 else
					 {
							 document.getElementById("message_email").innerHTML = "Escribe tu email correctamente!";
					 }
				}
}


function check_email() {
		var resultat =  $.ajax({ //ajax
		url: "../verificaciones/checkemail.php", //l'arxiu php que valida
		data: {email:$("#email").val()}, //el nom de l'usuari
		type: "POST", //tipus d'enviament (POST)

		success: function(resposta){ //si es correcte la resposta de checkuser.php
			if (resposta == 0){ //si checkuser.php diu: 0 ES QUE NO HAY OTRO nick igual en tabla

				$("#message_email").html(""); //limpio missatge

			}else if (resposta == 1){	// si checkuser.php diu: 1 encontro un nick igual en tabla ya

				$("#message_email").html("email " + $("#email").val() + " no esta disponible"); //mostrem missatge
				document.getElementById("email").value="";
			}
		},
		error:function (){
      	$("#div_error").html("Ocurrio algo en la conexion a datos"); //
		}
	});
  console.log(resultat); //Muestro el objeto resultante
  return resultat;
}



function validar_email( email )
{
		var patron = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return patron.test(email) ? true : false;
}


function rellena_name(){
		var name = document.getElementById("name").value;

		if (name == "") {
				document.getElementById("message_name").innerHTML = "Escribe tu nombre!";
			}else{
					document.getElementById("message_name").innerHTML = "";
					return true;
				}
}

function rellena_surname_1(){
		var surname_1 = document.getElementById("surname_1").value;

		if (surname_1 == "") {
				document.getElementById("message_surname_1").innerHTML = "Escribe tu primer apellido!";
			}else{
					document.getElementById("message_surname_1").innerHTML = "";
					return true;
				}
}



function mostrar_menu(menu){
	console.log(menu);
	switch (menu) {

		case 'voluntario':

			if ( $("#voluntario").prop('checked') ){	

				$("#actividades").prop('checked',false);
				$("#seleccion_actividades").addClass("invisible");

			
				$("#seleccion_users").removeClass("invisible");
			}else{

				if ( $("#usuario").prop('checked')){

				}else{
					$("#seleccion_users").addClass("invisible");
				}			
			}		
			
		break;
		case 'usuario':	
		
			if ( $("#usuario").prop('checked') ){
				
				$("#actividades").prop('checked',false);
				$("#seleccion_actividades").addClass("invisible");

				
				$("#seleccion_users").removeClass("invisible");
			
			}else{

				if ( $("#voluntario").prop('checked')){

				}else{
					$("#seleccion_users").addClass("invisible");
				}

			}
			
		break;
		case 'actividades':	
		
			if ( $("#actividades").prop('checked') ){

						$("#voluntario").prop('checked',false); 
						$("#usuario").prop('checked',false); 					
						$("#seleccion_users").addClass("invisible");	

						$("#seleccion_actividades").removeClass("invisible");
			}else{

				$("#seleccion_actividades").addClass("invisible");
			}
				
		break;
				
		default:
		break;
	}
}

/**************************************************************/
/*NO ES CAMPO OBLIGATORIO
/*************************************************************/
/*
function rellena_surname_2(){
		var surname_2 = document.getElementById("surname_2").value;

		if (surname_2 == "") {
				document.getElementById("message_surname_2").innerHTML = "Escribe tu segundo apellido!";
				}else{
					document.getElementById("message_surname_2").innerHTML = "";
					return true;
				}
}
*/


function rellena_birth(){

		var birth = document.getElementById("birth").value;

		var hoy = new Date();
		var hoy_num		  = Date.parse(hoy);
		var birth_num 	= Date.parse(birth);
		var edad = hoy_num - birth_num;

		if (birth == "") {
				document.getElementById("message_birth").innerHTML = "Indica tu fecha nacimiento!";
				}else{
						if(edad <=0){
								document.getElementById("message_birth").innerHTML = "Fecha nacimiento incorrecta, No puede ser posterior a fecha de hoy";
								}else{
										document.getElementById("message_birth").innerHTML = "" ;
										return true;
									}
						}
}




function rellena_password(){

		var pwd = document.getElementById("pwd").value;

		if (pwd == "") {
				document.getElementById("message_pwd").innerHTML = "Escribe la Contraseña!";
				}else{

						if(pwd.length < 8) { //minimum 8 chars
								document.getElementById("message_pwd").innerHTML = "Minimo de 8 caracteres";
							}else{

									var letras = pwd.split("");
									var especiales = "[-’/`~!¡#*$@_%+=.,^&(){}[|;:<>?¿]";

									var icont_mayusculas = 0;
									var icont_minusculas = 0;
									var icont_numeros = 0;
									var icont_especiales = 0;


									for (i=0; i<letras.length; i++){

											if(!isNaN(letras[i])){
													icont_numeros++;
													console.log("caracter: " + letras[i] + " contador_NU " + icont_numeros);

													}else	if(especiales.includes(letras[i])) {
															icont_especiales++;
															console.log("caracter: " + letras[i] + " contador_SP " + icont_especiales);

															}else{

																	if(letras[i]===letras[i].toUpperCase()){
																			icont_mayusculas++;
																			console.log("caracter: " + letras[i] + " contador_Ma " + icont_mayusculas);
																		}

																	if(letras[i]===letras[i].toLowerCase()){
																			icont_minusculas++;
																			console.log("caracter: " + letras[i] + " contador_mi " + icont_minusculas);
																		}

															}

											}	//CIERRO EL FOR

										if (icont_mayusculas != 0 && icont_minusculas != 0 && icont_numeros != 0 && icont_especiales != 0){ //check if have nums, minus, mayus and specs
												document.getElementById("message_pwd").innerHTML = "";
												return true
											}else{ //shows error
													document.getElementById("message_pwd").innerHTML = "Ha de contener alguna Mayuscula, minusculas, algun numero y algun caracter especial";
												}
					  }//CIERRO ELSE DE MAYOR LONGITUD 8
			}//CIERRO ELSE DE COMPROBAR TODO
}


function rellena_password_2(){
		var pwd_1 = document.getElementById("pwd").value;
		var pwd_2 = document.getElementById("pwd_2").value;

		if (pwd_2 == "") {
					document.getElementById("message_pwd_2").innerHTML = "Repite la Contraseña!";
					}else if(pwd_2 != pwd_1){
							document.getElementById("message_pwd_2").innerHTML = "Las contraseñas no coinciden";
							}else{
									document.getElementById("message_pwd_2").innerHTML = "";
									return true;
				}
}



function valida_form(){
	if (rellena_alias()&& rellena_email() && rellena_name() && rellena_surname_1() && rellena_birth() && rellena_password() && rellena_password_2()){
		//	AMBOS CAMPOS RELLENADOS SIN ERRORES
		if (document.getElementById("politica").checked){
			return true;
		}else{
			alert("ACEPTA LA POLITICA DE DATOS");
			return false;
		}

	}else{
		//	CAMPOS SIN RELLENAR
		return false;
	}
}

function valida_pwd_nuevos(){
	if (rellena_password() && rellena_password_2()){
		//	AMBOS CAMPOS RELLENADOS SIN ERRORES
		return true;
	}else{
		//	CAMPOS SIN RELLENAR
		return false;
	}
}


///*************ACTIVIDADES/************** */ */

function rellena_nombre_actividad(){

	var nombre = document.getElementById("nombre_actividad").value;
	if (nombre == "") {
			document.getElementById("message_nombre_actividad").innerHTML = "Campo obligatorio";
		}else{
				document.getElementById("message_nombre_actividad").innerHTML = "";
				return true;
		}

}


function rellena_descripcion_actividad(){

	var nombre = document.getElementById("descripcion_actividad").value;
	if (nombre == "") {
			document.getElementById("message_descripcion_actividad").innerHTML = "Campo obligatorio";
		}else{
				document.getElementById("message_descripcion_actividad").innerHTML = "";
				return true;
		}

}


function rellena_direccion_actividad(){

	var nombre = document.getElementById("direccion").value;
	if (nombre == "") {
			document.getElementById("message_direccion").innerHTML = "Campo obligatorio";
		}else{
				document.getElementById("message_direccion").innerHTML = "";
				return true;
		}

}


function rellena_fecha_inicio(){

	var nombre = document.getElementById("fecha_inicio").value;
	if (nombre == "") {
			document.getElementById("message_fecha_inicio").innerHTML = "Campo obligatorio";
		}else{
				document.getElementById("message_fecha_inicio").innerHTML = "";
				return true;
		}

}

function rellena_hora_inicio(){

	var nombre = document.getElementById("hora_inicio").value;
	if (nombre == "") {
			document.getElementById("message_hora_inicio").innerHTML = "Campo obligatorio";
		}else{
				document.getElementById("message_hora_inicio").innerHTML = "";
				return true;
		}

}

function rellena_fecha_fin(){

	var nombre = document.getElementById("fecha_fin").value;
	if (nombre == "") {
			document.getElementById("message_fecha_fin").innerHTML = "Campo obligatorio";
		}else{
				document.getElementById("message_fecha_fin").innerHTML = "";
				return true;
		}

}

function rellena_hora_fin(){

	var nombre = document.getElementById("hora_fin").value;
	if (nombre == "") {
			document.getElementById("message_hora_fin").innerHTML = "Campo obligatorio";
		}else{
				document.getElementById("message_hora_fin").innerHTML = "";
				return true;
		}

}


function rellena_duracion(){

	var nombre = document.getElementById("duracion").value;
	if (nombre == "") {
			document.getElementById("message_duracion").innerHTML = "Campo obligatorio";
		}else{
				document.getElementById("message_duracion").innerHTML = "";
				return true;
		}

}



function rellena_num_participantes(){

	var nombre = document.getElementById("num_participantes").value;
	if (nombre == "") {
			document.getElementById("message_num_participantes").innerHTML = "Campo obligatorio";
		}else{
				document.getElementById("message_num_participantes").innerHTML = "";
				return true;
		}

}


function rellena_telefono(){

	var nombre = document.getElementById("telefono").value;
	if (nombre == "") {
			document.getElementById("message_telefono").innerHTML = "Campo obligatorio";
		}else{
				document.getElementById("message_telefono").innerHTML = "";
				return true;
		}

}





function valida_form_actividades(){
	if (rellena_nombre_actividad()&& rellena_descripcion_actividad() && rellena_direccion_actividad() && rellena_fecha_fin() && rellena_fecha_inicio() && rellena_duracion() && rellena_num_participantes() && rellena_telefono() && rellena_hora_inicio() && rellena_hora_fin()){
		//	AMBOS CAMPOS RELLENADOS SIN ERRORES
		if (document.getElementById("politica").checked){
			return true;
		}else{
			alert("ACEPTA LA POLITICA DE DATOS");
			return false;
		}

	}else{
		//	CAMPOS SIN RELLENAR
		return false;
	}
}

