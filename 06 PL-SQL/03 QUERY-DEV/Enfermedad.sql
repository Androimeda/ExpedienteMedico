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
WHERE V.ID_TIPO_ENFERMEDAD=%s;

-- listarPorPaciente
SELECT
  *
FROM VistaEnfermedadPaciente V
WHERE
  V.ID_EXPEDIENTE=%s
;


--eliminar
DELETE FROM ENFERMEDAD
WHERE ID_ENFERMEDAD =%s;