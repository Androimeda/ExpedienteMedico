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
	  '  	<td><button onclick="editar('+consulta.ID_CONSULTA+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
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
	  	$("#slc-consultorio").append("<option value='' hidden=''>Consultorio</option>");
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
	$("#slc-edificio").val("");
	$("#slc-piso").val("");
	$("#slc-consultorio").val("");
}


function editar(id) {
	$("#modal-editar").modal("show");
	$("#txt-id-consulta").val(id);
	$.ajax({
	  url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listar',
	    'idConsulta': id,
	  },
	  success:function(respuesta){
	  	console.log(respuesta)
	  	consulta = respuesta[0];
	  	$("#txt-nombre").val(
	  		consulta.P_NOMBRE	
	  		+" "+consulta.S_NOMBRE
	  		+" "+consulta.P_APELLIDO	
	  		+" "+consulta.S_APELLIDO
	  	);
	  	$("#txt-medico").val(consulta.MEDICO);
	  	$("#txt-especialidad").val(consulta.ESPECIALIDAD);
	  	$("#txt-noidentidad").val(consulta.NO_IDENTIDAD);
	  	$("#txt-noidentidad").val(consulta.NO_IDENTIDAD);
	    $("#txt-id-expediente").val(consulta.ID_EXPEDIENTE);
	    $("#txt-id-medico").val(consulta.ID_MEDICO);
	    $("#txt-consultorio").val(consulta.ID_CONSULTORIO);
	    $("#txt-fecha").val(consulta.FECHA_HORA);
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
}

function actualizar(){
	var idMedico= $("#txt-id-medico").val();
	var consultorio= $("#txt-consultorio").val();
	var diagnostico= $("#txt-diagnostico").val();
	var idConsulta= $("#txt-id-consulta").val();
	var sintomas= $("#txt-sintomas").val();
	var idExpediente= $("#txt-id-expediente").val();
	var observacion= $("#txt-observacion").val();
	var fechaHora= $("#txt-fecha").val();
	$.ajax({
	  url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'actualizar',
	    'idMedico': idMedico,
	    'idConsultorio': consultorio,
	    'diagnostico': diagnostico,
	    'idConsulta': idConsulta,
	    'sintomas': sintomas,
	    'idExpediente': idExpediente,
	    'observ': observ,
	    'fechaHora': fechaHora,
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