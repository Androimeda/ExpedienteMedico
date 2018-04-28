/*** Vista 3:: *****/
 /*** Telefonos por pacientes *****/

CREATE OR REPLACE VIEW VistaTelefonoPaciente
AS
SELECT
  vp.id_persona
  ,vp.id_paciente
  ,t.ID_TELEFONO
  ,t.TELEFONO
  ,tipo.TIPO_TELEFONO
  ,pa.CODIGO_POSTAL as codigo_area
FROM TELEFONOPERSONA tp
INNER JOIN VistaPaciente vp
  ON vp.id_persona = tp.ID_PERSONA
INNER JOIN TELEFONO t
  ON tp.ID_TELEFONO = t.ID_TELEFONO
INNER JOIN TIPOTELEFONO tipo
  On t.ID_TIPO_TELEFONO = tipo.ID_TIPO_TELEFONO
INNER JOIN pais pa
  ON pa.ID_PAIS = t.ID_PAIS
ORDER BY id_persona
;