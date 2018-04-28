CREATE OR REPLACE PROCEDURE PL_ActualizarEmergencia(
  idIngreso IN INT
  ,pobservacion IN VARCHAR
  ,fechaHoraAtencion IN TIMESTAMP
  ,idExpediente IN INT
  ,idAtencion IN INT
  ,idCentroMedico IN INT
  ,idMedico IN INT
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
  IF idIngreso = '' OR idIngreso IS NULL THEN
    mensaje:= mensaje || 'idIngreso, ';
  END IF;
  IF pobservacion = '' OR pobservacion IS NULL THEN
    mensaje:= mensaje || 'observacion, ';
  END IF;
  IF fechaHoraAtencion = '' OR fechaHoraAtencion IS NULL THEN
    mensaje:= mensaje || 'fechaHoraAtencion, ';
  END IF;
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF idAtencion = '' OR idAtencion IS NULL THEN
    mensaje:= mensaje || 'idAtencion, ';
  END IF;
  IF idCentroMedico = '' OR idCentroMedico IS NULL THEN
    mensaje:= mensaje || 'idCentroMedico, ';
  END IF;
  IF idMedico = '' OR idMedico IS NULL THEN
    mensaje:= mensaje || 'idMedico, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
  SELECT
    COUNT(*)
  INTO contador
  FROM EMERGENCIA
  WHERE ID_INGRESO = idIngreso
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo emergencia ingresado';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM EXPEDIENTE
  WHERE ID_EXPEDIENTE = idExpediente
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo Expediente';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM ATENCIONPREHOSPITALARIA
  WHERE ID_ATENCION = idAtencion
  ;
  IF idAtencion IS NOT NULL AND contador=0 THEN
    mensaje:='No existe codigo de Atencion Pre Hospitalaria';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM CENTROMEDICO
  WHERE ID_CENTRO_MEDICO = idCentroMedico
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de Centro Medico ingresado';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM MEDICO
  WHERE ID_MEDICO = idMedico
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de Medico ingresado';
    RETURN;
  END IF;

  UPDATE EMERGENCIA
  SET
  OBSERVACION=pobservacion,
  FECHA_HORA_ATENCION=fechaHoraAtencion,
  ID_EXPEDIENTE=idExpediente,
  ID_ATENCION=idAtencion,
  ID_CENTRO_MEDICO=idCentroMedico,
  ID_MEDICO=idMedico
  WHERE ID_INGRESO=idIngreso
  ;
  COMMIT;
  mensaje:='Actualizada   satisfactoriamente';
  resultado:=1;

END;
/