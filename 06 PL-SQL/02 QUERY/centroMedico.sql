----------------------- CONSULTAS


-- listarTodos
SELECT
  *
FROM vistaCentroMedico

;
--listar por tipo centro
SELECT
  *
  FROM vistaCentroMedico V
  WHERE  V.DESCRIPCION='Hospital' OR V.ID_TIPO_CENTRO=1;

