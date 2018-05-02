$.ajax({
  url:CONST_SITIO_URL+'/services/Usuario.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarTipos',
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
  url:CONST_SITIO_URL+'/services/Usuario.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'login',
    'correo': null,
    'contrasena': null,
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
  url:CONST_SITIO_URL+'/services/Usuario.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'registrar',
    'idPais': null,
    'noIdentidad': null,
    'nombreCentroMedico': null,
    'pNombre': null,
    'sNombre': null,
    'sApellido': null,
    'idTipoUsuario': null,
    'direccion': null,
    'correo': null,
    'idTipoCentroMedico': null,
    'pApellido': null,
    'contrasena': null,
    'sexo': null,
    'direccionCentroMedico': null,
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


