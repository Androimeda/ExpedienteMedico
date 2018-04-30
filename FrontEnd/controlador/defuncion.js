$("#nav-item-paciente").addClass("active");

var paciente = null;

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
	// limpiar();
	var p = paciente[i];
	$("#txt-id-expediente").val(p.ID_EXPEDIENTE);
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
	    'accion':'agregarDefuncion',
	    'observacionCausa': $("#txt-observacion-causa").val(),
	    'idExpediente': $("#txt-id-expediente").val(),
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