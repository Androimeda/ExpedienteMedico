----------------------- CONSULTAS

-- listarTodos /*Por centro*/
SELECT
  *
FROM VistaEnfermedad
ORDER BY tipo_enfermedad, enfermedad
;
--LISTA TIPO ENFERMEDAD
SELECT *
FROM VistaEnfermedadPaciente V
WHERE V.ID_TIPO_ENFERMEDAD=1;

-- listarPorPaciente
SELECT
  *
FROM VistaEnfermedadPaciente V
WHERE
  V.ID_EXPEDIENTE=123
;


--eliminar
DELETE FROM ENFERMEDAD
WHERE ID_ENFERMEDAD = 1;