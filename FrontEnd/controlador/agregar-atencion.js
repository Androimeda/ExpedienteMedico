$("#nav-item-emergencia").addClass("active")

var paciente = null;
var paramedico = null;

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
    url:CONST_SITIO_URL+'/services/Ambulancia.php',
    method:'POST',
    dataType:'JSON',
    data:{
      'accion':'listarPorCentroMedico',
      'idCentroMedico': $("#txt-id-centro-medico").val(),
      'nombreCentro': 'hospital',
    },
    success:function(respuesta){
      for (var i = 0; i < respuesta.length; i++) {
        var ambulancia = respuesta[i];
        var fila = '<option value="'+ambulancia.ID_AMBULANCIA+'">'+ambulancia.PLACA+'</option>';
        $("#slc-ambulancia").append(fila);
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

function limpiarTablaParamedico(){
  $('#tbl-resultado-paramedico tbody').empty();
  $('#txt-noidentidad-paramedico').val("");
}

function buscarParamedico(){
  var valor = $("#txt-noidentidad-paramedico").val();
  $.ajax({
    url:CONST_SITIO_URL+'/services/Paramedico.php',
    method:'POST',
    dataType:'JSON',
    data:{
      'accion':'buscarPorNoIdentidad',
      'noIdentidad': $("#txt-noidentidad-paramedico").val(),
    },
    success:function(respuesta){
      console.log(respuesta);
      agregarFilaTablaBusquedaParamedico(respuesta);
      paramedico=respuesta;
    },
    error: function(error){
      console.log(error);
    },
    complete: function(){
      //TO-DO
    }
  });
}

function agregarFilaTablaBusquedaParamedico(respuesta){
  $("#tbl-resultado-paramedico tbody").empty();
  for (var i = 0; i < respuesta.length; i++) {
    var paramedico = respuesta[i];
    var fila = 
    "<tr>"+
    "  <td>"+paramedico.LICENCIA+"</td>"+
    "  <td>"+paramedico.P_NOMBRE+" "+paramedico.S_NOMBRE+" "+paramedico.P_APELLIDO+" "+paramedico.S_APELLIDO+"</td>"+
    "  <td>"+paramedico.NO_IDENTIDAD+"</td>"+
    '  <td>'+
        '<button onclick="seleccionarParamedico('+i+')" class="btn btn-default btn-md">'+
          '<span class="glyphicon glyphicon-ok"></span> &nbsp; Seleccionar'+
        '</button>'+
      "</td>"+
    "</tr>";
    $("#tbl-resultado-paramedico tbody").append(fila);
  }
}

function seleccionarParamedico(i){
	limpiarTablaParamedico();
	var m = paramedico[i];
	$("#txt-id-paramedico").val(m.ID_PARAMEDICO);
}

function registrar(){
	var obs = $("#txt-observacion").val();
	var idAmbulancia = $("#slc-ambulancia").val();
	var idParamedico= $("#txt-id-paramedico").val();
	var idExpediente= $("#txt-id-expediente").val();
 
	$.ajax({
	  url:CONST_SITIO_URL+'/services/AtencionPreHospitalaria.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
		'accion':'crear',
	    'observacion': obs,
	    'idAmbulancia': idAmbulancia,
	    'idParamedico': idParamedico,
	    'idExpediente': idExpediente,
	   
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
