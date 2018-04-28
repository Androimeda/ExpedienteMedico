CREATE OR REPLACE PROCEDURE PL_CrearConsultaExterna(
  idConsultorio IN INT
  ,idExpediente IN INT
  ,idMedico IN INT
  ,fechaHora IN TIMESTAMP
  ,sintomas IN VARCHAR
  ,diagnostico IN VARCHAR
  ,observacion IN VARCHAR
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
  contador INTEGER;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idConsultorio = '' OR idConsultorio IS NULL THEN
    mensaje:= mensaje || 'idConsultorio, ';
  END IF;
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF idMedico = '' OR idMedico IS NULL THEN
    mensaje:= mensaje || 'idMedico, ';
  END IF;
  IF fechaHora = '' OR fechaHora IS NULL THEN
    mensaje:= mensaje || 'fechaHora, ';
  END IF;
  IF sintomas = '' OR sintomas IS NULL THEN
    mensaje:= mensaje || 'sintomas, ';
  END IF;
  IF diagnostico = '' OR diagnostico IS NULL THEN
    mensaje:= mensaje || 'diagnostico, ';
  END IF;
  IF observacion = '' OR observacion IS NULL THEN
    mensaje:= mensaje || 'observacion, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
  SELECT
    COUNT(*)
  INTO contador
  FROM CONSULTORIO
  WHERE ID_CONSULTORIO = idConsultorio
  ;
  IF contador=0 THEN
    mensaje:='No existe Consultorio ingresado';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM EXPEDIENTE
  WHERE id_expediente = idExpediente
  ;
  IF contador=0 THEN
    mensaje:='No existe expediente ingresado';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM MEDICO
  WHERE ID_MEDICO = idMedico
  ;
  IF contador=0 THEN
    mensaje:='No existe Medico ingresado';
    RETURN;
  END IF;

  INSERT INTO CONSULTAEXTERNA
  (ID_CONSULTORIO, ID_EXPEDIENTE, ID_MEDICO, FECHA_HORA, SINTOMAS, DIAGNOSTICO, OBSERVACION)
  VALUES
  (idConsultorio, idExpediente, idMedico, fechaHora, sintomas, diagnostico, observacion);
  COMMIT;
  mensaje:='Registro insertado satisfactoriamente';
  resultado:=1;


END;
/