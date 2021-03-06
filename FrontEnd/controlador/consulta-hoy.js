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
	  '  <td>'+
	  		'<button onclick="editar('+consulta.ID_CONSULTA+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
	  	'</td>'+
	  '  <td>'+
	  '  	<button onclick="enfermedad('+consulta.ID_CONSULTA+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
	  	'</td>'+
	  '  <td>'+
	  '  	<button onclick="tratamiento('+consulta.ID_CONSULTA+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
	  	'</<td></td>>'+
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

function cargaTipoEnfermedad(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Enfermedad.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarTipoEnfermedad',
	  },
	  success:function(respuesta){
	    $("#slc-tipo-enfermedad").empty();
	    $("#slc-tipo-enfermedad").append("<option value='' hidden=''>Tipo Enfermedad</option>");
	    for (var i = 0; i < respuesta.length; i++) {
	    	var tipo = respuesta[i];
	    	var fila = 
	    	'<option value="'+tipo.ID_TIPO_ENFERMEDAD+'">'+tipo.DESCRIPCION+'</option>';
	    	$("#slc-tipo-enfermedad").append(fila);
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

function cargaEnfermedad(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Enfermedad.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarPorTipo',
	    'idTipoEnfermedad': $("#slc-tipo-enfermedad").val(),
	  },
	  success:function(respuesta){
	    $("#slc-enfermedad").empty();
	    $("#slc-enfermedad").append("<option value='' hidden=''>Tipo Enfermedad</option>");
	    for (var i = 0; i < respuesta.length; i++) {
	    	var enfe = respuesta[i];
	    	var fila = 
	    	'<option value="'+enfe.ID_ENFERMEDAD+'">'+enfe.ENFERMEDAD+'</option>';
	    	$("#slc-enfermedad").append(fila);
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

$("#slc-tipo-enfermedad").on("change",function(){
	cargaEnfermedad();
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
	    $("#txt-diagnostico").val(consulta.DIAGNOSTICO);
	    $("#txt-sintomas").val(consulta.SINTOMAS);
	    $("#txt-observacion").val(consulta.OBSERVACION);
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
	    'observacion': observacion,
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

function enfermedad(id){
	$("#txt-id-consulta").val(id);
	$("#modal-enfermedad").modal("show");
	cargaTipoEnfermedad();
}


function diagnostico(){
	var idConsulta= $("#txt-id-consulta").val();
	var idEnfermedad= $("#slc-enfermedad").val();
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Enfermedad.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'diagnosticarEnfermedad',
	    'idConsulta': idConsulta,
	    'idEnfermedad': idEnfermedad,
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

function tratamiento(id){
	$("#modal-tratamiento").modal("show");
	$("#txt-id-consulta").val(id);
	cargaTratamiento();
	cargarViaSuministro();
}

function cargaTratamiento(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Tratamiento.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarTipoTratamiento',
	  },
	  success:function(respuesta){
	  	$("#slc-tipo-tratamiento").empty();
	  	$("#slc-tipo-tratamiento").append('<option value="" hidden="">Tipo Tratamiento</option>');
	    for (var i = 0; i < respuesta.length; i++) {
	    	var tipo = respuesta[i];
	    	var fila ='<option value="'+tipo.ID_TIPO+'">'+tipo.TIPO_TRATAMIENTO+'</option>';
	    	$("#slc-tipo-tratamiento").append(fila);
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

function cargarViaSuministro(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Tratamiento.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarViaSuministro',
	  },
	  success:function(respuesta){
	  	console.log(respuesta);
	  	$("#slc-via-suministro").empty();
	  	$("#slc-via-suministro").append('<option value="" hidden="">Via Suministro</option>');
	    for (var i = 0; i < respuesta.length; i++) {
	    	var via = respuesta[i];
	    	var fila = '<option value="'+via.ID_VIA_SUMINISTRO+'">'+via.VIA_SUMINISTRO+'</option>';
	  		$("#slc-via-suministro").append(fila);
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

function recetar(){
	console.log($("#txt-dosis").val());
	console.log($("#slc-tipo-tratamiento").val());
	console.log($("#txt-intervalo").val());
	console.log($("#txt-id-consulta").val());
	console.log($("#slc-via-suministro").val());
	console.log($("#txt-duracion").val());
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Tratamiento.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'recetar',
	    'dosis': $("#txt-dosis").val(),
	    'idTipoTratamiento': $("#slc-tipo-tratamiento").val(),
	    'intervaloTiempo': $("#txt-intervalo").val() +" horas",
	    'idConsulta': $("#txt-id-consulta").val(),
	    'idViaSuministro': $("#slc-via-suministro").val(),
	    'duracionTratamiento': $("#txt-duracion").val() +" meses",
	  },
	  success:function(respuesta){
	    alert(respuesta.mensaje)
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
}