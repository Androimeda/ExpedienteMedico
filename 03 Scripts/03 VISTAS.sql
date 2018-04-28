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
  p.DIRECCION,
  asce.ASCENDENCIA,
  pais.NOMBRE as nacionalidad,
  p.SEXO,
  p.CORREO,
  est.ESTADO_CIVIL,
  abo.GRUPO as grupo_sanguineo,
  abo.RH as factor_rh,
  esc.ESCOLARIDAD,
  ocup.OCUPACION,
  exp.ID_EXPEDIENTE,
  exp.FECHA_CREACION as fecha_expediente
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


/*** Vista 10: *****/
 /*** Tratamiento por Consulta *****/
CREATE OR REPLACE VIEW  VistaTratamientoConsultas
AS
SELECT
  vc.*,
  t.ID_TRATAMIENTO,
  t.DOSIS,
  t.INTERVALO_TIEMPO,
  t.FECHA_INICIO,
  t.DURACION_TRATAMIENTO,
  tt.TIPO_TRATAMIENTO,
  vs.VIA_SUMINISTRO
FROM TRATAMIENTOCONSULTA tc
INNER JOIN VistaConsultas vc
  ON vc.ID_CONSULTA = tc.ID_CONSULTA
INNER JOIN TRATAMIENTO t
  ON tc.ID_TRATAMIENTO = t.ID_TRATAMIENTO
INNER JOIN TIPOTRATAMIENTO tt
  ON tt.ID_TIPO = t.ID_TIPO
INNER JOIN VIASUMINISTRO vs
  ON vs.ID_VIA_SUMINISTRO = t.ID_VIA_SUMINISTRO
;


/*** ------------------- VISTA AMBULANCIA ------------------------ *****/
CREATE OR REPLACE VIEW vistaAmbulancia
AS
SELECT 
 A.*, CM.NOMBRE, APH.ID_ATENCION,p.*
FROM AMBULANCIA A 
INNER JOIN CENTROMEDICO CM
  ON CM.ID_CENTRO_MEDICO=A.ID_CENTRO_MEDICO
INNER JOIN  ATENCIONPREHOSPITALARIA APH
  ON APH.ID_AMBULANCIA= A.ID_AMBULANCIA
INNER JOIN PARAMEDICO P
  ON P.ID_PARAMEDICO=APH.ID_PARAMEDICO;


/*** ------------------- VISTAS ATENCION PRE HOSPITALARIA ------------------------ *****/
CREATE OR REPLACE VIEW vistaAPH
AS
SELECT
  APH.ID_ATENCION,
  A.PLACA,
  CM.NOMBRE,
  CM.ID_CENTRO_MEDICO,
  APH.OBSERVACION,
  Ex.ID_EXPEDIENTE,
  P.P_NOMBRE,
  P.S_NOMBRE,
  P.P_APELLIDO,
  P.S_APELLIDO,
  p.NO_IDENTIDAD,
  P.SEXO,
  PA.ID_PARAMEDICO
FROM AMBULANCIA A 
INNER JOIN CENTROMEDICO CM
  ON CM.ID_CENTRO_MEDICO=A.ID_CENTRO_MEDICO
INNER JOIN  ATENCIONPREHOSPITALARIA APH
  ON APH.ID_AMBULANCIA= A.ID_AMBULANCIA
INNER JOIN PARAMEDICO PA
  ON PA.ID_PARAMEDICO=APH.ID_PARAMEDICO
  INNER JOIN EXPEDIENTE EX
  ON EX.ID_EXPEDIENTE=APH.ID_EXPEDIENTE
INNER JOIN PACIENTE PAC
  ON PAC.ID_PACIENTE=EX.ID_PACIENTE
INNER JOIN PERSONA P
  ON P.ID_PERSONA= PA.ID_PARAMEDICO
;


/*** ------------------- VISTAS CENTRO MEDICO ------------------------ *****/
CREATE OR REPLACE VIEW vistaCentroMedico
AS
SELECT 
 CM.*,
 TC.DESCRIPCION,
 T.TELEFONO
FROM CENTROMEDICO CM
INNER JOIN TIPOCENTRO TC
  ON CM.ID_TIPO_CENTRO=TC.ID_TIPO_CENTRO
INNER JOIN TELEFONOCENTROMEDICO TC 
  ON TC.ID_CENTRO_MEDICO= CM.ID_CENTRO_MEDICO
INNER JOIN TELEFONO T
  ON T.ID_TELEFONO=TC.ID_TELEFONO;


/*** ------------------- VISTA CIRUGIA ------------------------ *****/
CREATE OR REPLACE VIEW VistaCirugia
AS
SELECT
    C.ID_INGRESO,
    C.ID_MEDICO,
    C.FECHA_HORA,
    TC.ID_TIPO_CIRUGIA,
    TC.DESCRIPCION as tipo_cirugia,
    H.FECHA_HORA_ALTA,
    H.FECHA_HORA_INGRESO,
    PI.ID_PISO,
    PI.ID_EDIFICIO,
    PI.DESCRIPCION AS descripcion_piso,
    CM.ID_CENTRO_MEDICO,
    CM.ID_TIPO_CENTRO,
    PE.P_NOMBRE,
    PE.S_NOMBRE,
    PE.P_APELLIDO,
    PE.S_APELLIDO,
    PE.NO_IDENTIDAD,
    PE.SEXO,
    ex.ID_EXPEDIENTE
FROM CIRUGIA C
INNER JOIN  TIPOCIRUGIA TC
  ON TC.ID_TIPO_CIRUGIA= C.ID_TIPO_CIRUGIA
INNER JOIN HOSPITALIZACION H
  ON H.ID_INGRESO= C.ID_INGRESO
INNER JOIN PISO PI
  ON PI.ID_PISO=H.ID_PISO
INNER JOIN EDIFICIO E
  ON E.ID_EDIFICIO=PI.ID_EDIFICIO
INNER JOIN CENTROMEDICO CM
  ON CM.ID_CENTRO_MEDICO= E.ID_CENTRO_MEDICO
INNER JOIN EXPEDIENTE EX
  ON EX.ID_EXPEDIENTE=H.ID_EXPEDIENTE
INNER JOIN PACIENTE PA
  ON PA.ID_PACIENTE= EX.ID_PACIENTE
INNER JOIN PERSONA PE
  ON PE.ID_PERSONA= PA.ID_PERSONA
;



/*** ------------------- VISTA CONSULTA EXTERNA ------------------------ *****/
CREATE OR REPLACE VIEW VistaConsultaExterna
AS
SELECT
  CE.ID_CONSULTA,
  CE.FECHA_HORA,
  C.ID_CONSULTORIO,
  PI.ID_PISO,
  PI.DESCRIPCION as piso,
  CM.ID_CENTRO_MEDICO,
  EX.ID_PACIENTE,
  EX.ID_EXPEDIENTE,
  M.ID_MEDICO,
  CM.NOMBRE as centro_medico,
  CM.ID_TIPO_CENTRO,
  TC.DESCRIPCION AS TIPO_CENTRO,
  PE.P_NOMBRE,
  PE.S_NOMBRE,
  PE.P_APELLIDO,
  PE.S_APELLIDO,
  PE.NO_IDENTIDAD,
  PE.SEXO
FROM CONSULTAEXTERNA CE
INNER JOIN CONSULTORIO C
  ON C.ID_CONSULTORIO=CE.ID_CONSULTORIO
INNER JOIN EXPEDIENTE EX
  ON EX.ID_EXPEDIENTE=CE.ID_EXPEDIENTE
INNER JOIN MEDICOCONSULTORIO M
  ON M.ID_MEDICO=CE.ID_MEDICO
INNER JOIN PISO PI
  ON PI.ID_PISO=C.ID_PISO
INNER JOIN EDIFICIO E
  ON E.ID_EDIFICIO=PI.ID_EDIFICIO
INNER JOIN CENTROMEDICO CM
  ON CM.ID_CENTRO_MEDICO= E.ID_CENTRO_MEDICO
INNER JOIN TIPOCENTRO TC
  ON TC.ID_TIPO_CENTRO= CM.ID_TIPO_CENTRO
INNER JOIN PACIENTE PA
  ON PA.ID_PACIENTE= EX.ID_PACIENTE
INNER JOIN PERSONA PE
  ON PE.ID_PERSONA= PA.ID_PERSONA
;


/*** ------------------- VISTA CONSULTORIO ------------------------ *****/
CREATE OR REPLACE VIEW VistaConsultorio
AS
SELECT
    C.*,
    M.ID_MEDICO,
    E.ID_EDIFICIO,
    CM.ID_CENTRO_MEDICO,
    CM.NOMBRE,
    CM.ID_TIPO_CENTRO,
    TC.DESCRIPCION,
    M.ID_TURNO
FROM CONSULTORIO C
INNER JOIN MEDICOCONSULTORIO M 
  ON M.id_consultorio= C.id_consultorio
INNER JOIN PISO PI
  ON PI.ID_PISO=C.ID_PISO
INNER JOIN EDIFICIO E 
  ON E.ID_EDIFICIO=PI.ID_EDIFICIO
INNER JOIN CENTROMEDICO CM 
  ON CM.ID_CENTRO_MEDICO= E.ID_CENTRO_MEDICO
INNER JOIN TIPOCENTRO TC 
  ON TC.ID_TIPO_CENTRO= CM.ID_TIPO_CENTRO
;


CREATE OR REPLACE VIEW VistaEdificio
AS
SELECT
    CM.ID_CENTRO_MEDICO,
    CM.NOMBRE,
    CM.ID_TIPO_CENTRO,
    TC.DESCRIPCION AS TIPO_CENTRO
  ,e.ID_EDIFICIO
  ,e.NOMBRE as edificio
FROM  EDIFICIO E
INNER JOIN CENTROMEDICO CM
  ON CM.ID_CENTRO_MEDICO= E.ID_CENTRO_MEDICO
INNER JOIN TIPOCENTRO TC
  ON TC.ID_TIPO_CENTRO= CM.ID_TIPO_CENTRO
;


/*** ------------------- VISTA EFICIO ------------------------ *****/
CREATE OR REPLACE VIEW VistaEdificio
AS
SELECT
    PI.*,
    CM.ID_CENTRO_MEDICO,
    CM.NOMBRE,
    CM.ID_TIPO_CENTRO,
    TC.DESCRIPCION AS TIPO_CENTRO
FROM  PISO PI
INNER JOIN EDIFICIO E 
  ON E.ID_EDIFICIO=PI.ID_EDIFICIO
INNER JOIN CENTROMEDICO CM 
  ON CM.ID_CENTRO_MEDICO= E.ID_CENTRO_MEDICO
INNER JOIN TIPOCENTRO TC 
  ON TC.ID_TIPO_CENTRO= CM.ID_TIPO_CENTRO
;


CREATE OR REPLACE VIEW VistaPiso
AS
SELECT
p.ID_PISO
,p.DESCRIPCION as piso
,e.ID_EDIFICIO
,e.NOMBRE as edificio
FROM PISO p
INNER JOIN EDIFICIO e
  ON p.ID_EDIFICIO = e.ID_EDIFICIO
INNER JOIN CENTROMEDICO c
  ON e.ID_CENTRO_MEDICO = c.ID_CENTRO_MEDICO
;


/*** Vista 2 :: *****/
/*** Todos los medicos *****/
CREATE OR REPLACE VIEW VistaMedico
AS
SELECT
  med.ID_MEDICO,
  med.NO_COLEGIACION,
  p.ID_PERSONA,
  p.P_NOMBRE,
  p.S_NOMBRE,
  p.P_APELLIDO,
  p.S_APELLIDO,
  p.NO_IDENTIDAD,
  pa.NOMBRE as pais,
  p.SEXO,
  p.CORREO,
  t.especialidad
FROM MEDICO med
INNER JOIN PERSONA p
  ON p.ID_PERSONA = med.ID_PERSONA
INNER JOIN ESPECIALIDAD t
  ON t.ID_ESPECIALIDAD = med.ID_ESPECIALIDAD
INNER JOIN PAIS pa
  ON pa.ID_PAIS = p.ID_PAIS
;


/*** ------------------- VISTA Examen ------------------------ *****/
CREATE OR REPLACE VIEW VistaExamen
AS
SELECT
  E.ID_EXAMEN,
  E.URL_DOCUMENTO,
  E.FECHA,
  TE.ID_TIPO,
  TE.DESCRIPCION AS TIPO_EXAMEN,
  EX.ID_EXPEDIENTE,
  PA.ID_PACIENTE,
  PE.P_NOMBRE,
  PE.S_NOMBRE,
  PE.P_APELLIDO,
  PE.S_APELLIDO,
  PE.NO_IDENTIDAD,
  PE.SEXO,
  CM.ID_CENTRO_MEDICO,
  cm.NOMBRE as centro_medico
FROM EXAMEN E
INNER JOIN TIPOEXAMEN TE
  ON TE.ID_TIPO= E.ID_TIPO
INNER JOIN EXPEDIENTE EX
  ON EX.ID_EXPEDIENTE=E.ID_EXPEDIENTE
INNER JOIN PACIENTE PA
  ON PA.ID_PACIENTE= EX.ID_PACIENTE
INNER JOIN PERSONA PE
  ON PE.ID_PERSONA= PA.ID_PERSONA
INNER JOIN CENTROMEDICO CM
  ON CM.ID_CENTRO_MEDICO= E.ID_CENTRO_MEDICO
INNER JOIN TIPOCENTRO TC
  ON TC.ID_TIPO_CENTRO= CM.ID_TIPO_CENTRO
;


/*** ------------------- VISTA ENFERMEDAD ------------------------ *****/
CREATE OR REPLACE VIEW VistaEnfermedad
AS
SELECT
  e.ID_ENFERMEDAD
,e.ENFERMEDAD
,e.ID_TIPO_ENFERMEDAD
,t.DESCRIPCION as tipo_enfermedad

FROM ENFERMEDAD e
INNER JOIN TIPOENFERMEDAD t
  ON e.ID_TIPO_ENFERMEDAD = t.ID_TIPO_ENFERMEDAD
;


/*** ------------------- VISTA ENFERMEDAD PACIENTE ------------------------ *****/
CREATE OR REPLACE VIEW VistaEnfermedadPaciente
AS
SELECT
    E.ID_ENFERMEDAD,
    E.ID_TIPO_ENFERMEDAD,
    E.ENFERMEDAD,
    EC.FECHA_DIAGNOSTICO,
    EC.ESTADO,
    CE.ID_CONSULTA,
    CE.FECHA_HORA,
    C.ID_CONSULTORIO,
    PI.*,
    EX.ID_PACIENTE,
    EX.ID_EXPEDIENTE,
    M.ID_MEDICO,
    CM.NOMBRE,
    CM.ID_CENTRO_MEDICO,
    CM.ID_TIPO_CENTRO,
    TC.DESCRIPCION AS TIPO_CENTRO,
    PE.P_NOMBRE,
    PE.P_APELLIDO
FROM ENFERMEDAD E
INNER JOIN TIPOENFERMEDAD TE
  ON TE.ID_TIPO_ENFERMEDAD= E.ID_TIPO_ENFERMEDAD
INNER JOIN ENFERMEDADCONSULTA EC 
  ON EC.ID_ENFERMEDAD= E.ID_ENFERMEDAD
INNER JOIN CONSULTAEXTERNA CE
  ON CE.ID_CONSULTA= EC.ID_CONSULTA
INNER JOIN CONSULTORIO C
  ON C.ID_CONSULTORIO=CE.ID_CONSULTORIO
INNER JOIN EXPEDIENTE EX 
  ON EX.ID_EXPEDIENTE=CE.ID_EXPEDIENTE
INNER JOIN MEDICO M
  ON M.ID_MEDICO=CE.ID_MEDICO
INNER JOIN PISO PI
  ON PI.ID_PISO=C.ID_PISO
INNER JOIN EDIFICIO E 
  ON E.ID_EDIFICIO=PI.ID_EDIFICIO
INNER JOIN CENTROMEDICO CM 
  ON CM.ID_CENTRO_MEDICO= E.ID_CENTRO_MEDICO
INNER JOIN TIPOCENTRO TC 
  ON TC.ID_TIPO_CENTRO= CM.ID_TIPO_CENTRO
INNER JOIN PACIENTE PA 
  ON PA.ID_PACIENTE= EX.ID_PACIENTE
INNER JOIN PERSONA PE
  ON PE.ID_PERSONA= PA.ID_PERSONA
;



/*** ------------------- VISTA HOJAS DE TRABAJO SOCIAL ------------------------ *****/
CREATE OR REPLACE VIEW VistaHojaTrabajoSocial
AS
SELECT
h.ID_TS
,h.DESCRIPCION
,c.ID_CENTRO_MEDICO
,c.NOMBRE as centro_medico
,t.DESCRIPCION as tipo_centro_medico
,h.FECHA
,e.ID_EXPEDIENTE
,p.P_NOMBRE
,p.S_NOMBRE
,p.P_APELLIDO
,p.S_APELLIDO
,p.NO_IDENTIDAD
,p.SEXO
FROM HOJATRABAJOSOCIAL h
INNER JOIN CENTROMEDICO c
  ON h.ID_CENTRO_MEDICO = c.ID_CENTRO_MEDICO
INNER JOIN TIPOCENTRO t
  ON t.ID_TIPO_CENTRO = c.ID_TIPO_CENTRO
INNER JOIN EXPEDIENTE e
  ON e.ID_EXPEDIENTE = h.ID_EXPEDIENTE
INNER JOIN PACIENTE pa
  ON pa.ID_PACIENTE = e.ID_PACIENTE
INNER JOIN PERSONA p
  ON p.ID_PERSONA = pa.ID_PERSONA
;


/*** -------------------- VISTATRATAMIENTO -------------------------- *****/
CREATE VIEW VIstaTratamiento
AS
SELECT
t.*
,tp.TIPO_TRATAMIENTO
,v.VIA_SUMINISTRO
FROM TRATAMIENTO t
INNER JOIN TIPOTRATAMIENTO tp
ON t.ID_TIPO = tp.ID_TIPO
INNER JOIN VIASUMINISTRO v
ON t.ID_VIA_SUMINISTRO = v.ID_VIA_SUMINISTRO
;


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


CREATE OR REPLACE VIEW VistaReferencias
AS
WITH GET_CENTRO
AS(
  SELECT
    c.ID_CENTRO_MEDICO,
    p.DESCRIPCION as tipo_centro_medico
  FROM CENTROMEDICO c
  INNER JOIN TIPOCENTRO p
    ON c.ID_TIPO_CENTRO = p.ID_TIPO_CENTRO
),
GET_MEDICO
AS(
  SELECT
    m.ID_MEDICO
    ,p.p_nombre || ' '  || p.s_nombre || ' '  || p.p_apellido || ' '  || p.s_apellido as medico
    ,m.ID_ESPECIALIDAD
    ,e.ESPECIALIDAD
  FROM MEDICO m
  INNER JOIN PERSONA p
    ON m.ID_PERSONA = p.ID_PERSONA
  INNER JOIN ESPECIALIDAD e
    ON m.ID_ESPECIALIDAD = e.ID_ESPECIALIDAD
)
SELECT
  r.ID_REFERENCIA
,r.DESCRIPCION
,r.ID_MEDICO
,(SELECT m.medico FROM GET_MEDICO m WHERE m.ID_MEDICO = r.ID_MEDICO) as medico
,(SELECT ID_CENTRO_MEDICO FROM CENTROMEDICO c WHERE c.ID_CENTRO_MEDICO = r.ID_CENTRO_MEDICO_REMITE) as id_centro_medico_remite
,(SELECT c.tipo_centro_medico FROM GET_CENTRO c WHERE c.ID_CENTRO_MEDICO = r.ID_CENTRO_MEDICO_REMITE) as tipo_centro_medico_remite
,(SELECT NOMBRE FROM CENTROMEDICO c WHERE c.ID_CENTRO_MEDICO = r.ID_CENTRO_MEDICO_REMITE) as centro_medico_remite
,(SELECT ID_CENTRO_MEDICO FROM CENTROMEDICO c WHERE c.ID_CENTRO_MEDICO = r.ID_CENTRO_MEDICO_RECIBE) as id_centro_medico_recibe
,(SELECT c.tipo_centro_medico FROM GET_CENTRO c WHERE c.ID_CENTRO_MEDICO = r.ID_CENTRO_MEDICO_RECIBE) as tipo_centro_medico_recibe
,(SELECT NOMBRE FROM CENTROMEDICO c WHERE c.ID_CENTRO_MEDICO = r.ID_CENTRO_MEDICO_RECIBE) as centro_medico_recibe
,e.ID_EXPEDIENTE
,e.ID_PACIENTE
,per.P_NOMBRE
,per.S_NOMBRE
,per.P_APELLIDO
,per.S_APELLIDO
,per.NO_IDENTIDAD
,per.SEXO
FROM REFERENCIA r
INNER JOIN EXPEDIENTE e
  ON r.ID_EXPEDIENTE = e.ID_EXPEDIENTE
INNER JOIN PACIENTE pa
  ON e.ID_PACIENTE = pa.ID_PACIENTE
INNER JOIN PERSONA per
  ON pa.ID_PERSONA = per.ID_PERSONA
;



/*** ------------------------- VISTA ------------------------------- *****/

CREATE OR REPLACE VIEW VistaTelefonoPersona
AS
SELECT
  p.id_persona
  ,t.ID_TELEFONO
  ,tipo.TIPO_TELEFONO
  ,pa.CODIGO_POSTAL as codigo_area
  ,t.TELEFONO
FROM TELEFONOPERSONA tp
INNER JOIN TELEFONO t
  ON tp.ID_TELEFONO = t.ID_TELEFONO
INNER JOIN PERSONA p
  ON tp.ID_PERSONA = p.ID_PERSONA
INNER JOIN TIPOTELEFONO tipo
  On t.ID_TIPO_TELEFONO = tipo.ID_TIPO_TELEFONO
INNER JOIN pais pa
  ON pa.ID_PAIS = t.ID_PAIS
ORDER BY id_persona
;

CREATE OR REPLACE VIEW VistaTelefonoCentroMedico
AS
SELECT
  c.ID_CENTRO_MEDICO
  ,t.ID_TELEFONO
  ,tipo.TIPO_TELEFONO
  ,pa.CODIGO_POSTAL as codigo_area
  ,t.TELEFONO
FROM TELEFONOCENTROMEDICO tc
INNER JOIN TELEFONO t
  ON tc.ID_TELEFONO = t.ID_TELEFONO
INNER JOIN CENTROMEDICO c
  ON tc.ID_CENTRO_MEDICO = c.ID_CENTRO_MEDICO
INNER JOIN TIPOTELEFONO tipo
  On t.ID_TIPO_TELEFONO = tipo.ID_TIPO_TELEFONO
INNER JOIN pais pa
  ON pa.ID_PAIS = t.ID_PAIS
ORDER BY ID_CENTRO_MEDICO
;



------------------------- VISTA EMERGENCIA ------------------------
CREATE OR REPLACE VIEW VistaEmergencia
AS
SELECT
      E.*,
      MC.ID_TURNO,
      C.*,
      PI.DESCRIPCION,
      PI.ID_EDIFICIO,
      CM.ID_CENTRO_MEDICO,
      CM.NOMBRE,
      EX.ID_EXPEDIENTE,
      EX.ID_PACIENTE,
      PE.P_NOMBRE,
      PE.P_APELLIDO
FROM EMERGENCIA E
INNER JOIN EXPEDIENTE EX 
  ON EX.ID_EXPEDIENTE=E.ID_EXPEDIENTE
INNER JOIN MEDICO M
  ON M.ID_MEDICO= E.ID_MEDICO
INNER JOIN MEDICOCONSULTORIO MC 
  ON MC.ID_MEDICO=M.ID_MEDICO
INNER JOIN CONSULTORIO C 
  ON C.ID_CONSULTORIO=MC.ID_CONSULTORIO
INNER JOIN PISO PI
  ON PI.ID_PISO=C.ID_PISO
INNER JOIN EDIFICIO E 
  ON E.ID_EDIFICIO=PI.ID_EDIFICIO
INNER JOIN CENTROMEDICO CM 
  ON CM.ID_CENTRO_MEDICO= E.ID_CENTRO_MEDICO
INNER JOIN TIPOCENTRO TC 
  ON TC.ID_TIPO_CENTRO= CM.ID_TIPO_CENTRO
INNER JOIN PACIENTE PA 
  ON PA.ID_PACIENTE= EX.ID_PACIENTE
INNER JOIN PERSONA PE 
  ON PE.ID_PERSONA= PA.ID_PERSONA
;



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


/*** Vista 5 *****/
/*** Consultas por persona, doctor y centro medico *****/
CREATE OR REPLACE VIEW VistaConsultas
AS
SELECT
  ce.ID_CONSULTA,
  cem.ID_CENTRO_MEDICO,
  cem.NOMBRE as centro_medico,
  con.ID_CONSULTORIO,
  p.DESCRIPCION as piso,
  ed.NOMBRE as edificio,
  vp.id_persona,
  vp.id_paciente,
  vp.p_nombre,
  vp.s_nombre,
  vp.p_apellido,
  vp.s_apellido,
  vp.no_identidad,
  vp.sexo,
  vp.id_expediente,
  vm.id_medico,
  vm.p_nombre || ' '  || vm.s_nombre ||  ' '  || vm.p_apellido || ' '  || vm.s_apellido as medico,
  vm.especialidad as especialidad,
  ce.DIAGNOSTICO,
  ce.SINTOMAS,
  ce.OBSERVACION,
  ce.FECHA_HORA as fecha
FROM CONSULTAEXTERNA ce
INNER JOIN VistaPaciente vp
  ON ce.ID_EXPEDIENTE = vp.id_expediente
INNER JOIN VistaMedico vm
  ON vm.id_medico = ce.ID_MEDICO
INNER JOIN CONSULTORIO con
  ON con.ID_CONSULTORIO = ce.ID_CONSULTORIO
INNER JOIN PISO p
  ON p.ID_PISO = con.ID_PISO
INNER JOIN EDIFICIO ed
  ON ed.ID_EDIFICIO = p.ID_EDIFICIO
INNER JOIN CENTROMEDICO cem
  ON cem.ID_CENTRO_MEDICO = ed.ID_CENTRO_MEDICO
;


/*** Vista 6 *****/
/*** Consultas al dia de hoy *****/

CREATE OR REPLACE VIEW VistaConsultasDiarias
AS
SELECT
  *
FROM VistaConsultas vc
WHERE
  EXTRACT (DAY FROM vc.fecha) = EXTRACT(DAY FROM SYSDATE)
  AND EXTRACT (MONTH FROM vc.fecha) = EXTRACT(MONTH FROM SYSDATE)
  AND EXTRACT (YEAR FROM vc.fecha) = EXTRACT(YEAR FROM SYSDATE)
ORDER BY vc.centro_medico, vc.medico, vc.fecha
;


/*** Vista 7 *****/
/*** Personas Hospitalizadas *****/
CREATE OR REPLACE VIEW VistaHospitalizaciones
AS
SELECT
  hp.ID_INGRESO,
  hp.OBSERVACION,
  hp.FECHA_HORA_INGRESO,
  hp.FECHA_HORA_ALTA,
  cem.ID_CENTRO_MEDICO,
  cem.NOMBRE as centro,
  tc.DESCRIPCION as tipo_centro,
  ed.NOMBRE as edificio,
  p.ID_PISO,
  p.DESCRIPCION as sala,
  hp.CAMA,
  vm.id_medico,
  vm.p_nombre || ' '  || vm.s_nombre ||  ' '  || vm.p_apellido || ' '  || vm.s_apellido as medico,
  vm.especialidad as especialidad,
  vp.id_expediente,
  vp.id_paciente,
  vp.p_nombre,
  vp.s_nombre,
  vp.p_apellido,
  vp.s_apellido,
  vp.no_identidad,
  vp.sexo
FROM HOSPITALIZACION hp
INNER JOIN VistaMedico vm
  ON vm.id_medico = hp.ID_MEDICO
INNER JOIN PISO p
  ON hp.ID_PISO = p.ID_PISO
INNER JOIN EDIFICIO ed
  ON p.ID_EDIFICIO = ed.ID_EDIFICIO
INNER JOIN CENTROMEDICO cem
  ON cem.ID_CENTRO_MEDICO = ed.ID_CENTRO_MEDICO
INNER JOIN TIPOCENTRO tc
  ON tc.ID_TIPO_CENTRO = cem.ID_TIPO_CENTRO
INNER JOIN VistaPaciente vp
  ON vp.id_expediente = hp.ID_EXPEDIENTE
ORDER BY cem.ID_CENTRO_MEDICO, vm.id_medico
;


/*** Vista 8 *****/
/*** Consultorios por centro medico y medico *****/
CREATE OR REPLACE VIEW VistaConsultorioTurno
AS
SELECT
  con.ID_CONSULTORIO
  ,vm.id_medico
  ,vm.p_nombre || ' '  || vm.s_nombre ||  ' '  || vm.p_apellido || ' '  || vm.s_apellido as medico
  ,vm.especialidad as especialidad
  ,t.DESCRIPCION turno
  ,t.HORA_INICIO
  ,t.HORA_FIN
  ,p.DESCRIPCION as piso
  ,ed.NOMBRE as edificio
  ,ed.ID_CENTRO_MEDICO
  ,tc.DESCRIPCION as tipo_centro
  ,cem.NOMBRE as nombre_centro
FROM CONSULTORIO con
INNER JOIN MEDICOCONSULTORIO medcon
  ON medcon.ID_CONSULTORIO = con.ID_CONSULTORIO
INNER JOIN CONSULTORIO con
  ON con.ID_CONSULTORIO = medcon.ID_CONSULTORIO
INNER JOIN VistaMedico vm
  ON vm.id_medico = medcon.ID_MEDICO
INNER JOIN PISO p
  ON p.ID_PISO = con.ID_PISO
INNER JOIN EDIFICIO ed
  ON ed.ID_EDIFICIO = p.ID_EDIFICIO
INNER JOIN CENTROMEDICO cem
  ON cem.ID_CENTRO_MEDICO = ed.ID_CENTRO_MEDICO
INNER JOIN TURNO t
  ON t.ID_TURNO = medcon.ID_TURNO
INNER JOIN TIPOCENTRO tc
  ON tc.ID_TIPO_CENTRO = cem.ID_TIPO_CENTRO
ORDER BY cem.ID_CENTRO_MEDICO, vm.id_medico
;


/*** Vista 9 *****/
/*** Enfermedades diagnosticadas *****/
CREATE OR REPLACE VIEW VistaEnfermedadesConsultas
AS
SELECT
  e.ID_ENFERMEDAD
  ,e.ENFERMEDAD
  ,tpe.DESCRIPCION
  ,ce.ID_CONSULTA
  ,ec.estado
  ,ec.FECHA_DIAGNOSTICO as fecha
  ,vm.p_nombre || ' '  || vm.s_nombre || ' '  || vm.p_apellido || ' '  || vm.s_apellido as medico
  ,vm.especialidad as especialidad
  ,vp.id_expediente
  ,vp.id_paciente
  ,vp.p_nombre
  ,vp.s_nombre
  ,vp.p_apellido
  ,vp.s_apellido
  ,vp.no_identidad
  ,vp.grupo_sanguineo || vp.factor_rh as tipo_sangre
FROM ENFERMEDADCONSULTA ec
INNER JOIN ENFERMEDAD e
  ON e.ID_ENFERMEDAD = ec.ID_ENFERMEDAD
INNER JOIN TIPOENFERMEDAD tpe
  ON tpe.ID_TIPO_ENFERMEDAD = e.ID_TIPO_ENFERMEDAD
INNER JOIN VistaMedico vm
  ON vm.id_medico = ec.ID_MEDICO
INNER JOIN VistaPaciente vp
  ON vp.id_expediente = ec.ID_EXPEDIENTE
INNER JOIN CONSULTAEXTERNA ce
  ON ce.ID_CONSULTA = ec.ID_CONSULTA
;


