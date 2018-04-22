$.ajax({
  url:SITIO_URL+'/services/Medico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'pNombre': null,
    'sNombre': null,
    'pApellido': null,
    'sApellido': null,
    'direccion': null,
    'sexo': null,
    'noIdentidad': null,
    'idPais': null,
    'idEspecialidad': null,
    'noColegiacion': null,
    'correo': null,
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
  url:SITIO_URL+'/services/Medico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'buscarPorApellido',
    'pApellido': null,
    'sApellido': null,
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
  url:SITIO_URL+'/services/Medico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'buscarPorNoIdentidad',
    'noIdentidad': null,
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
  url:SITIO_URL+'/services/Medico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarTodos',
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
  url:SITIO_URL+'/services/Medico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'idMedico': null,
    'direccion': null,
    'idEspecialidad': null,
    'noColegiacion': null,
    'correo': null,
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
  url:SITIO_URL+'/services/Medico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'buscarPorNombre',
    'pNombre': null,
    'sNombre': null,
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
  url:SITIO_URL+'/services/Medico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listar',
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


