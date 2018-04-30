function login (){
	var email = $("#txt-email").val();
	var pass = $("#txt-password").val();
	$.ajax({
	  url:CONST_SITIO_URL+'/services/Usuario.php',
	  method:'POST',
	  dataType:'JSON',
	  data:{
	    'accion':'login',
	    'correo': email,
	    'contrasena': pass,
	  },
	  success:function(respuesta){
	    if (respuesta.resultado==true) {
	    	location.href="index.php";
	    }else{
	    	alert(respuesta.mensaje)
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
