----------------------- CONSULTAS

-- listarTodos /*Por centro*/
SELECT
  *
FROM VistaEdificio
;

--LISTAR POR CENTRO MEDICO
SELECT*
FROM VistaEdificio V 
WHERE V.ID_CENTRO_MEDICO=1 OR V.NOMBRE='Clinica del Sur' ;

-- listarPiso
SELECT *
FROM VistaPiso v
WHERE V.ID_PISO=1
;

--

--eliminar
--DELETE FROM VistaEdificio
--WHERE ID_EDIFICIO = 1;