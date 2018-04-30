$("#nav-item-paciente").addClass("active");
var paciente = null;
var madre = null;
var padre = null;


$(document).ready(function(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/CentroMedico.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarTodos',
	  },
	  success:function(respuesta){
	    for (var i = 0; i < respuesta.length; i++) {
	    	var centro = respuesta[i];
	    	var fila = '<option value="'+centro.ID_CENTRO_MEDICO+'">'+centro.NOMBRE+'</option>';
	    	$("#slc-centro-medico").append(fila);
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

function limpiar(){
  $('#tbl-resultado tbody').empty();
  $('#txt-noidentidad').val("");
}

function limpiarTablaMadre(){
  $('#tbl-resultado-madre tbody').empty();
  $('#txt-noidentidad-madre').val("");
}

function limpiarTablaPadre(){
  $('#tbl-resultado-padre tbody').empty();
  $('#txt-noidentidad-padre').val("");
}

function buscar(){
  var valor = $("#txt-noidentidad").val();
  $.ajax({
    url:CONST_SITIO_URL+'/services/Paciente.php',
    method:'POST',
    dataType:'JSON',
    data:{
      'accion':'buscarNoNato',
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

function agregarFilaTablaBusquedaMadre(respuesta){
  $("#tbl-resultado-madre tbody").empty();
  for (var i = 0; i < respuesta.length; i++) {
    var madre = respuesta[i];
    var fila = 
    "<tr>"+
    "  <td>"+madre.ID_EXPEDIENTE+"</td>"+
    "  <td>"+madre.P_NOMBRE+" "+madre.S_NOMBRE+" "+madre.P_APELLIDO+" "+madre.S_APELLIDO+"</td>"+
    "  <td>"+madre.NO_IDENTIDAD+"</td>"+
    '  <td>'+
        '<button onclick="seleccionarMadre('+i+')" class="btn btn-default btn-md">'+
          '<span class="glyphicon glyphicon-ok"></span> &nbsp; Seleccionar'+
        '</button>'+
      "</td>"+
    "</tr>";
    $("#tbl-resultado-madre tbody").append(fila);
  }
}


function agregarFilaTablaBusquedaPadre(respuesta){
  $("#tbl-resultado-padre tbody").empty();
  for (var i = 0; i < respuesta.length; i++) {
    var padre = respuesta[i];
    var fila = 
    "<tr>"+
    "  <td>"+padre.ID_EXPEDIENTE+"</td>"+
    "  <td>"+padre.P_NOMBRE+" "+padre.S_NOMBRE+" "+padre.P_APELLIDO+" "+padre.S_APELLIDO+"</td>"+
    "  <td>"+padre.NO_IDENTIDAD+"</td>"+
    '  <td>'+
        '<button onclick="seleccionarPadre('+i+')" class="btn btn-default btn-md">'+
          '<span class="glyphicon glyphicon-ok"></span> &nbsp; Seleccionar'+
        '</button>'+
      "</td>"+
    "</tr>";
    $("#tbl-resultado-padre tbody").append(fila);
  }
}

function buscarMadre(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Persona.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'buscarPorNoIdentidad',
	    'noIdentidad': $("#txt-noidentidad-madre").val(),
	  },
	  success:function(respuesta){
	  	agregarFilaTablaBusquedaMadre(respuesta);
	    madre = respuesta
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
}

function buscarPadre(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Persona.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'buscarPorNoIdentidad',
	    'noIdentidad': $("#txt-noidentidad-padre").val(),
	  },
	  success:function(respuesta){
	  	agregarFilaTablaBusquedaPadre(respuesta);
	    padre = respuesta
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
}

function seleccionar(i){
	limpiar();
	var p = paciente[i];
	$("#txt-id-expediente").val(p.ID_EXPEDIENTE);
}
function seleccionarMadre(i){
	limpiarTablaMadre();
	var p = madre[i];
	$("#txt-id-madre").val(p.ID_PERSONA);
}
function seleccionarPadre(i){
	limpiarTablaPadre();
	var p = padre[i];
	$("#txt-id-padre").val(p.ID_PERSONA);
}


function registrar(){
	var fecha= $("#txt-fecha").val();
	var hora = $("#txt-hora").val();
	var fecha_hora = parseFecha(fecha, hora); // Funcion ubicada en el archivo config.js
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Paciente.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'agregarNatalidad',
	    'idMadre': $("#txt-id-madre").val(),
	    'idPadre': $("#txt-id-padre").val(),
	    'ordenPartoMultiple': $("#txt-orden").val(),
	    'idExpediente': $("#txt-id-expediente").val(),
	    'idCentroMedico': $("#slc-centro-medico").val(),
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