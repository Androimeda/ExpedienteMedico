/*** Vista 1:: *****/
/*** Todos los pacientes *****/

CREATE OR REPLACE VIEW VistaPaciente
AS

SELECT
  p.ID_PERSONA,
  pa.ID_PACIENTE,
  p.P_NOMBRE,
  p.S_NOMBRE,
  p.P_APELLIDO,
  p.S_APELLIDO,
  p.NO_IDENTIDAD,
  (SELECT n.FECHA_HORA FROM NATALIDAD n WHERE n.ID_EXPEDIENTE=exp.ID_EXPEDIENTE) as fecha_nac,
  (SELECT n.ID_MADRE FROM NATALIDAD n WHERE n.ID_EXPEDIENTE=exp.ID_EXPEDIENTE) as id_madre,
  (SELECT n.ID_PADRE FROM NATALIDAD n WHERE n.ID_EXPEDIENTE=exp.ID_EXPEDIENTE) as id_padre,
  (
    SELECT
      per.p_nombre || ' '  || per.s_nombre ||  ' '  || per.p_apellido || ' '  || per.s_apellido
      FROM PERSONA per
      WHERE per.ID_PERSONA = (SELECT n.ID_MADRE FROM NATALIDAD n WHERE n.ID_EXPEDIENTE=exp.ID_EXPEDIENTE)
  ) as madre,
  (
    SELECT
      per.p_nombre || ' '  || per.s_nombre ||  ' '  || per.p_apellido || ' '  || per.s_apellido
      FROM PERSONA per
      WHERE per.ID_PERSONA = (SELECT n.ID_PADRE FROM NATALIDAD n WHERE n.ID_EXPEDIENTE=exp.ID_EXPEDIENTE)
  ) as padre,
  p.DIRECCION,
  asce.ASCENDENCIA,
  pais.NOMBRE as nacionalidad,
  p.SEXO,
  p.CORREO,
  est.ESTADO_CIVIL,
  abo.GRUPO as grupo_sanguineo,
  abo.RH as factor_rh,
  esc.ESCOLARIDAD
  ,esc.ID_ESCOLARIDAD
  ,ocup.ID_OCUPACION
  ,est.ID_ESTADO_CIVIL
  ,ocup.OCUPACION
  ,exp.ID_EXPEDIENTE
  ,exp.FECHA_CREACION as fecha_expediente
FROM Paciente pa
INNER JOIN PERSONA p
  ON p.ID_PERSONA = pa.ID_PERSONA
INNER JOIN TIPOSANGRE abo
  ON abo.ID_TIPO_SANGRE = pa.ID_TIPO_SANGRE
INNER JOIN EXPEDIENTE exp
  ON exp.ID_PACIENTE = pa.ID_PACIENTE
INNER JOIN pais
  ON pais.ID_PAIS = p.ID_PAIS
INNER JOIN ascendencia asce
  ON asce.ID_ASCENDENCIA = pa.ID_ASCENDENCIA
INNER JOIN ESCOLARIDAD esc
  ON esc.ID_ESCOLARIDAD = pa.ID_ESCOLARIDAD
INNER JOIN OCUPACION ocup
  ON ocup.ID_OCUPACION = pa.ID_OCUPACION
INNER JOIN ESTADOCIVIL est
  ON est.ID_ESTADO_CIVIL = pa.ID_ESTADO_CIVIL
;