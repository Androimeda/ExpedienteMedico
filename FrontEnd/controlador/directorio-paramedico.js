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
	var id_paciente = $("#txt-id-paciente").val();
	var direccion = $("#txt-direccion").val();
	var correo = $("#txt-email").val();
	var id_escolaridad = $("#slc-escolaridad").val();
	var id_estado_civil = $("#slc-estado-civil").val();
	var id_ocupacion = $("#slc-ocupacion").val();
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Paciente.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'actualizar',
	    'direccion': direccion,
	    'idOcupacion': id_ocupacion,
	    'idPaciente': id_paciente,
	    'idEstadoCivil': id_estado_civil,
	    'correo': correo,
	    'idEscolaridad': id_escolaridad,
	  },
	  success:function(respuesta){
	    if (respuesta.resultado == true ){
	    	alert(respuesta.mensaje);
	    	cargaTablaPaciente();
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