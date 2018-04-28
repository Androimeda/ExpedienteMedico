$("#nav-item-medico").addClass("active");

function cargarTablaMedico() {

$.ajax({
  url:CONST_SITIO_URL+'/services/Medico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarTodos',
    'idCentroMedico': 1,
    //'idCentroMedico': $("#txt-centro").val(),
  },
  success:function(respuesta){
    agregarFilaTablaMedico(respuesta);
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
cargarTablaMedico();	
})


function agregarFilaTablaMedico(respuesta){
	$("#tbl-medico tbody").empty();
	for (var i = 0; i < respuesta.length; i++) {
		var medico = respuesta[i];
		var fila = 
		"<tr>"+
		"  <td>"+medico.NO_COLEGIACION+"</td>"+
		"  <td>"+medico.P_NOMBRE+"</td>"+
		"  <td>"+medico.S_NOMBRE+"</td>"+
		"  <td>"+medico.P_APELLIDO+"</td>"+
		"  <td>"+medico.S_APELLIDO+"</td>"+
		"  <td>"+medico.NO_IDENTIDAD+"</td>"+
		"  <td>"+medico.SEXO+"</td>"+
		"  <td>"+medico.ESPECIALIDAD+"</td>"+
		"  <td>"+medico.CORREO+"</td>"+
		'  	<td><button onclick="editar('+medico.ID_MEDICO+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
		"</tr>"
		$("#tbl-medico tbody").append(fila);
	}
}
function editar(id){
	$("#txt-id-medico").val(id);
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Medico.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listar',
	    'idMedico': id,
	  },
	  success:function(respuesta){
	    medico = respuesta[0];
	    $("#txt-colegiacion").val(medico.NO_COLEGIACION);
	    $("#txt-pnombre").val(medico.P_NOMBRE);
	    $("#txt-snombre").val(medico.S_NOMBRE);
	    $("#txt-papellido").val(medico.P_APELLIDO);
	    $("#txt-sapellido").val(medico.S_APELLIDO);
	    $("#txt-noidentidad").val(medico.NO_IDENTIDAD);
	    $("#txt-sexo").val(medico.SEXO);
	    $("#txt-direccion").val(medico.DIRECCION);
	    $("#slc-especialidad").val(medico.ESPECIALIDAD);
	    $("#txt-email").val(medico.CORREO);
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
