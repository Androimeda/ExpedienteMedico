$("#nav-item-consulta").addClass("active");

function agregarFilaTablaHospitalizaciones(respuesta){
	$("#tbl-hospitalizaciones tbody").empty();
	for (var i = 0; i < respuesta.length; i++) {
		var hospitalizaciones = respuesta[i];
		var fila = 
		"<tr>"+
		"  <td>"+hospitalizaciones.ID_INGRESO+"</td>"+
		"  <td>"+hospitalizaciones.P_NOMBRE+"</td>"+
		"  <td>"+hospitalizaciones.P_APELLIDO+"</td>"+
		"  <td>"+hospitalizaciones.OBSERVACION+"</td>"+
		"  <td>"+hospitalizaciones.FECHA_HORA_INGRESO+"</td>"+
		"  <td>"+hospitalizaciones.FECHA_HORA_ALTA+"</td>"+
		"  <td>"+hospitalizaciones.ID_CENTRO_MEDICO+"</td>"+
		"  <td>"+hospitalizaciones.DESCRIPCION+"</td>"+
		"  <td>"+hospitalizaciones.CAMA+"</td>"+
		"  <td>"+hospitalizaciones.ID_MEDICO+"</td>"+
		"  <td>"+hospitalizaciones.NO_IDENTIDAD+"</td>"+
		// '  	<td><button onclick="editar('+hospitalizaciones.ID_INGRESO+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
		// "</tr>"
		$("#tbl-hospitalizaciones tbody").append(fila);
	}
}

function cargaTablaHospitalizaciones(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/hospitalizacion.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarPorCentro',
	    // 'idCentroMedico' : $("#txt-centro").val(),
	    'idCentroMedico' : 1,
	  },
	  success:function(respuesta){
	  	agregarFilaTablaHospitalizaciones(respuesta);
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
	cargaTablaHospitalizaciones();

});


function editar(id){

	$("#txt-id-hospitalizaciones").val(id);
	$.ajax({
	  url:CONST_SITIO_URL+'/services/hospitalizacion.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarPorCentro',
	    'idCentroMedico': id,
	  },
	  success:function(respuesta){
	    hospitalizacion = respuesta[0];
	    $("#txt-idingreso").val(hospitalizacion.ID_INGRESO);
	    $("#txt-pnombre").val(hospitalizacion.P_NOMBRE);
	    $("#txt-papellido").val(hospitalizacion.P_APELLIDO);
	    $("#txt-obs").val(hospitalizacion.OBSERVACION);
	    $("#txt-ingreso").val(hospitalizacion.FECHA_HORA_INGRESO);
	    $("#txt-alta").val(paramedico.FECHA_HORA_ALTA);
	    $("#txt-centroMedico").val(hospitalizacion.ID_CENTRO_MEDICO);
	    $("#txt-sala").val(hospitalizacion.DESCRIPCION);
	    $("#txt-cama").val(hospitalizacion.CAMA);
	    $("#txt-medico").val(hospitalizacion.ID_MEDICO);
	    $("#txt-noidentidad").val(hospitalizacion.NO_IDENTIDAD);
	    $("#modal-editar").modal("show");
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
}


function actualizar(){
	var correo = $("#txt-email").val();
	var idParamedico = $("#txt-id-paramedico").val();
	var licencia = $("#txt-plicencia").val();
	var direccion = $("#txt-direccion").val();
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Paramedico.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'actualizar',
	    'correo': correo,
	    'idParamedico': idParamedico,
	    'licencia': licencia,
	    'direccion': direccion,
	  },
	  success:function(respuesta){
	    if (respuesta.resultado == true ){
	    	alert(respuesta.mensaje);
	    	cargaTablaParamedico();
	    }else
	    	alert("No se pudo actualizar: "+ respuesta.mensaje);

	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	    $("#modal-editar").modal("hide");
	  }
	});

}



function buscar(){
	var criterio = $("#slc-filtro-hosp").val();
	var valor = $("#txt-busqueda").val();
	switch(criterio){
		case '1': 
			$.ajax({
			  url:CONST_SITIO_URL+'/services/Hospitalizacion.php',
			  method:'POST',
			  dataType:'JSON',
			  data:{
			    'accion':'buscarPorNombre',
			    'pNombre': valor,
			    'sNombre': valor,
			  },
			  success:function(respuesta){
			    agregarFilaTablaParamedico(respuesta);
			  },
			  error: function(error){
			    console.log(error);
			  },
			  complete: function(){
			    //TO-DO
			  }
			});
		break;
		case '2': 
			$.ajax({
			  url:CONST_SITIO_URL+'/services/Hospitalizacion.php',
			  method:'POST',
			  dataType:'JSON',
			  data:{
			    'accion':'buscarPorApellido',
			    'sApellido': valor,
			    'pApellido': valor,
			  },
			  success:function(respuesta){
			    agregarFilaTablaParamedico(respuesta);
			  },
			  error: function(error){
			    console.log(error);
			  },
			  complete: function(){
			    //TO-DO
			  }
			});
		break;
		case '3': 
			$.ajax({
			  url:CONST_SITIO_URL+'/services/Hospitalizacion.php',
			  method:'POST',
			  dataType:'JSON',
			  data:{
			    'accion':'buscarPorNoIdentidad',
			    'noIdentidad': valor,
			  },
			  success:function(respuesta){
			    agregarFilaTablaParamedico(respuesta);
			  },
			  error: function(error){
			    console.log(error);
			  },
			  complete: function(){
			    //TO-DO
			  }
			});
		break;
		case '4': 
			$.ajax({
			  url:CONST_SITIO_URL+'/services/Paramedico.php',
			  method:'POST',
			  dataType:'JSON',
			  data:{
			    'accion':'buscarPorLicencia',
			    'licencia': valor,
			  },
			  success:function(respuesta){
			    agregarFilaTablaParamedico(respuesta);
			  },
			  error: function(error){
			    console.log(error);
			  },
			  complete: function(){
			    //TO-DO
			  }
			});
		break;
	}

}