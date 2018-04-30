$("#nav-item-emergencia").addClass("active")


function agregarFilaTablaAPH(respuesta){
	$("#tbl-paciente tbody").empty();
	for (var i = 0; i < respuesta.length; i++) {
		var aph = respuesta[i];
		var fila = 
		"<tr>"+
		"  <td>"+aph.ID_ATENCION+"</td>"+
		"  <td>"+aph.ID_ATENCION+"</td>"+
		"  <td>"+aph.PLACA+"</td>"+
		"  <td>"+aph.ID_CENTRO_MEDICO+"</td>"+
		"  <td>"+aph.OBSERVACION+"</td>"+
		"  <td>"+aph.P_NOMBRE+"</td>"+
		"  <td>"+aph.S_NOMBRE+"</td>"+
		"  <td>"+aph.P_APELLIDO+"</td>"+
		"  <td>"+aph.S_APELLIDO+"</td>"+
		"  <td>"+aph.NO_IDENTIDAD+"</td>"+
		"  <td>"+aph.SEXO+"</td>"+
		"  <td>"+aph.ID_PARAMEDICO+"</td>"+
		"</tr>"
		$("#tbl-aph tbody").append(fila);
	}
}


function cargaTablaAPH(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/AtencionPreHospitalaria.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarPorCentroMedico',
	  },
	  success:function(respuesta){
	  	agregarFilaTablaAPH(respuesta);
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
}
//***** AL CARG
$(document).ready(function(){
	cargaTablaAPH();
});
