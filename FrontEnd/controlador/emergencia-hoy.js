$("#nav-item-emergencia").addClass("active");


function agregarFilaTablaEmergenciaHoy(respuesta){
	$("#tbl-emergencia tbody").empty();
	for (var i = 0; i < respuesta.length; i++) {
		var e = respuesta[i];
		var fila = 
		"<tr>"+
		"  <td>"+e.ID_INGRESO+"</td>"+
		"  <td>"+e.OBSERVACION+"</td>"+
		"  <td>"+e.FECHA_HORA_ATENCION+"</td>"+
		"  <td>"+e.P_NOMBRE+"</td>"+
		"  <td>"+e.S_NOMBRE+"</td>"+
		"  <td>"+e.P_APELLIDO+"</td>"+
		"  <td>"+e.S_APELLIDO+"</td>"+
		"  <td>"+e.NO_IDENTIDAD+"</td>"+
		"</tr>"
		$("#tbl-emergencia tbody").append(fila);
	}
}

function cargaTablaEmergenciaHoy(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Emergencia.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
   		'accion':'listarPorHoy',
	  },
	  success:function(respuesta){
	  	console.log(respuesta);
	  	agregarFilaTablaEmergenciaHoy(respuesta);
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
	cargaTablaEmergenciaHoy();
});


function buscar(){
	var criterio = $("#slc-filtro-e").val();
	var valor = $("#txt-busqueda").val();
	switch(criterio){
		case '1': 
			$.ajax({
			  url:CONST_SITIO_URL+'/services/Emergencia.php',
			  method:'POST',
			  dataType:'JSON',
			  data:{
			    'accion':'buscarPorNombre',
			    'pNombre': valor,
			    'sNombre': valor,
			  },
			  success:function(respuesta){
			    agregarFilaTablaEmergencia(respuesta);
			  },
			  error: function(error){
			    console.log(error);
			  },
			  complete: function(){
			    //TO-DO
			  }
			});
		break;
		case '2': 
			$.ajax({
			  url:CONST_SITIO_URL+'/services/Emergencia.php',
			  method:'POST',
			  dataType:'JSON',
			  data:{
			    'accion':'buscarPorApellido',
			    'sApellido': valor,
			    'pApellido': valor,
			  },
			  success:function(respuesta){
			    agregarFilaTablaEmergencia(respuesta);
			  },
			  error: function(error){
			    console.log(error);
			  },
			  complete: function(){
			    //TO-DO
			  }
			});
		break;
		case '3': 
			$.ajax({
			  url:CONST_SITIO_URL+'/services/Emergencia.php',
			  method:'POST',
			  dataType:'JSON',
			  data:{
			    'accion':'buscarPorNoIdentidad',
			    'noIdentidad': valor,
			  },
			  success:function(respuesta){
			    agregarFilaTablaEmergencia(respuesta);
			  },
			  error: function(error){
			    console.log(error);
			  },
			  complete: function(){
			    //TO-DO
			  }
			});
		break;
	}

}