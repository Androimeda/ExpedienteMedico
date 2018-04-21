----------------------- CONSULTAS

-- listarTodos /*Por centro*/
SELECT
  *
FROM VistaHojaTrabajoSocial h
WHERE
  h.id_expediente = 1
  AND h.id_centro_medico = 1
;

-- listarPorPaciente
SELECT
  *
FROM VistaHojaTrabajoSocial h
WHERE
  h.id_expediente = 1
;

--eliminar
DELETE FROM HOJATRABAJOSOCIAL
WHERE ID_TS = 1;