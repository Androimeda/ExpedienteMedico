$("#nav-item-paciente").addClass("active");

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
      '<button onclick="expediente('+paciente.ID_EXPEDIENTE+')" class="btn btn-default btn-sm">'+
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

function expediente(id){
  $(".sector-exp").show();
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
}