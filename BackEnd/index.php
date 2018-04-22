<?php
# public function ... ($conexion) {...
# Llamada a PL_CrearCentroMedico
include_once("./class/Conexion.php");
include_once('./class/Persona.php');
include_once('./class/Ambulancia.php');
include_once('./class/AtencionPreHospitalaria.php');
include_once('./class/CentroMedico.php');
include_once('./class/Cirugia.php');
include_once('./class/ConsultaExterna.php');
include_once('./class/Consultorio.php');
include_once('./class/Edificio.php');
include_once('./class/Emergencia.php');
include_once('./class/Enfermedad.php');
include_once('./class/Examen.php');
include_once('./class/HojaTrabajoSocial.php');
include_once('./class/Hospitalizacion.php');
include_once('./class/Medico.php');
include_once('./class/Paciente.php');
include_once('./class/Paramedico.php');
include_once('./class/Referencia.php');
include_once('./class/Telefono.php');
include_once('./class/Tratamiento.php');

// $conexion=new Conexion();

// // $a = new CentroMedico();
// // $a->setNombre('Las camelias');
// // $a->setDireccion('Barrio las camelias');
// // $a->setIdTipoCentro(2);
// // echo $a->crear($conexion);

// $b = new Cirugia();
// $b->setDescripcion('Destruccion Facial');
// // echo $b->agregarTipoCirugia($conexion);

// $b = new Cirugia();
// // echo $b->listarTipoCirugia($conexion);

// // $b->setIdIngreso(1);
// // $b->setIdTipoCirugia(1);
// // $b->setIdMedico(1);
// // $b->setFechaHora('SYSDATE');
// $b->setIdCentroMedico(1);
// // echo $b->agregarCirugia($conexion);
// // echo $b->listarPorCentroMedico($conexion);

// $c= new Consultorio();
// $c->setIdMedico(1);
// // echo $c->listarPorMedico($conexion);

// $e= new Enfermedad();
// $e->setIdTipoEnfermedad(6);
// // echo $e->listarPorTipo($conexion);

// $g=new Examen();
// $g->setIdTipo(1);
// echo $g->listarPorTipo($conexion);

$variable ="";
$var ="3";
switch ($variable) {
	case '2':
		# code...
		if ($var==3) {
			echo "string";# code...
			break;
		}
		echo "string3";
		break;
	
	case '3':
		# code...
		if ($var==3) {
			echo "string4";# code...
			break;
		}
		echo "string5";
		break;

	default:
		# code...
		echo "string2";
		break;
}
?>