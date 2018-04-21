----------------------- CONSULTAS

-- listarTodos /*Por centro*/
SELECT
  *
FROM VistaExamen
;
--LISTA TIPO EXAMEN
SELECT *
FROM VistaExamen V 
WHERE V.ID_TIPO=1;

--LISTAR POR CENTRO
SELECT *
FROM VistaExamen V 
WHERE V.ID_CENTRO_MEDICO=2 ;

-- listarPorPaciente
SELECT
  *
FROM VistaExamen V
WHERE
  V.ID_EXPEDIENTE=5
;


--eliminar
DELETE FROM EXAMEN
WHERE ID_EXAMEN = 1;