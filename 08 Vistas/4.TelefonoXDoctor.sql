/*** Vista 4: *****/
/*** Telefono Doctor *****/
CREATE OR REPLACE VIEW VistaTelefonoDoctor(
  id,
  codigo_area,
  telefono,
  id_medico,
  id_persona
)
AS
SELECT
  t.ID_TELEFONO,
  pa.CODIGO_POSTAL,
  t.TELEFONO,
  vm.id_medico,
  vm.id_persona
FROM TELEFONOPERSONA tp
INNER JOIN VistaMedico vm
  ON vm.id_persona = tp.ID_PERSONA
INNER JOIN TELEFONO t
  ON tp.ID_TELEFONO = t.ID_TELEFONO
INNER JOIN pais pa
  ON pa.ID_PAIS = t.ID_PAIS
ORDER BY id_persona
;