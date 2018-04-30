$.ajax({
  url:CONST_SITIO_URL+'/services/AtencionPreHospitalaria.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'observacion': null,
    'idAmbulancia': null,
    'idParamedico': null,
    'idExpediente': null,
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
  url:CONST_SITIO_URL+'/services/AtencionPreHospitalaria.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorParamedico',
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
  url:CONST_SITIO_URL+'/services/AtencionPreHospitalaria.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorCentroDiarias',
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
  url:CONST_SITIO_URL+'/services/AtencionPreHospitalaria.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorCentroFecha',
    'idCentroMedico': null,
    'fechaHoraAtencion': null,
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
  url:CONST_SITIO_URL+'/services/AtencionPreHospitalaria.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'idAmbulancia': null,
    'observacion': null,
    'idExpediente': null,
    'idAtencion': null,
    'fechaHoraAtencion': null,
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


$.ajax({
  url:CONST_SITIO_URL+'/services/AtencionPreHospitalaria.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorCentroMedico',
    'idCentroMedico': null,
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


$.ajax({
  url:CONST_SITIO_URL+'/services/AtencionPreHospitalaria.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorPaciente',
    'idExpediente': null,
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


