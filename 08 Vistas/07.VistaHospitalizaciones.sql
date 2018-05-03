/*** Vista 7 *****/
/*** Personas Hospitalizadas *****/
CREATE OR REPLACE VIEW VistaHospitalizaciones
AS
SELECT
  hp.ID_INGRESO,
  hp.OBSERVACION,
  hp.FECHA_HORA_INGRESO,
  hp.FECHA_HORA_ALTA,
  cem.ID_CENTRO_MEDICO,
  cem.NOMBRE as centro_medico,
  tc.DESCRIPCION as tipo_centro,
  ed.NOMBRE as edificio,
  p.ID_PISO,
  p.DESCRIPCION as sala,
  hp.CAMA,
  vm.id_medico,
  vm.p_nombre || ' '  || vm.s_nombre ||  ' '  || vm.p_apellido || ' '  || vm.s_apellido as medico,
  vm.especialidad as especialidad,
  vp.id_expediente,
  vp.id_paciente,
  vp.p_nombre,
  vp.s_nombre,
  vp.p_apellido,
  vp.s_apellido,
  vp.no_identidad,
  vp.sexo
FROM HOSPITALIZACION hp
INNER JOIN VistaMedico vm
  ON vm.id_medico = hp.ID_MEDICO
INNER JOIN PISO p
  ON hp.ID_PISO = p.ID_PISO
INNER JOIN EDIFICIO ed
  ON p.ID_EDIFICIO = ed.ID_EDIFICIO
INNER JOIN CENTROMEDICO cem
  ON cem.ID_CENTRO_MEDICO = ed.ID_CENTRO_MEDICO
INNER JOIN TIPOCENTRO tc
  ON tc.ID_TIPO_CENTRO = cem.ID_TIPO_CENTRO
INNER JOIN VistaPaciente vp
  ON vp.id_expediente = hp.ID_EXPEDIENTE
ORDER BY hp.FECHA_HORA_INGRESO,cem.ID_CENTRO_MEDICO, vm.id_medico
;