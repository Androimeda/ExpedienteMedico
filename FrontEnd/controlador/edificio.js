$("#nav-item-edificio").addClass("active");

function cargaEdificios(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Edificio.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarPorCentro',
	    'idCentroMedico': $("#txt-id-centro-medico").val(),
	    'nombreCentro': '',
	  },
	  success:function(respuesta){
	    $("#tbl-edificio tbody").empty();
	    agregaFilaTablaEdificio(respuesta);
	    $("#slc-edificio").empty();
	    agregaFilaSelectEdificio(respuesta);
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
}

function cargaTablaPiso(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Edificio.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarPisos',
	    'idCentroMedico': $("#txt-id-centro-medico").val(),
	    'idEdificio': $("#slc-edificio").val(),
	  },
	  success:function(respuesta){
	    $("#tbl-piso tbody").empty();
	    $("#slc-piso").empty();	
	    $("#slc-piso").append("<option value='' hidden=''>Piso</option>");	
	    for (var i = 0; i < respuesta.length; i++) {
	    	var piso = respuesta[i];
	    	var fila = 
	    	"<tr>"+
	    		"<td>"+piso.ID_PISO+"</td>"+
	    		"<td>"+piso.DESCRIPCION+"</td>"+
	    	"</tr>";
	    	$("#tbl-piso tbody").append(fila);

	    	var fila2 = '<option value="'+piso.ID_PISO+'">'+piso.DESCRIPCION+'</option>'
	    	$("#slc-piso").append(fila2);	
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

function agregaFilaTablaEdificio (edificios){
	for (var i = 0; i < edificios.length; i++) {
		var edificio = edificios[i];
		var fila = 
		"<tr>"+
			"<td>"+edificio.ID_EDIFICIO+"</td>"+
			"<td>"+edificio.EDIFICIO+"</td>"+
			"<td>"+edificio.TOTAL_PISOS+"</td>"+
		"</tr>";
		$("#tbl-edificio tbody").append(fila);
	}
}

function agregaFilaSelectEdificio (edificios){
	$("#slc-edificio").append("<option value='' hidden=''>Edificio</option>")
	for (var i = 0; i < edificios.length; i++) {
		var edificio = edificios[i];
		var fila = 
		"<option value='"+edificio.ID_EDIFICIO+"'>"+edificio.EDIFICIO+"</option>"
		$("#slc-edificio").append(fila);
	}
}

function agregaEdificio(){
	var nombre = $("#txt-nombre-edificio").val();
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Edificio.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'crear',
	    'nombre': nombre,
	    'idCentroMedico': $("#txt-id-centro-medico").val(),
	  },
	  success:function(respuesta){
	    alert(respuesta.mensaje);
	    $("#txt-nombre-edificio").val("");
	    cargaEdificios();
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
	cargaEdificios();
});

$("#slc-edificio").on("change", function(){
	cargaTablaPiso();
});

function agregarPiso(){
	nombre = $("#txt-nombre-piso").val();
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Edificio.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'agregarPiso',
	    'descripcion': nombre,
	    'idEdificio': $("#slc-edificio").val(),
	  },
	  success:function(respuesta){
	  	alert(respuesta.mensaje);
	    cargaTablaPiso();
	    cargaEdificios();
	    $("#txt-nombre-piso").val("");
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
}

$("#slc-piso").on("change",function(){
	cargarConsultorios();
})

function cargarConsultorios(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Consultorio.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'listarPorPiso',
	    'idPiso': $("#slc-piso").val(),
	  },
	  success:function(respuesta){
	    $("#tbl-consultorio tbody").empty();
	    for (var i = 0; i < respuesta.length; i++) {
	    	consultorio = respuesta[i];
	    	var fila = 
	    	"<tr>"+
	    		"<td>"+consultorio.ID_CONSULTORIO+"</td>"+
	    	"</tr>"
	    	$("#tbl-consultorio tbody").append(fila);
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

function agregarConsultorio(){
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Consultorio.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'crear',
	    'idPiso': $("#slc-piso").val(),
	  },
	  success:function(respuesta){
	    alert(respuesta.mensaje);
	    cargarConsultorios();
	  },
	  error: function(error){
	    console.log(error);
	  },
	  complete: function(){
	    //TO-DO
	  }
	});
}