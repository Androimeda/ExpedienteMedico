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
      '<button onclick="expediente('+i+')" class="btn btn-default btn-sm">'+
        '<span class="glyphicon glyphicon-eye-open"></span>'+
      '</button>'+
    "</td>"+
    "</tr>";
    $("#tbl-resultado tbody").append(fila);
  }
}


function limpiar(){
  $('#tbl-resultado tbody').empty();
  $('#txt-noidentidad').val("");
}

function expediente(i){
  var id = paciente[i].ID_EXPEDIENTE;
  var pid = paciente[i].ID_PACIENTE;
  $(".sector-exp").show();

  console.log(paciente[i]);

  $.ajax({
    url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
    method:'POST',
    dataType:'JSON',
    data:{
      'accion':'listarPorPaciente',
      'idExpediente': id,
    },
    success:function(respuesta){
      $("#tbl-consulta tbody").empty();
      for (var i = 0; i < respuesta.length; i++) {
        consulta = respuesta[i];
        var fila =
        "<tr>"+
        "  <td>"+consulta.FECHA_HORA+"</td>"+
        "  <td>"+consulta.CENTRO_MEDICO+"</td>"+
        "  <td>"+consulta.PISO+"</td>"+
        "  <td>"+consulta.MEDICO+"</td>"+
        "  <td>"+consulta.ESPECIALIDAD+"</td>"+
        "  <td>"+consulta.SINTOMAS+"</td>"+
        "  <td>"+consulta.DIAGNOSTICO+"</td>"+
        "</tr>";
        $("#tbl-consulta tbody").append(fila);
      }
    },
    error: function(error){
      console.log(error);
    },
    complete: function(){
      //TO-DO
    }
  });

  $.ajax({
  url:CONST_SITIO_URL+'/services/Emergencia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorPaciente',
    'idExpediente': id,
  },
  success:function(respuesta){
    $("#tbl-emergencia tbody").empty();
    for (var i = 0; i < respuesta.length; i++) {
      emergencia = respuesta[i];
      var fila =
      "<tr>"+
      "  <td>"+emergencia.FECHA_HORA_ATENCION+"</td>"+
      "  <td>"+emergencia.CENTRO_MEDICO+"</td>"+
      "  <td>"+emergencia.MEDICO+"</td>"+
      "  <td>"+emergencia.ESPECIALIDAD+"</td>"+
      "  <td>"+emergencia.OBSERVACION+"</td>"+
      "</tr>";
      $("#tbl-emergencia tbody").append(fila);
    }
  },
  error: function(error){
    console.log(error);
  },
  complete: function(){
    //TO-DO
  }
  });
  $.ajax({
    url:CONST_SITIO_URL+'/services/Hospitalizacion.php',
    method:'POST',
    dataType:'JSON',
    data:{
      'accion':'listarPorPaciente',
      'idExpediente': id,
    },
    success:function(respuesta){
      $("#tbl-hospitalizacion tbody").empty();
      for (var i = 0; i < respuesta.length; i++) {
        hospitalizacion = respuesta[i];
        var fila =
        "<tr>"+
        "  <td>"+hospitalizacion.CENTRO_MEDICO+"</td>"+
        "  <td>"+hospitalizacion.SALA+"</td>"+
        "  <td>"+hospitalizacion.CAMA+"</td>"+
        "  <td>"+hospitalizacion.MEDICO+"</td>"+
        "  <td>"+hospitalizacion.FECHA_HORA_INGRESO+"</td>"+
        "  <td>"+hospitalizacion.FECHA_HORA_ALTA+"</td>"+
        "  <td>"+hospitalizacion.OBSERVACION+"</td>"+
        "</tr>";
        $("#tbl-hospitalizacion tbody").append(fila);
      }
    },
    error: function(error){
      console.log(error);
    },
    complete: function(){
      //TO-DO
    }
  });

  $.ajax({
    url:CONST_SITIO_URL+'/services/Cirugia.php',
    method:'POST',
    dataType:'JSON',
    data:{
      'accion':'listarPorPaciente',
      'idExpediente': id,
    },
    success:function(respuesta){
      for (var i = 0; i < respuesta.length; i++) {
        hospitalizacion = respuesta[i];
        var fila =
        "<tr>"+
        "  <td>"+hospitalizacion.CENTRO_MEDICO+"</td>"+
        "  <td>"+hospitalizacion.SALA+"</td>"+
        "  <td>"+hospitalizacion.CAMA+"</td>"+
        "  <td>"+hospitalizacion.MEDICO+"</td>"+
        "  <td>"+hospitalizacion.FECHA_HORA_INGRESO+"</td>"+
        "  <td>"+hospitalizacion.FECHA_HORA_ALTA+"</td>"+
        "  <td>"+hospitalizacion.OBSERVACION+"</td>"+
        "</tr>";
        $("#tbl-hospitalizacion tbody").append(fila);
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