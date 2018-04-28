/*** Vista 9 *****/
/*** Enfermedades diagnosticadas *****/
CREATE OR REPLACE VIEW VistaEnfermedadesConsultas
AS
SELECT
  e.ID_ENFERMEDAD
  ,e.ENFERMEDAD
  ,tpe.DESCRIPCION
  ,ce.ID_CONSULTA
  ,ec.estado
  ,ec.FECHA_DIAGNOSTICO as fecha
  ,vm.p_nombre || ' '  || vm.s_nombre || ' '  || vm.p_apellido || ' '  || vm.s_apellido as medico
  ,vm.especialidad as especialidad
  ,vp.id_expediente
  ,vp.id_paciente
  ,vp.p_nombre
  ,vp.s_nombre
  ,vp.p_apellido
  ,vp.s_apellido
  ,vp.no_identidad
  ,vp.grupo_sanguineo || vp.factor_rh as tipo_sangre
FROM ENFERMEDADCONSULTA ec
INNER JOIN ENFERMEDAD e
  ON e.ID_ENFERMEDAD = ec.ID_ENFERMEDAD
INNER JOIN TIPOENFERMEDAD tpe
  ON tpe.ID_TIPO_ENFERMEDAD = e.ID_TIPO_ENFERMEDAD
INNER JOIN VistaMedico vm
  ON vm.id_medico = ec.ID_MEDICO
INNER JOIN VistaPaciente vp
  ON vp.id_expediente = ec.ID_EXPEDIENTE
INNER JOIN CONSULTAEXTERNA ce
  ON ce.ID_CONSULTA = ec.ID_CONSULTA
;