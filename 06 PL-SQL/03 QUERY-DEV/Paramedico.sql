--- --- --- --- ---  CONSULTAS --- --- --- --- ---

-- eliminar
DELETE FROM PARAMEDICO
WHERE ID_PARAMEDICO =%s;

-- listar
SELECT
  *
FROM VistaParamedico v
WHERE v.ID_PARAMEDICO =%s;

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
WHERE c.ID_CENTRO_MEDICO =%s
;

--buscarPorNombre
SELECT
  *
FROM VistaParamedico v
WHERE
  v.P_NOMBRE = '%s'
  OR v.S_NOMBRE = '%s'
;

--buscarPorApellido
SELECT
  *
FROM VistaParamedico v
WHERE
  v.P_APELLIDO = '%s'
  OR v.S_APELLIDO = '%s'
;

--buscarPorNoIdentidad
SELECT
  *
FROM VistaParamedico v
WHERE
  v.NO_IDENTIDAD = '%s'
;