----------------------- CONSULTAS

-- listarTodos /*Por centro*/
SELECT
  *
FROM VistaExamen
;
--LISTA TIPO EXAMEN
SELECT *
FROM VistaExamen V 
WHERE V.ID_TIPO=%s;

--LISTAR POR CENTRO
SELECT *
FROM VistaExamen V 
WHERE V.ID_CENTRO_MEDICO=%s ;

-- listarPorPaciente
SELECT
  *
FROM VistaExamen V
WHERE
  V.ID_EXPEDIENTE=%s
;


--eliminar
DELETE FROM EXAMEN
WHERE ID_EXAMEN =%s;