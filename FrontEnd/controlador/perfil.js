$("#nav-item-admin").addClass("active");

$(document).ready(function(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Telefono.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'buscarPorCentro',
	    'idCentroMedico': $("#txt-id-centro").val(),
	  },
	  success:function(respuesta){
	    for (var i = 0; i < respuesta.length; i++) {
	    	var telefono = respuesta[i];
	    	var fila =
	    	"<tr>"+
	    		"<td>"+telefono.CODIGO_AREA+"-"+telefono.TELEFONO+"</td>"+
	    		"<td>"+telefono.TIPO_TELEFONO+"</td>"+
	    	"</tr>"
	    	$("#tbl-telefono tbody").append(fila);
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