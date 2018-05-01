$("#nav-item-emergencia").addClass("active");

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
	var idCentroMedico= $("#txt-centroMedico").val();
	var idMedico= $("#txt-id-medico").val();
	var idExpediente= $("#txt-id-expediente").val();
	var obs = $("#txt-observacion").val();
  var fecha = $("#txt-fecha").val();
  var hora = $("#txt-hora").val();
	var fecha_hora = parseFecha(fecha, hora); // Funcion ubicada en el archivo config.js
	
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Emergencia.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
		 'accion':'crear',
	    'idCentroMedico':idCentroMedico,
	    'idMedico':idMedico,
	    'idExpediente': idExpediente,
	    'observacion': obs,
	    'fechaHoraAtencion': fecha_hora,
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
