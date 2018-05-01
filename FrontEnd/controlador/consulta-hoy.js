$("#nav-item-consulta").addClass("active");


function agregarFilaTabla(respuesta){
	for (var i = 0; i < respuesta.length; i++) {
	  consulta = respuesta[i];
	  var fila =
	  "<tr>"+
	  "  <td>"+consulta.FECHA_HORA+"</td>"+
	  "  <td>"+consulta.CENTRO_MEDICO+"</td>"+
	  "  <td>"+consulta.PISO+"</td>"+
	  "  <td>"+consulta.P_NOMBRE+
		" "+consulta.S_NOMBRE+
		" "+consulta.P_APELLIDO+
		" "+consulta.S_APELLIDO+"</td>"+
	  "  <td>"+consulta.MEDICO+"</td>"+
	  "  <td>"+consulta.ESPECIALIDAD+"</td>"+
	  "  <td>"+consulta.SINTOMAS+"</td>"+
	  "  <td>"+consulta.DIAGNOSTICO+"</td>"+
	  "</tr>";
	  $("#tbl-consulta tbody").append(fila);
	}
}

function cargaTabla(){
	$.ajax({
  		url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
  		method:'POST',
  		dataType:'JSON',
  		data:{
  		  'accion':'listarPorHoy',
  		},
	  success:function(respuesta){
	    $("#tbl-consulta tbody").empty();
	    agregarFilaTabla(respuesta);
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
	cargaTabla();
});


$(document).ready(function(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Edificio.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarPorCentro',
	    // 'idCentroMedico': 1,
	    'idCentroMedico': $("#txt-id-centro-medico").val(),
	    'nombreCentro': 'hospital',
	  },
	  success:function(respuesta){
	    for (var i = 0; i < respuesta.length; i++) {
	    	var edificio = respuesta[i];
	    	var fila = '<option value="'+edificio.ID_EDIFICIO+'">'+edificio.EDIFICIO+'</option>';
	    	$("#slc-edificio").append(fila);
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

$("#slc-edificio").on("change", function(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Edificio.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarPisos',
	    'idCentroMedico': $("#txt-id-centro-medico").val(),
	    // 'idCentroMedico': 1,
	    'idEdificio': $("#slc-edificio").val(),
	  },
	  success:function(respuesta){
	  	$("#slc-piso").empty();
	    for (var i = 0; i < respuesta.length; i++) {
	    	var piso = respuesta[i];
	    	var fila = '<option value="'+piso.ID_PISO+'">'+piso.DESCRIPCION+'</option>';
	    	$("#slc-piso").append(fila);
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


$("#slc-piso").on("click", function(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Consultorio.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarPorPiso',
	    'idPiso': $("#slc-piso").val(),
	  },
	  success:function(respuesta){
	  	$("#slc-consultorio").empty();
	    for (var i = 0; i < respuesta.length; i++) {
	    	var conslt = respuesta[i];
	    	var fila = '<option value="'+conslt.ID_CONSULTORIO+'">'+conslt.ID_CONSULTORIO+'</option>';
	    	$("#slc-consultorio").append(fila);
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


function buscar(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarDiariasPorConsultorio',
	    'idConsultorio': $("#slc-consultorio").val(),
	  },
	  success:function(respuesta){
	  	$("#tbl-consulta tbody").empty();
	    agregarFilaTabla(respuesta);
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
}

function limpiar(){
	cargaTabla();
}