----------------------- CONSULTAS

-- listarTodos /*Por centro*/
SELECT
  *
FROM VistaHojaTrabajoSocial h
WHERE
  h.id_expediente =%s
  AND h.id_centro_medico =%s
;

-- listarPorPaciente
SELECT
  *
FROM VistaHojaTrabajoSocial h
WHERE
  h.id_expediente =%s
;

--eliminar
DELETE FROM HOJATRABAJOSOCIAL
WHERE ID_TS =%s;