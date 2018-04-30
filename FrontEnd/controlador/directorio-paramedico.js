$("#nav-item-paramedico").addClass("active");

function agregarFilaTablaParamedico(respuesta){
	$("#tbl-paramedico tbody").empty();
	for (var i = 0; i < respuesta.length; i++) {
		var paramedico = respuesta[i];
		var fila = 
		"<tr>"+
		"  <td>"+paramedico.LICENCIA+"</td>"+
		"  <td>"+paramedico.P_NOMBRE+"</td>"+
		"  <td>"+paramedico.S_NOMBRE+"</td>"+
		"  <td>"+paramedico.P_APELLIDO+"</td>"+
		"  <td>"+paramedico.S_APELLIDO+"</td>"+
		"  <td>"+paramedico.NO_IDENTIDAD+"</td>"+
		"  <td>"+paramedico.SEXO+"</td>"+
		"  <td>"+paramedico.CORREO+"</td>"+
		'  	<td><button onclick="editar('+paramedico.ID_PARAMEDICO+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
		"</tr>"
		$("#tbl-paramedico tbody").append(fila);
	}
}

function cargaTablaParamedico(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Paramedico.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarTodos',
	    // 'idCentroMedico' : $("#txt-centro").val(),
	    'idCentroMedico' : 1,
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
}


function editar(id){
	$("#txt-id-paramedico").val(id);
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Paramedico.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listar',
	    'idParamedico': id,
	  },
	  success:function(respuesta){
	    paramedico = respuesta[0];
	    $("#txt-plicencia").val(paramedico.LICENCIA);
	    $("#txt-pnombre").val(paramedico.P_NOMBRE);
	    $("#txt-snombre").val(paramedico.S_NOMBRE);
	    $("#txt-papellido").val(paramedico.P_APELLIDO);
	    $("#txt-sapellido").val(paramedico.S_APELLIDO);
	    $("#txt-noidentidad").val(paramedico.NO_IDENTIDAD);
	    $("#txt-direccion").val(paramedico.DIRECCION);
	    $("#txt-email").val(paramedico.CORREO);
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

$(document).ready(function(){
	cargaTablaParamedico();

});

function buscar(){
	var criterio = $("#slc-filtro-pm").val();
	var valor = $("#txt-busqueda").val();
	switch(criterio){
		case '1': 
			$.ajax({
			  url:CONST_SITIO_URL+'/services/Paramedico.php',
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
			  url:CONST_SITIO_URL+'/services/Paramedico.php',
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
			  url:CONST_SITIO_URL+'/services/Paramedico.php',
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