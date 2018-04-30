$("#nav-item-paramedico").addClass("active");
function registrar(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Paramedico.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'crear',
	    'idPais': $("#slc-pais").val(),
	    'noIdentidad': $("#txt-noidentidad").val(),
	    'pNombre': $("#txt-pnombre").val(),
	    'sNombre': $("#txt-snombre").val(),
	    'sApellido': $("#txt-sapellido").val(),
	    'direccion': $("#txt-direccion").val(),
	    'correo': $("#txt-email").val(),
	    'pApellido': $("#txt-papellido").val(),
	    'sexo': $("input[name='rbt-sexo']:checked").val(),
	    'licencia': $("#txt-licencia").val(),
	   
	  },
	  success:function(respuesta){
	    alert(respuesta.mensaje);
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
}

$(document).ready(function(){

$.ajax({
  url:CONST_SITIO_URL+'/services/Persona.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPais',
  },
  success:function(respuesta){
    for (var i = 0; i < respuesta.length; i++) {
    	var pais = respuesta[i];
    	var fila = '<option value="'+pais.ID_PAIS+'">'+pais.NOMBRE+'</option>';
    	$("#slc-pais").append(fila);
    }
  },
  error: function(error){
    console.log(error);
  },
  complete: function(){
    //TO-DO
  }
});
})