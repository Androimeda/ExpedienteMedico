$("#nav-item-paciente").addClass("active");

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
      console.log(respuesta);
    },
    error: function(error){
      console.log(error);
    },
    complete: function(){
      //TO-DO
    }
  });
}