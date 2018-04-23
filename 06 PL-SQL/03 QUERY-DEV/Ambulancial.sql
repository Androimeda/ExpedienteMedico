--CONSULTAS
-- listarTodos /*Por centro*/
SELECT
  *
FROM vistaAmbulancia V
WHERE
  v.ID_CENTRO_MEDICO=%s
  --V.ID_PARAMEDICO =%s
  --AND V.ID_AMBULANCIA =%s
;
-- listarPorAmbulancia
SELECT
  *
FROM vistaAmbulancia v
WHERE v.ID_AMBULANCIA=%s OR v.PLACA='%s'
;
-- listarPorcentroMedico
SELECT
  *
FROM vistaAmbulancia v
WHERE v.NOMBRE LIKE '%s' OR  V.ID_CENTRO_MEDICO=%s
;
--eliminar
DELETE FROM AMBULANCIA
WHERE ID_AMBULANCIA =%s;