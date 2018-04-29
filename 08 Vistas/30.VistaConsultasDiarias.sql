/*** Vista 6 *****/
/*** Consultas al dia de hoy *****/

CREATE OR REPLACE VIEW VistaConsultasDiarias
AS
SELECT
  *
FROM VistaConsultas vc
WHERE
  EXTRACT (DAY FROM vc.fecha) = EXTRACT(DAY FROM SYSDATE)
  AND EXTRACT (MONTH FROM vc.fecha) = EXTRACT(MONTH FROM SYSDATE)
  AND EXTRACT (YEAR FROM vc.fecha) = EXTRACT(YEAR FROM SYSDATE)
ORDER BY vc.centro_medico, vc.medico, vc.fecha
;