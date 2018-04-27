$("#nav-item-paciente").addClass("active");

$(document).ready(function() {
  $.ajax({
    url: CONST_SITIO_URL + '/services/ambulancia.php',
    method: 'POST',
    dataType: 'JSON',
    data: {
      'accion': 'listarTodos',
      'idCentroMedico': 1,
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