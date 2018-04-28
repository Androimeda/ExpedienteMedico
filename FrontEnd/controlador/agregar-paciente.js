$("#nav-item-paciente").addClass("active");



function registrar(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Paciente.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'crear',
	    'idTipoSangre': $("#slc-tipo-sangre").val(),
	    'idPais': $("#slc-pais").val(),
	    'noIdentidad': $("#txt-noidentidad").val(),
	    'pNombre': $("#txt-pnombre").val(),
	    'idAscendencia': $("#slc-ascendencia").val(),
	    'sNombre': $("#txt-snombre").val(),
	    'sApellido': $("#txt-sapellido").val(),
	    'idEstadoCivil': $("#slc-estado-civil").val(),
	    'direccion': $("#txt-direccion").val(),
	    'correo': $("#txt-email").val(),
	    'idOcupacion': $("#slc-ocupacion").val(),
	    'idEscolaridad': $("#slc-escolaridad").val(),
	    'pApellido': $("#txt-papellido").val(),
	    'sexo': $("input[name='rbt-sexo']:checked").val(),
	  },
	  success:function(respuesta){
	    alert(respuesta.mensaje);
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
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Persona.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarEscolaridad',
	  },
	  success:function(respuesta){
	    for (var i = 0; i < respuesta.length; i++) {
	    	var esc = respuesta[i];
	    	var fila = '<option value="'+esc.ID_ESCOLARIDAD+'">'+esc.ESCOLARIDAD+'</option>';
	    	$("#slc-escolaridad").append(fila);
	    }
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});

});

$(document).ready(function () {
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Persona.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarEstadoCivil',
	  },
	  success:function(respuesta){
	    for (var i = 0; i < respuesta.length; i++) {
	    	var est = respuesta[i];
	    	var fila = '<option value="'+est.ID_ESTADO_CIVIL+'">'+est.ESTADO_CIVIL+'</option>';
	    	$("#slc-estado-civil").append(fila);
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

$(document).ready(function() {
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Persona.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarOcupacion',
	  },
	  success:function(respuesta){
	    for (var i = 0; i < respuesta.length; i++) {
	    	var ocup = respuesta[i];
	    	var fila = '<option value="'+ocup.ID_OCUPACION+'">'+ocup.OCUPACION+'</option>';
	    	$("#slc-ocupacion").append(fila);
	    }
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
});

$(document).ready(function(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Persona.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarTipoSangre',
	  },
	  success:function(respuesta){
	    for (var i = 0; i < respuesta.length; i++) {
	    	var tipo = respuesta[i];
	    	var fila = '<option value="'+tipo.ID_TIPO_SANGRE+'">'+tipo.GRUPO+' '+tipo.RH+'</option>';
	    	$("#slc-tipo-sangre").append(fila);
	    }
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
});
$(document).ready(function(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Persona.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarAscendencia',
	  },
	  success:function(respuesta){
	    for (var i = 0; i < respuesta.length; i++) {
	    	var asce = respuesta[i];
	    	var fila = '<option value="'+asce.ID_ASCENDENCIA+'">'+asce.ASCENDENCIA+'</option>';
	    	$("#slc-ascendencia").append(fila);
	    }
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
});

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