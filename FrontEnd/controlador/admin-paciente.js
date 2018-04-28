$("#nav-item-paciente").addClass("active");

function cargaTablaPaciente(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Paciente.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarTodos',
	  },
	  success:function(respuesta){
	    $("#tbl-paciente tbody").empty();
	    for (var i = 0; i < respuesta.length; i++) {
	    	paciente = respuesta[i];
	    	var fila = 
	    	"<tr>"+
	    	"  <td>"+paciente.ID_EXPEDIENTE+"</td>"+
	    	"  <td>"+paciente.FECHA_EXPEDIENTE+"</td>"+
	    	"  <td>"+paciente.P_NOMBRE+"</td>"+
	    	"  <td>"+paciente.S_NOMBRE+"</td>"+
	    	"  <td>"+paciente.P_APELLIDO+"</td>"+
	    	"  <td>"+paciente.S_APELLIDO+"</td>"+
	    	"  <td>"+paciente.NO_IDENTIDAD+"</td>"+
	    	"  <td>"+paciente.SEXO+"</td>"+
	    	"  <td>"+paciente.DIRECCION+"</td>"+
	    	"  <td>"+paciente.CORREO+"</td>"+
	    	'  	<td><button onclick="editar('+paciente.ID_EXPEDIENTE+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
	    	"</tr>"
	    	$("#tbl-paciente tbody").append(fila);
	    }
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
	$("#txt-id-paciente").val(id);
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Paciente.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listar',
	    'idPaciente': id,
	  },
	  success:function(respuesta){
	    paciente = respuesta[0];
	    $("#txt-pnombre").val(paciente.P_NOMBRE);
	    $("#txt-snombre").val(paciente.S_NOMBRE);
	    $("#txt-papellido").val(paciente.P_APELLIDO);
	    $("#txt-sapellido").val(paciente.S_APELLIDO);
	    $("#txt-noidentidad").val(paciente.NO_IDENTIDAD);
	    $("#txt-direccion").val(paciente.DIRECCION);
	    $("#txt-email").val(paciente.CORREO);
	    $("#slc-escolaridad").val(paciente.ID_ESCOLARIDAD);
	    $("#slc-estado-civil").val(paciente.ID_ESTADO_CIVIL);
	    $("#slc-ocupacion").val(paciente.ID_OCUPACION);
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
	    	alert("Actualizacion Correcta");
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
	cargaTablaPaciente();
});

$(document).ready(function(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Persona.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarEscolaridad',
	  },
	  success:function(respuesta){
	    for (var i = 0; i < respuesta.length; i++) {
	    	var esc = respuesta[i];
	    	var fila = '<option value="'+esc.ID_ESCOLARIDAD+'">'+esc.ESCOLARIDAD+'</option>';
	    	$("#slc-escolaridad").append(fila);
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

$(document).ready(function () {
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Persona.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarEstadoCivil',
	  },
	  success:function(respuesta){
	    for (var i = 0; i < respuesta.length; i++) {
	    	var est = respuesta[i];
	    	var fila = '<option value="'+est.ID_ESTADO_CIVIL+'">'+est.ESTADO_CIVIL+'</option>';
	    	$("#slc-estado-civil").append(fila);
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

$(document).ready(function() {
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Persona.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarOcupacion',
	  },
	  success:function(respuesta){
	    for (var i = 0; i < respuesta.length; i++) {
	    	var ocup = respuesta[i];
	    	var fila = '<option value="'+ocup.ID_OCUPACION+'">'+ocup.OCUPACION+'</option>';
	    	$("#slc-ocupacion").append(fila);
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