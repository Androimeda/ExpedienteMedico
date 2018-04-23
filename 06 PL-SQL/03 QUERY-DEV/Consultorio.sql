----------------------- CONSULTAS

-- listarTodos /*Por centro*/
SELECT
  *
FROM VistaConsultorio
;

--LISTAR POR PISO
SELECT *
  FROM VistaConsultorio V 
  WHERE V.ID_PISO=%s
  ;
--LISTAR POR CENTRO MEDICO
SELECT*
FROM VistaConsultorio V 
WHERE V.ID_CENTRO_MEDICO=%s OR V.NOMBRE LIKE '%s';

-- listarPor MEDICO
SELECT
  *
FROM VistaConsultorio V
WHERE
  V.ID_MEDICO =%s
;

--eliminar
--DELETE FROM VistaConsultorio
--WHERE id_consultorio =%s;