$.ajax({
  url:CONST_SITIO_URL+'/services/Telefono.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'agregarTelefonoPersona',
    'idPersona': null,
    'idPais': null,
    'telefono': null,
    'idTipoTelefono': null,
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
  url:CONST_SITIO_URL+'/services/Telefono.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarTipoTelefono',
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
  url:CONST_SITIO_URL+'/services/Telefono.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'buscarPorPersona',
    'pNombre': null,
    'noIdentidad': null,
    'pApellido': null,
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
  url:CONST_SITIO_URL+'/services/Telefono.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorCentroMedico',
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
  url:CONST_SITIO_URL+'/services/Telefono.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorPersona',
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
  url:CONST_SITIO_URL+'/services/Telefono.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizarTipoTelefono',
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
  url:CONST_SITIO_URL+'/services/Telefono.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'agregarTipoTelefono',
    'tipoTelefono': null,
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
  url:CONST_SITIO_URL+'/services/Telefono.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'agregarTelefonoCentro',
    'idPais': null,
    'idCentroMedico': null,
    'telefono': null,
    'idTipoTelefono': null,
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
  url:CONST_SITIO_URL+'/services/Telefono.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'eliminarDePersona',
    'idPersona': null,
    'idTelefono': null,
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
  url:CONST_SITIO_URL+'/services/Telefono.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'eliminarDeCentro',
    'idTelefono': null,
    'idCentroMedico': null,
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
  url:CONST_SITIO_URL+'/services/Telefono.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'buscarPorCentro',
    'nombreCentro': null,
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


