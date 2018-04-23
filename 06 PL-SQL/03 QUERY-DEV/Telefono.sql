-- listarPorPersona
SELECT
p.NO_IDENTIDAD
,p.p_nombre || ' '  || p.s_nombre || ' '  || p.p_apellido || ' '  || p.s_apellido as nombre
,v.*
FROM VistaTelefonoPersona v
INNER JOIN PERSONA p
  ON v.ID_PERSONA = p.ID_PERSONA
WHERE v.ID_PERSONA =%s;

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
WHERE v.ID_CENTRO_MEDICO =%s;


-- buscarPorPersona
SELECT
p.NO_IDENTIDAD
,p.p_nombre || ' '  || p.s_nombre || ' '  || p.p_apellido || ' '  || p.s_apellido as nombre
,v.*
FROM VistaTelefonoPersona v
INNER JOIN PERSONA p
  ON v.ID_PERSONA = p.ID_PERSONA
WHERE
  p.NO_IDENTIDAD = '%s'
  OR LOWER(p.P_NOMBRE) LIKE '%s'
  OR LOWER(p.P_APELLIDO) LIKE '%s'
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
  LOWER(c.NOMBRE) LIKE '%s'
;

-- eliminarDePersona
DELETE FROM TELEFONOPERSONA
WHERE ID_PERSONA =%s AND ID_TELEFONO =%s;

-- eliminarDeCentro
DELETE FROM TELEFONOCENTROMEDICO
WHERE ID_CENTRO_MEDICO =%s AND ID_TELEFONO =%s;

-- agregarTipoTelefono
INSERT INTO TIPOTELEFONO
(TIPO_TELEFONO) VALUES
('%s');

--listarTipoTelefono
SELECT
  *
FROM TIPOTELEFONO;