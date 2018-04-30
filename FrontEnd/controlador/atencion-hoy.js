$("#nav-item-emergencia").addClass("active")


function agregarFilaTablaAPHoy(respuesta){
	$("#tbl-aph tbody").empty();
	for (var i = 0; i < respuesta.length; i++) {
		var aph = respuesta[i];
		var fila = 
		"<tr>"+
		"  <td>"+aph.FECHA_HORA_ATENCION+"</td>"+
		"  <td>"+aph.ID_ATENCION+"</td>"+
		"  <td>"+aph.PLACA+"</td>"+
		"  <td>"+aph.ID_CENTRO_MEDICO+"</td>"+
		"  <td>"+aph.OBSERVACION+"</td>"+
		"  <td>"+aph.P_NOMBRE+"</td>"+
		"  <td>"+aph.S_NOMBRE+"</td>"+
		"  <td>"+aph.P_APELLIDO+"</td>"+
		"  <td>"+aph.S_APELLIDO+"</td>"+
		"  <td>"+aph.NO_IDENTIDAD+"</td>"+
		"  <td>"+aph.SEXO+"</td>"+
		"  <td>"+aph.ID_PARAMEDICO+"</td>"+
		"</tr>"
		$("#tbl-aph tbody").append(fila);
	}
}

function cargaTablaAPHoy(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/AtencionPreHospitalaria.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	     'accion':'listarPorCentroDiarias',
   		 'idCentroMedico': $("#txt-id-centro-medico").val(),
   		 // 'idCentroMedico': 1,

	  },
	  success:function(respuesta){
	  	console.log(respuesta);
	  	agregarFilaTablaAPHoy(respuesta);
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
	cargaTablaAPHoy();
});


function buscar(){
	var criterio = $("#slc-filtro-aph").val();
	var valor = $("#txt-busqueda").val();
	switch(criterio){
		case '1': 
			$.ajax({
			  url:CONST_SITIO_URL+'/services/AtencionPreHospitalaria.php',
			  method:'POST',
			  dataType:'JSON',
			  data:{
			    'accion':'buscarPorNombre',
			    'pNombre': valor,
			    'sNombre': valor,
			  },
			  success:function(respuesta){
			    agregarFilaTablaAPHoy(respuesta);
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
			  url:CONST_SITIO_URL+'/services/AtencionPreHospitalaria.php',
			  method:'POST',
			  dataType:'JSON',
			  data:{
			    'accion':'buscarPorApellido',
			    'sApellido': valor,
			    'pApellido': valor,
			  },
			  success:function(respuesta){
			    agregarFilaTablaAPHoy(respuesta);
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
			  url:CONST_SITIO_URL+'/services/AtencionPreHospitalaria.php',
			  method:'POST',
			  dataType:'JSON',
			  data:{
			    'accion':'buscarPorNoIdentidad',
			    'noIdentidad': valor,
			  },
			  success:function(respuesta){
			    agregarFilaTablaAPHoy(respuesta);
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