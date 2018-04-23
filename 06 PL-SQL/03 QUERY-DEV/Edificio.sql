----------------------- CONSULTAS

-- listarTodos /*Por centro*/
SELECT
  *
FROM VistaEdificio
;

--LISTAR POR CENTRO MEDICO
SELECT*
FROM VistaEdificio V 
WHERE V.ID_CENTRO_MEDICO=%s OR V.NOMBRE='%s' ;

-- listarPiso
SELECT *
FROM VistaPiso v
WHERE V.ID_PISO=%s
;

--

--eliminar
--DELETE FROM VistaEdificio
--WHERE ID_EDIFICIO =%s;