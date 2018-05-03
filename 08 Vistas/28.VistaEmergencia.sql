------------------------- VISTA EMERGENCIA ------------------------
CREATE OR REPLACE VIEW VistaEmergencia
AS
SELECT
  E.*,
--   PI.DESCRIPCION AS piso,
--   PI.ID_EDIFICIO,
  (SELECT P_NOMBRE ||' '|| S_NOMBRE  ||' '||  P_APELLIDO||' '|| S_APELLIDO FROM VISTAMEDICO v WHERE v.ID_MEDICO = e.ID_MEDICO) as medico,
  (SELECT ESPECIALIDAD FROM VISTAMEDICO v WHERE v.ID_MEDICO = e.ID_MEDICO) as especialidad,
--   CM.NOMBRE as centro_medico,
  PA.ID_PACIENTE,
  PA.P_NOMBRE,
  Pa.P_APELLIDO,
  Pa.NO_IDENTIDAD,
  Pa.SEXO
FROM EMERGENCIA E
INNER JOIN VISTAPACIENTE PA
  ON PA.ID_EXPEDIENTE= E.ID_EXPEDIENTE
;
