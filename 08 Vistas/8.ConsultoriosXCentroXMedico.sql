/*** Vista 8 *****/
/*** Consultorios por centro medico y medico *****/
CREATE OR REPLACE VIEW VistaConsultorioTurno
AS
SELECT
  con.ID_CONSULTORIO
  ,vm.id_medico
  ,vm.p_nombre || ' '  || vm.s_nombre ||  ' '  || vm.p_apellido || ' '  || vm.s_apellido as medico
  ,vm.especialidad as especialidad
  ,t.DESCRIPCION turno
  ,t.HORA_INICIO
  ,t.HORA_FIN
  ,p.DESCRIPCION as piso
  ,ed.NOMBRE as edificio
  ,ed.ID_CENTRO_MEDICO
  ,tc.DESCRIPCION as tipo_centro
  ,cem.NOMBRE as nombre_centro
FROM CONSULTORIO con
INNER JOIN MEDICOCONSULTORIO medcon
  ON medcon.ID_CONSULTORIO = con.ID_CONSULTORIO
INNER JOIN CONSULTORIO con
  ON con.ID_CONSULTORIO = medcon.ID_CONSULTORIO
INNER JOIN VistaMedico vm
  ON vm.id_medico = medcon.ID_MEDICO
INNER JOIN PISO p
  ON p.ID_PISO = con.ID_PISO
INNER JOIN EDIFICIO ed
  ON ed.ID_EDIFICIO = p.ID_EDIFICIO
INNER JOIN CENTROMEDICO cem
  ON cem.ID_CENTRO_MEDICO = ed.ID_CENTRO_MEDICO
INNER JOIN TURNO t
  ON t.ID_TURNO = medcon.ID_TURNO
INNER JOIN TIPOCENTRO tc
  ON tc.ID_TIPO_CENTRO = cem.ID_TIPO_CENTRO
ORDER BY cem.ID_CENTRO_MEDICO, vm.id_medico
;