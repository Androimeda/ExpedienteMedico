$.ajax({
  url:CONST_SITIO_URL+'/services/Paramedico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'idPais': null,
    'noIdentidad': null,
    'pNombre': null,
    'sNombre': null,
    'sApellido': null,
    'direccion': null,
    'correo': null,
    'pApellido': null,
    'sexo': null,
    'licencia': null,
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
  url:CONST_SITIO_URL+'/services/Paramedico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'buscarPorApellido',
    'sApellido': null,
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
  url:CONST_SITIO_URL+'/services/Paramedico.php',
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

// $.ajax({
//   url:CONST_SITIO_URL+'/services/Paramedico.php',
//   method:'POST',
//   dataType:'JSON',
//   data:{
//     'accion':'buscarPorLicencia',
//     'licencia': null,
  
//   },
//   success:function(respuesta){
//     console.log(respuesta);
//   },
//   error: function(error){
//     console.log(error);
//   },
//   complete: function(){
//     //TO-DO
//   }
// });

$.ajax({
  url:CONST_SITIO_URL+'/services/Paramedico.php',
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
  url:CONST_SITIO_URL+'/services/Paramedico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'correo': null,
    'idParamedico': null,
    'licencia': null,
    'direccion': null,
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
  url:CONST_SITIO_URL+'/services/Paramedico.php',
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
  url:CONST_SITIO_URL+'/services/Paramedico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listar',
    'idParamedico': null,
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


