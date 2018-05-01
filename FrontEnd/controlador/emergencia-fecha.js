$("#nav-item-emergencia").addClass("active");


function agregarFilaTablaEmergencia(respuesta){
	$("#tbl-emergencia tbody").empty();
	for (var i = 0; i < respuesta.length; i++) {
		var E = respuesta[i];
		var fila = 
		"<tr>"+
		"  <td>"+E.ID_CENTRO_MEDICO+"</td>"+
		"  <td>"+E.ID_INGRESO+"</td>"+
		"  <td>"+E.OBSERVACION+"</td>"+
		"  <td>"+E.FECHA_HORA_ATENCION+"</td>"+
		"  <td>"+E.P_NOMBRE+"</td>"+
		"  <td>"+E.S_NOMBRE+"</td>"+
		"  <td>"+E.P_APELLIDO+"</td>"+
		"  <td>"+E.S_APELLIDO+"</td>"+
		"  <td>"+E.NO_IDENTIDAD+"</td>"+
		"</tr>"
		$("#tbl-emergencia tbody").append(fila);
	}
}

function cargaTablaEmergenciaFecha(){
	var fecha_hora = parseFecha($("#txt-fecha").val(), "00:00");
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Emergencia.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
   		 'accion':'listarPorCentroFecha',
   		 'idCentroMedico': $("#txt-id-centro-medico").val(),
   		 'fechaHoraAtencion': fecha_hora,
	    
	     // no se que carajo ponerle acá
	     // Aquí va algo que estoy usando con esos
	     //kha?
	  },
	  success:function(respuesta){
	  	console.log(respuesta);
	  	agregarFilaTablaEmergencia(respuesta);
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
}

$("#txt-fecha").on("change", function(){
cargaTablaEmergenciaFecha();
});

$(document).ready(function(){
	cargaTablaEmergenciaFecha();
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