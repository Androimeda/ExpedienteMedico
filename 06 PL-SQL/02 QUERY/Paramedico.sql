--- --- --- --- ---  CONSULTAS --- --- --- --- ---

-- eliminar
DELETE FROM PARAMEDICO
WHERE ID_PARAMEDICO = 1;

-- listar
SELECT
  *
FROM VistaParamedico v
WHERE v.ID_PARAMEDICO = 1;

-- listarTodos // Centro Medico

SELECT
  v.*
FROM VistaParamedico v
INNER JOIN ATENCIONPREHOSPITALARIA a
  ON a.ID_PARAMEDICO = v.ID_PARAMEDICO
INNER JOIN AMBULANCIA amb
  ON a.ID_AMBULANCIA = amb.ID_AMBULANCIA
INNER JOIN CENTROMEDICO c
  ON amb.ID_CENTRO_MEDICO = c.ID_CENTRO_MEDICO
WHERE c.ID_CENTRO_MEDICO = 1
;

--buscarPorNombre
SELECT
  *
FROM VistaParamedico v
WHERE
  v.P_NOMBRE = 'Jose'
  OR v.S_NOMBRE = 'David'
;

--buscarPorApellido
SELECT
  *
FROM VistaParamedico v
WHERE
  v.P_APELLIDO = 'Alderson'
  OR v.S_APELLIDO = 'Rodriguez'
;

--buscarPorNoIdentidad
SELECT
  *
FROM VistaParamedico v
WHERE
  v.NO_IDENTIDAD = '125'
;