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
        '<button onclick="expediente('+i+')" class="btn btn-default btn-md">'+
          '<span class="glyphicon glyphicon-eye-open"></span> &nbsp; Ver'+
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
  limpiar();
  var p = paciente[i];
  var id = p.ID_EXPEDIENTE;
  var pid = p.ID_PACIENTE;
  $(".sector-exp").show();

  $("#td-nombre").html("");
  $("#td-nombre").html(p.P_NOMBRE +" "+ p.S_NOMBRE);
  $("#td-apellido").html("");
  $("#td-apellido").html(p.P_APELLIDO +" "+ p.S_APELLIDO);
  $("#td-noidentidad").html("");
  $("#td-noidentidad").html(p.NO_IDENTIDAD);
  $("#td-tipo-sangre").html("");
  $("#td-tipo-sangre").html(p.GRUPO_SANGUINEO +" "+p.FACTOR_RH);
  $("#td-fecha").html("");
  $("#td-fecha").html(p.FECHA_NAC);
  $("#td-nacionalidad").html("");
  $("#td-nacionalidad").html(p.NACIONALIDAD);
  $("#td-ascendencia").html("");
  $("#td-ascendencia").html(p.ASCENDENCIA);
  $("#td-estado-civil").html("");
  $("#td-estado-civil").html(p.ESTADO_CIVIL);
  $("#td-madre").html("");
  $("#td-padre").html("");
  $("#td-direccion").html("");
  $("#td-madre").html(p.MADRE);
  $("#td-padre").html(p.PADRE);
  $("#td-direccion").html(p.DIRECCION);

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
      $("#tbl-cirugia tbody").empty();
      for (var i = 0; i < respuesta.length; i++) {
        cirugia = respuesta[i];
        var fila =
        "<tr>"+
        "  <td>"+cirugia.CENTRO_MEDICO+"</td>"+
        "  <td>"+cirugia.MEDICO+"</td>"+
        "  <td>"+cirugia.FECHA_HORA+"</td>"+
        "  <td>"+cirugia.TIPO_CIRUGIA+"</td>"+
        "</tr>";
        $("#tbl-cirugia tbody").append(fila);
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
    url:CONST_SITIO_URL+'/services/Enfermedad.php',
    method:'POST',
    dataType:'JSON',
    data:{
      'accion':'listarPorPaciente',
      'idExpediente': id,
    },
    success:function(respuesta){
      $("#tbl-enfermedad tbody").empty();
      for (var i = 0; i < respuesta.length; i++) {
        enfermedad = respuesta[i];
        var fila =
        "<tr>"+
        "  <td>"+enfermedad.FECHA+"</td>"+
        "  <td>"+enfermedad.MEDICO+"</td>"+
        "  <td>"+enfermedad.ESPECIALIDAD+"</td>"+
        "  <td>"+enfermedad.ENFERMEDAD+"</td>"+
        "  <td>"+(enfermedad.ESTADO == 1? 'Sí' : 'No') +"</td>"+
        "</tr>";
        $("#tbl-enfermedad tbody").append(fila);
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
    url:CONST_SITIO_URL+'/services/Tratamiento.php',
    method:'POST',
    dataType:'JSON',
    data:{
      'accion':'listarPorPaciente',
      'idPaciente': id,
    },
    success:function(respuesta){
      console.log(respuesta);
      $("#tbl-tratamiento tbody").empty();
      for (var i = 0; i < respuesta.length; i++) {
        tratamiento = respuesta[i];
        var fila =
        "<tr>"+
        "  <td>"+tratamiento.FECHA+"</td>"+
        "  <td>"+tratamiento.TIPO_TRATAMIENTO+"</td>"+
        "  <td>"+tratamiento.DOSIS+"</td>"+
        "  <td>"+tratamiento.INTERVALO_TIEMPO+"</td>"+
        "  <td>"+tratamiento.DURACION+"</td>"+
        "  <td>"+tratamiento.VIA_SUMINISTRO+"</td>"+
        "</tr>";
        $("#tbl-tratamiento tbody").append(fila);
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