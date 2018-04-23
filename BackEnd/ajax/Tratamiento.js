$.ajax({
  url:CONST_SITIO_URL+'/services/Tratamiento.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'dosis': null,
    'idTipoTratamiento': null,
    'intervaloTiempo': null,
    'fechaInicio': null,
    'idViaSuministro': null,
    'duracionTratamiento': null,
  },
  success:function(respuesta){
    console.log(respuesta);
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
    'accion':'agregarTipoTratamiento',
    'tipoTratamiento': null,
  },
  success:function(respuesta){
    console.log(respuesta);
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
    'idPaciente': null,
  },
  success:function(respuesta){
    console.log(respuesta);
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
    'accion':'listarTipoTratamiento',
  },
  success:function(respuesta){
    console.log(respuesta);
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
    'accion':'actualizarReceta',
    'idTratamiento': null,
    'idConsulta': null,
    'idMedico': null,
  },
  success:function(respuesta){
    console.log(respuesta);
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
    'accion':'agregarViaSuministro',
    'viaSuministro': null,
  },
  success:function(respuesta){
    console.log(respuesta);
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
    'accion':'listarViaSuministro',
  },
  success:function(respuesta){
    console.log(respuesta);
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
    'accion':'recetar',
    'idTratamiento': null,
    'idConsulta': null,
    'idMedico': null,
  },
  success:function(respuesta){
    console.log(respuesta);
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
    'accion':'actualizarViaSuministro',
    'viaSuministro': null,
    'idViaSuministro': null,
  },
  success:function(respuesta){
    console.log(respuesta);
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
    'accion':'actualizarTipoTratamiento',
    'idTipoTratamiento': null,
    'tipoTratamiento': null,
  },
  success:function(respuesta){
    console.log(respuesta);
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
    'accion':'actualizar',
    'dosis': null,
    'idTipoTratamiento': null,
    'intervaloTiempo': null,
    'fechaInicio': null,
    'idViaSuministro': null,
    'idTratamiento': null,
    'duracionTratamiento': null,
  },
  success:function(respuesta){
    console.log(respuesta);
  },
  error: function(error){
    console.log(error);
  },
  complete: function(){
    //TO-DO
  }
});


