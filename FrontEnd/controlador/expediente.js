$("#nav-item-paciente").addClass("active");

$(document).ready(function() {
  $.ajax({
    url: CONST_SITIO_URL + '/services/paciente.php',
    method: 'POST',
    dataType: 'JSON',
    crossDomain: true,
    data: {
      'accion': 'listarTodos',
    },
    success: function (respuesta) {
      console.log(respuesta);
    },
    error: function (error) {
      console.log(error);
    },
    complete: function () {
      //TO-DO
    }
  });
});