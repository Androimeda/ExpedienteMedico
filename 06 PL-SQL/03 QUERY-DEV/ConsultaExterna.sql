----------------------- CONSULTAS

-- listarTodos /*Por centro*/
SELECT
  *
FROM VistaConsultaExterna
;

-- listarPorPaciente
SELECT
  *
FROM VistaConsultaExterna V
WHERE
  V.ID_EXPEDIENTE=%s
;


--LISTAR POR CENTRO MEDICO
SELECT*
FROM VistaConsultaExterna V 
WHERE V.ID_CENTRO_MEDICO=%s OR V.NOMBRE LIKE '%s';

--LISTAR POR HOY
SELECT *
FROM VistaConsultaExterna V 
WHERE V.FECHA_HORA= SYSDATE;

-- listarPor MEDICO
SELECT
  *
FROM VistaConsultaExterna V
WHERE
  V.ID_MEDICO =%s
;
-- listar Por CONSULTORIO
SELECT
  *
FROM VistaConsultaExterna V  
WHERE
  V.ID_CONSULTORIO=%s
;

--LISTAR POR CENTRO MEDICO FECHA
SELECT*
FROM VistaConsultaExterna V
WHERE v.ID_CENTRO_MEDICO=%s AND v.FECHA_HORA= TO_DATE ('27/02/18')
;

--eliminar
DELETE FROM CONSULTAEXTERNA
WHERE ID_CONSULTA =%s;