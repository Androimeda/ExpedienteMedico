$("#nav-item-consulta").addClass("active");


var paciente = null;
var medico = null;

function limpiar(){
  $('#tbl-resultado tbody').empty();
  $('#txt-noidentidad').val("");
}

function buscar(){
  var valor = $("#txt-noidentidad").val();
  $.ajax({
    url:CONST_SITIO_URL+'/services/Paciente.php',
    method:'POST',
    dataType:'JSON',
    data:{
   'accion':'buscarPorNoIdentidad',
   'noIdentidad': valor,
    },
    success:function(respuesta){
   agregarFilaTablaBusqueda(respuesta);
   paciente = respuesta;
    },
    error: function(error){
   console.log(error);
    },
    complete: function(){
   //TO-DO
    }
  });
}

function agregarFilaTablaBusqueda(respuesta){
  $("#tbl-resultado tbody").empty();
  for (var i = 0; i < respuesta.length; i++) {
    var paciente = respuesta[i];
    var fila = 
    "<tr>"+
    "  <td>"+paciente.ID_EXPEDIENTE+"</td>"+
    "  <td>"+paciente.P_NOMBRE+" "+paciente.S_NOMBRE+" "+paciente.P_APELLIDO+" "+paciente.S_APELLIDO+"</td>"+
    "  <td>"+paciente.NO_IDENTIDAD+"</td>"+
    '  <td>'+
     '<button onclick="seleccionar('+i+')" class="btn btn-default btn-md">'+
    '<span class="glyphicon glyphicon-ok"></span> &nbsp; Seleccionar'+
     '</button>'+
   "</td>"+
    "</tr>";
    $("#tbl-resultado tbody").append(fila);
  }
}

function seleccionar(i){
	limpiar();
	var p = paciente[i];
	$("#txt-id-expediente").val(p.ID_EXPEDIENTE);
}


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
	  	console.log(respuesta);
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


function limpiarTablaMedico(){
  $('#tbl-resultado-medico tbody').empty();
  $('#txt-noidentidad-medico').val("");
}

function buscarMedico(){
  var valor = $("#txt-noidentidad-medico").val();
  $.ajax({
    url:CONST_SITIO_URL+'/services/Medico.php',
    method:'POST',
    dataType:'JSON',
    data:{
   'accion':'buscarPorNoIdentidad',
   'noIdentidad': $("#txt-noidentidad-medico").val(),
    },
    success:function(respuesta){
   console.log(respuesta);
   agregarFilaTablaBusquedaMedico(respuesta);
   medico=respuesta;
    },
    error: function(error){
   console.log(error);
    },
    complete: function(){
   //TO-DO
    }
  });
}

function agregarFilaTablaBusquedaMedico(respuesta){
  $("#tbl-resultado-medico tbody").empty();
  for (var i = 0; i < respuesta.length; i++) {
    var medico = respuesta[i];
    var fila = 
    "<tr>"+
    "  <td>"+medico.NO_COLEGIACION+"</td>"+
    "  <td>"+medico.P_NOMBRE+" "+medico.S_NOMBRE+" "+medico.P_APELLIDO+" "+medico.S_APELLIDO+"</td>"+
    "  <td>"+medico.NO_IDENTIDAD+"</td>"+
    '  <td>'+
     '<button onclick="seleccionarMedico('+i+')" class="btn btn-default btn-md">'+
    '<span class="glyphicon glyphicon-ok"></span> &nbsp; Seleccionar'+
     '</button>'+
   "</td>"+
    "</tr>";
    $("#tbl-resultado-medico tbody").append(fila);
  }
}

function seleccionarMedico(i){
	limpiarTablaMedico();
	var m = medico[i];
	$("#txt-id-medico").val(m.ID_MEDICO);
}


function registrar(){
	var fecha = $("#txt-fecha").val()
	var hora = $("#txt-hora").val()
	var idExpediente= $("#txt-id-expediente").val();
	var idMedico= $("#txt-id-medico").val();
	var idConsultorio = $("#slc-consultorio").val();
	var sintomas = $("#txt-sintomas").val();
	var diagnostico = $("#txt-diagnostico").val();
	var observacion = $("#txt-observacion").val();
	var fecha_hora = parseFecha(fecha, hora);
	$.ajax({
	  url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'crear',
	    'idMedico': idMedico,
	    'idConsultorio': idConsultorio,
	    'diagnostico': diagnostico,
	    'sintomas': sintomas,
	    'idExpediente': idExpediente,
	    'observacion': observacion,
	    'fechaHora': fecha_hora,
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