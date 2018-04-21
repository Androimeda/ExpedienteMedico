-- listarPorPersona
SELECT
p.NO_IDENTIDAD
,p.p_nombre || ' '  || p.s_nombre || ' '  || p.p_apellido || ' '  || p.s_apellido as nombre
,v.*
FROM VistaTelefonoPersona v
INNER JOIN PERSONA p
  ON v.ID_PERSONA = p.ID_PERSONA
WHERE v.ID_PERSONA = 1;

-- listarPorCentroMedico
SELECT
t.DESCRIPCION as tipo_centro_medico
,c.NOMBRE as centro_medico
,v.*
FROM VistaTelefonoCentroMedico v
INNER JOIN CENTROMEDICO c
  ON v.ID_CENTRO_MEDICO = c.ID_CENTRO_MEDICO
INNER JOIN TIPOCENTRO t
  ON c.ID_TIPO_CENTRO = t.ID_TIPO_CENTRO
WHERE v.ID_CENTRO_MEDICO = 1;


-- buscarPorPersona
SELECT
p.NO_IDENTIDAD
,p.p_nombre || ' '  || p.s_nombre || ' '  || p.p_apellido || ' '  || p.s_apellido as nombre
,v.*
FROM VistaTelefonoPersona v
INNER JOIN PERSONA p
  ON v.ID_PERSONA = p.ID_PERSONA
WHERE
  p.NO_IDENTIDAD = '123'
  OR LOWER(p.P_NOMBRE) LIKE '%jose%'
  OR LOWER(p.P_APELLIDO) LIKE '%ramirez%'
;


-- buscarPorCentro
SELECT
t.DESCRIPCION as tipo_centro_medico
,c.NOMBRE as centro_medico
,v.*
FROM VistaTelefonoCentroMedico v
INNER JOIN CENTROMEDICO c
  ON v.ID_CENTRO_MEDICO = c.ID_CENTRO_MEDICO
INNER JOIN TIPOCENTRO t
  ON c.ID_TIPO_CENTRO = t.ID_TIPO_CENTRO
WHERE
  LOWER(c.NOMBRE) LIKE '%sur%'
;

-- eliminarDePersona
DELETE FROM TELEFONOPERSONA
WHERE ID_PERSONA = 1 AND ID_TELEFONO = 1;

-- eliminarDeCentro
DELETE FROM TELEFONOCENTROMEDICO
WHERE ID_CENTRO_MEDICO = 1 AND ID_TELEFONO = 1;

-- agregarTipoTelefono
INSERT INTO TIPOTELEFONO
(TIPO_TELEFONO) VALUES
('LOREM');

--listarTipoTelefono
SELECT
  *
FROM TIPOTELEFONO;