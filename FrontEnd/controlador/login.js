function login (){
	var email = $("#txt-email").val();
	var pass = $("#txt-password").val();
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Usuario.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'login',
	    'correo': email,
	    'contrasena': pass,
	  },
	  success:function(respuesta){
	    if (respuesta.resultado==true) {
	    	location.href="index.php";
	    }else{
	    	alert(respuesta.mensaje)
	    }
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
}

$(document).ready(function(){
	$("#txt-password").on("keyup",function(e){
		console.log(e.keyCode);
		if (e.keyCode==13){
			login();
		}
	});
});


function registrar(){
	var primerNombre = $("#txt-primer-nombre").val();
	var segundoNombre = $("#txt-segundo-nombre").val();
	var primerApellido = $("#txt-primer-apellido").val();
	var segundoApellido = $("#txt-segundo-apellido").val();
	var noIdentidad = $("#txt-no-identidad").val();
	var sexo = $("#slc-sexo").val();
	var pais = $("#slc-pais").val();
	var direccion = $("#txt-direccion").val();
	var tipoUsuario = $("#slc-tipo-usuario").val();
	var nombreCentro = $("#txt-nombre-centro").val();
	var tipoCentro = $("#slc-tipo-centro-medico").val();
	var direccionCentro = $("#txt-direccion-centro").val();
	var correo = $("#txt-correo").val();
	var contra1 = $("#txt-contra").val();
	var contra2 = $("#txt-contra2").val();

	if(contra1 != contra2){
		alert("Las contraseñas no coinciden");
	}else{
		$.ajax({
		  url:CONST_SITIO_URL+'/services/Usuario.php',
		  method:'POST',
		  dataType:'JSON',
		  data:{
		    'accion':'registrar',
		    'idPais': pais,
		    'noIdentidad': noIdentidad,
		    'nombreCentroMedico': nombreCentro,
		    'pNombre': primerNombre,
		    'sNombre': segundoNombre,
		    'sApellido': segundoApellido,
		    'idTipoUsuario': tipoUsuario,
		    'direccion': direccion,
		    'correo': correo,
		    'idTipoCentroMedico': tipoCentro,
		    'pApellido': primerApellido,
		    'contrasena': contra1,
		    'sexo': sexo,
		    'direccionCentroMedico': direccionCentro,
		  },
		    success:function(respuesta){
		      alert(respuesta.mensaje);
		      $("#modal-editar").modal("hide");
		    },
		    error: function(error){
		      console.log(error);
		    },
		    complete: function(){
		      //TO-DO
		    }
		  });
	}
}


$(document).ready(function(){

$.ajax({
  url:CONST_SITIO_URL+'/services/Persona.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPais',
  },
  success:function(respuesta){
    for (var i = 0; i < respuesta.length; i++) {
    	var pais = respuesta[i];
    	var fila = '<option value="'+pais.ID_PAIS+'">'+pais.NOMBRE+'</option>';
    	$("#slc-pais").append(fila);
    }
  },
  error: function(error){
    console.log(error);
  },
  complete: function(){
    //TO-DO
  }
});
})


$(document).ready(function(){

$.ajax({
  url:CONST_SITIO_URL+'/services/CentroMedico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarTipos',
  },
  success:function(respuesta){
    for (var i = 0; i < respuesta.length; i++) {
    	var tipo = respuesta[i];
    	var fila = '<option value="'+tipo.ID_TIPO_CENTRO+'">'+tipo.DESCRIPCION+'</option>';
    	$("#slc-tipo-centro-medico").append(fila);
    }
  },
  error: function(error){
    console.log(error);
  },
  complete: function(){
    //TO-DO
  }
});
})



$(document).ready(function(){

$.ajax({
  url:CONST_SITIO_URL+'/services/Usuario.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarTipos',
  },
  success:function(respuesta){
    for (var i = 0; i < respuesta.length; i++) {
    	var tipo = respuesta[i];
    	var fila = '<option value="'+tipo.ID_TIPO_USUARIO+'">'+tipo.TIPO+'</option>';
    	$("#slc-tipo-usuario").append(fila);
    }
  },
  error: function(error){
    console.log(error);
  },
  complete: function(){
    //TO-DO
  }
});
})