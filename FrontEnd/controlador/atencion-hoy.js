$("#nav-item-emergencia").addClass("active")


function agregarFilaTablaAPHoy(respuesta){
	$("#tbl-aph tbody").empty();
	for (var i = 0; i < respuesta.length; i++) {
		var aph = respuesta[i];
		var fila = 
		"<tr>"+
		"  <td>"+aph.FECHA_HORA_ATENCION+"</td>"+
		"  <td>"+aph.ID_ATENCION+"</td>"+
		"  <td>"+aph.PLACA+"</td>"+
		"  <td>"+aph.ID_CENTRO+"</td>"+
		"  <td>"+aph.OBSERVACION+"</td>"+
		"  <td>"+aph.P_NOMBRE+"</td>"+
		"  <td>"+aph.S_NOMBRE+"</td>"+
		"  <td>"+aph.P_APELLIDO+"</td>"+
		"  <td>"+aph.S_APELLIDO+"</td>"+
		"  <td>"+aph.NO_IDENTIDAD+"</td>"+
		"  <td>"+aph.SEXO+"</td>"+
		"  <td>"+aph.ID_PARAMEDICO+"</td>"+
		"</tr>"
		$("#tbl-apn tbody").append(fila);
	}
}

function cargaTablaAPHoy(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/AtencionPreHospitalaria.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	     'accion':'listarPorCentroDiarias',
   		 'idCentroMedico': id,

	  },
	  success:function(respuesta){
	  	agregarFilaTablaAPHoy(respuesta);
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
}