$("#nav-item-paciente").addClass("active");



function registrar(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Paciente.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'crear',
	    'idTipoSangre': null,
	    'idPais': null,
	    'noIdentidad': null,
	    'pNombre': null,
	    'idAscendencia': null,
	    'sNombre': null,
	    'sApellido': null,
	    'idEstadoCivil': null,
	    'direccion': null,
	    'correo': null,
	    'idOcupacion': null,
	    'idEscolaridad': null,
	    'pApellido': null,
	    'sexo': null,
	  },
	  success:function(respuesta){
	    console.log(respuesta);
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