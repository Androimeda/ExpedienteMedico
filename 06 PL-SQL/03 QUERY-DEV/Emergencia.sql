----------------------- CONSULTAS

-- listarTodos /*Por centro*/
SELECT
  *
FROM VistaEmergencia
;


--LISTAR POR CENTRO MEDICO
SELECT*
FROM VistaEmergencia V 
WHERE V.ID_CENTRO_MEDICO=%s OR V.centro_medico LIKE '%s';


-- listarPorPaciente
SELECT
  *
FROM VistaEmergencia V
WHERE
  V.ID_EXPEDIENTE=%s
;

-- listarPor MEDICO
SELECT
  *
FROM VistaEmergencia V
WHERE
  V.ID_MEDICO =%s
;

--LISTAR POR HOY
SELECT *
FROM VistaEmergencia V 
WHERE V.FECHA_HORA_ATENCION= SYSDATE;


--LISTAR POR CENTRO MEDICO FECHA
SELECT*
FROM VistaEmergencia V
WHERE v.ID_CENTRO_MEDICO=%s AND v.FECHA_HORA_ATENCION =   TO_DATE ('27/02/18', 'dd/mm/yyyy')
;


--LISTAR POR MEDICO FECHA
SELECT*
FROM VistaEmergencia V
WHERE v.ID_MEDICO=%s AND v.FECHA_HORA_ATENCION=  TO_DATE ('27/02/18', 'dd/mm/yyyy')
;

-- listar Por CLINICA/CONSULTORIO
/*SELECT
  *
FROM VistaEmergencia V  
WHERE
  V.ID_CONSULTORIO=%s
;*/


--eliminar
DELETE FROM EMERGENCIA
WHERE ID_INGRESO =%s;