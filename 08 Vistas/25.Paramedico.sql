/*** - --- --- --- --- --- --- --- ---  VISTA --- --- --- --- --- --- --- *****/
CREATE OR REPLACE VIEW VistaParamedico
AS
SELECT
  par.ID_PARAMEDICO
  ,par.LICENCIA
  ,p.ID_PERSONA
  ,p.P_NOMBRE
  ,p.S_NOMBRE
  ,p.P_APELLIDO
  ,p.S_APELLIDO
  ,p.NO_IDENTIDAD
  ,pa.NOMBRE as pais
  ,p.SEXO
  ,p.CORREO
FROM PARAMEDICO par
INNER JOIN PERSONA p
  ON par.ID_PERSONA = p.ID_PERSONA
INNER JOIN PAIS pa
  ON p.ID_PAIS = pa.ID_PAIS
;