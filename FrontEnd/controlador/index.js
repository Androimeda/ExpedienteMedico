$("#nav-item-inicio").addClass("active");

$(document).ready(function(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Estadisticas.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'medicos',
	  },
	  success:function(respuesta){
	    $("#medicos p").html(respuesta[0].TOTAL)
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});


	$.ajax({
	  url:CONST_SITIO_URL+'/services/Estadisticas.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'centros',
	  },
	  success:function(respuesta){
	    $("#centro p").html(respuesta[0].TOTAL)
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});


	$.ajax({
	  url:CONST_SITIO_URL+'/services/Estadisticas.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'pacienteMax',
	  },
	  success:function(respuesta){
	  	paciente = respuesta[0];
	    $("#nombre").html(
	    	paciente.P_NOMBRE+" "+
	    	paciente.S_NOMBRE+" "+
	    	paciente.P_APELLIDO+" "+
	    	paciente.S_APELLIDO
	    );
	    $("#total").html(paciente.TOTAL);
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});

});