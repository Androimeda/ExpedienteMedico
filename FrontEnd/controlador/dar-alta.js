$("#nav-item-consulta").addClass("active");

var paciente = null;


function limpiar(){
  $('#tbl-resultado tbody').empty();
  $('#txt-noidentidad').val("");
}

function buscar(){
  var valor = $("#txt-noidentidad").val();
  $.ajax({
    url:CONST_SITIO_URL+'/services/Hospitalizacion.php',
    method:'POST',
    dataType:'JSON',
    data:{
      'accion':'listarPorPacienteActiva',
      'idCentroMedico': $("#txt-id-centro-medico").val(),
      'idCentroMedico': 1,
      // 'noIdentidad': $("#txt-noidentidad").val(),
    },
    success:function(respuesta){
      agregarFilaTablaBusqueda(respuesta)
      paciente=respuesta;
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
	$("#txt-id-ingreso").val(p.ID_INGRESO);
	$("#txt-id-fecha-ingreso").val(p.FECHA_HORA_INGRESO);
}

function registrar(){
	var fecha= $("#txt-fecha").val();
	var hora = $("#txt-hora").val();
	var fecha_hora = parseFecha(fecha, hora); // Funcion ubicada en el archivo config.js
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Hospitalizacion.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'darAlta',
	    'fechaHoraAlta': fecha_hora,
	    'idIngreso': $("#txt-id-ingreso").val(),
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