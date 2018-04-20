CREATE OR REPLACE PROCEDURE PL_CrearEmergencia(
  observacion IN VARCHAR
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

END;