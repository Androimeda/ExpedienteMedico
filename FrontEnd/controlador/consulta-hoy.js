$("#nav-item-consulta").addClass("active");

$(document).ready(function(){
	$.ajax({
  		url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
  		method:'POST',
  		dataType:'JSON',
  		data:{
  		  'accion':'listarPorHoy',
  		},
	  success:function(respuesta){
	    $("#tbl-consulta tbody").empty();
	    for (var i = 0; i < respuesta.length; i++) {
	      consulta = respuesta[i];
	      var fila =
	      "<tr>"+
	      "  <td>"+consulta.FECHA_HORA+"</td>"+
	      "  <td>"+consulta.CENTRO_MEDICO+"</td>"+
	      "  <td>"+consulta.PISO+"</td>"+
	      "  <td>"+consulta.MEDICO+"</td>"+
	      "  <td>"+consulta.ESPECIALIDAD+"</td>"+
	      "  <td>"+consulta.SINTOMAS+"</td>"+
	      "  <td>"+consulta.DIAGNOSTICO+"</td>"+
	      "</tr>";
	      $("#tbl-consulta tbody").append(fila);
	    }
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
});
