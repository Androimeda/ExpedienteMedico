$.ajax({
  url:SITIO_URL+'/services/AtencionPreHospitalaria.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'observacion': null,
    'idParamedico': null,
    'idAmbulancia': null,
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
  url:SITIO_URL+'/services/AtencionPreHospitalaria.php',
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
  url:SITIO_URL+'/services/AtencionPreHospitalaria.php',
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


$.ajax({
  url:SITIO_URL+'/services/AtencionPreHospitalaria.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'idAtencion': null,
    'observacion': null,
    'fechaHoraAtencion': null,
    'idParamedico': null,
    'idAmbulancia': null,
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
  url:SITIO_URL+'/services/AtencionPreHospitalaria.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorCentroMedico',
    'nombreCentro': null,
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


