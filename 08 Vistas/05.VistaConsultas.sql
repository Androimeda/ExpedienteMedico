/*** Vista 5 *****/
/*** Consultas por persona, doctor y centro medico *****/
CREATE OR REPLACE VIEW VistaConsultas
AS
SELECT
  ce.ID_CONSULTA,
  cem.ID_CENTRO_MEDICO,
  cem.NOMBRE as centro_medico,
  con.ID_CONSULTORIO,
  p.DESCRIPCION as piso,
  ed.NOMBRE as edificio,
  vp.id_persona,
  vp.id_paciente,
  vp.p_nombre,
  vp.s_nombre,
  vp.p_apellido,
  vp.s_apellido,
  vp.no_identidad,
  vp.sexo,
  vp.id_expediente,
  vm.id_medico,
  vm.p_nombre || ' '  || vm.s_nombre ||  ' '  || vm.p_apellido || ' '  || vm.s_apellido as medico,
  vm.especialidad as especialidad,
  ce.DIAGNOSTICO,
  ce.SINTOMAS,
  ce.OBSERVACION,
  ce.FECHA_HORA as fecha
FROM CONSULTAEXTERNA ce
INNER JOIN VistaPaciente vp
  ON ce.ID_EXPEDIENTE = vp.id_expediente
INNER JOIN VistaMedico vm
  ON vm.id_medico = ce.ID_MEDICO
INNER JOIN CONSULTORIO con
  ON con.ID_CONSULTORIO = ce.ID_CONSULTORIO
INNER JOIN PISO p
  ON p.ID_PISO = con.ID_PISO
INNER JOIN EDIFICIO ed
  ON ed.ID_EDIFICIO = p.ID_EDIFICIO
INNER JOIN CENTROMEDICO cem
  ON cem.ID_CENTRO_MEDICO = ed.ID_CENTRO_MEDICO
;