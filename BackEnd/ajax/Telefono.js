$.ajax({
  url:SITIO_URL+'/services/Telefono.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'agregarTelefonoPersona',
    'idPersona': null,
    'telefono': null,
    'idTipoTelefono': null,
    'idPais': null,
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
  url:SITIO_URL+'/services/Telefono.php',
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
  url:SITIO_URL+'/services/Telefono.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'buscarPorPersona',
    'noIdentidad': null,
    'pNombre': null,
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
  url:SITIO_URL+'/services/Telefono.php',
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
  url:SITIO_URL+'/services/Telefono.php',
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
  url:SITIO_URL+'/services/Telefono.php',
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
  url:SITIO_URL+'/services/Telefono.php',
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
  url:SITIO_URL+'/services/Telefono.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'agregarTelefonoCentro',
    'idCentroMedico': null,
    'telefono': null,
    'idTipoTelefono': null,
    'idPais': null,
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
  url:SITIO_URL+'/services/Telefono.php',
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
  url:SITIO_URL+'/services/Telefono.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'eliminarDeCentro',
    'idCentroMedico': null,
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
  url:SITIO_URL+'/services/Telefono.php',
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


