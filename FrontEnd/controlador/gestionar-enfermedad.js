$("#nav-item-medicina").addClass("active");

$(document).ready(function(){
	cargaTipos();
});

function cargaTipos(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Enfermedad.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarTipoEnfermedad',
	  },
	  success:function(respuesta){
	    $("#slc-tipo-enfermedad").empty();
	    $("#slc-tipo-enfermedad").append('<option value="" hidden="">Tipo Enfermedad</option>');
	    $("#tbl-tipo-enfermedad tbody").empty();
	    for (var i = 0; i < respuesta.length; i++) {
	    	var tipo = respuesta[i];
	    	var fila1 = '<option value="'+tipo.ID_TIPO_ENFERMEDAD+'">'+tipo.DESCRIPCION+'</option>';
	    	$("#slc-tipo-enfermedad").append(fila1);
	    	var fila2 =
	    	"<tr>"+
	    		"<td>"+tipo.ID_TIPO_ENFERMEDAD+"</td>"+
	    		"<td>"+tipo.DESCRIPCION+"</td>"+
	    		"<td>"+tipo.TOTAL+"</td>"+
	    	"</tr>";
	    	$("#tbl-tipo-enfermedad tbody").append(fila2);
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

$("#slc-tipo-enfermedad").on("change", function(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Enfermedad.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarPorTipo',
	    'idTipoEnfermedad': $("#slc-tipo-enfermedad").val(),
	  },
	  success:function(respuesta){
	  	$("#tbl-enfermedad tbody").empty();
	    for (var i = 0; i < respuesta.length; i++) {
	    	var enf = respuesta[i];
	    	var fila = 
	    	"<tr>"+
	    		"<td>"+enf.ID_ENFERMEDAD+"</td>"+
	    		"<td>"+enf.ENFERMEDAD+"</td>"+
	    	"</tr>";
	    	$("#tbl-enfermedad tbody").append(fila);
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

function agregarTipo(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Enfermedad.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'agregarTipoEnfermedad',
	    'descripcion': $("#txt-tipo-enfermedad").val(),
	  },
	  success:function(respuesta){
	    alert(respuesta.mensaje);
	    cargaTipos();
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
}

function agregarEnfermedad(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Enfermedad.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'crear',
	    'idTipoEnfermedad': $("#slc-tipo-enfermedad").val(),
	    'enfermedad': $("#txt-enfermedad").val(),
	  },
	  success:function(respuesta){
	    console.log(respuesta)
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
}