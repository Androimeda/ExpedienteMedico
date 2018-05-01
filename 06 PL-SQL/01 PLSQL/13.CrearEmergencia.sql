CREATE OR REPLACE PROCEDURE PL_CrearEmergencia(
  observacion IN VARCHAR
  ,fechaHoraAtencion IN TIMESTAMP
  ,idExpediente IN INT
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
  IF observacion = '' OR observacion IS NULL THEN
    mensaje:= mensaje || 'observacion, ';
  END IF;
  IF fechaHoraAtencion = '' OR fechaHoraAtencion IS NULL THEN
    mensaje:= mensaje || 'fechaHoraAtencion, ';
  END IF;
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
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

  INSERT INTO EMERGENCIA
  (OBSERVACION, FECHA_HORA_ATENCION,
   ID_EXPEDIENTE, ID_CENTRO_MEDICO, ID_MEDICO)
  VALUES
  (observacion, fechaHoraAtencion, idExpediente, idCentroMedico, idMedico);
  COMMIT;
  mensaje:='Registro insertado satisfactoriamente';
  resultado:=1;
END;
/