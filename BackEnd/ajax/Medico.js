$.ajax({
  url:CONST_SITIO_URL+'/services/Medico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'noColegiacion': null,
    'idPais': null,
    'noIdentidad': null,
    'idEspecialidad': null,
    'pNombre': null,
    'sNombre': null,
    'sApellido': null,
    'direccion': null,
    'correo': null,
    'pApellido': null,
    'sexo': null,
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
  url:CONST_SITIO_URL+'/services/Medico.php',
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
  url:CONST_SITIO_URL+'/services/Medico.php',
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
  url:CONST_SITIO_URL+'/services/Medico.php',
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
  url:CONST_SITIO_URL+'/services/Medico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'correo': null,
    'noColegiacion': null,
    'idEspecialidad': null,
    'idMedico': null,
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
  url:CONST_SITIO_URL+'/services/Medico.php',
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
  url:CONST_SITIO_URL+'/services/Medico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarEspecialidad',
  },
  success:function(respuesta){
   for (var i = 0; i < respuesta.length; i++) {
        var especialidad = respuesta[i];
        var fila = '<option value="'+especialidad.ID_ESPECIALIDAD+'">'+especialidad.ESPECIALIDAD+'</option>';
        $("#slc-especialidad").append(fila);
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
  url:CONST_SITIO_URL+'/services/Medico.php',
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


