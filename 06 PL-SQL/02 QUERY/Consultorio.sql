----------------------- CONSULTAS

-- listarTodos /*Por centro*/
SELECT
  *
FROM VistaConsultorio
;

--LISTAR POR PISO
SELECT *
  FROM VistaConsultorio V 
  WHERE V.ID_PISO=1
  ;
--LISTAR POR CENTRO MEDICO
SELECT*
FROM VistaConsultorio V 
WHERE V.ID_CENTRO_MEDICO=1 OR V.NOMBRE LIKE 'Clinicas San Angel';

-- listarPor MEDICO
SELECT
  *
FROM VistaConsultorio V
WHERE
  V.ID_MEDICO = 1
;

--eliminar
--DELETE FROM VistaConsultorio
--WHERE id_consultorio = 1;

-- Turno de consultorios
SELECT
  *
FROM TURNO;