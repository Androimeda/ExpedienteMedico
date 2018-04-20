CREATE OR REPLACE PROCEDURE PL_ActualizarAtencionPH(
  idAtencion IN INT
  ,observacion IN VARCHAR
  ,fechaHoraAtencion IN TIMESTAMP
  ,idParamedico IN INT
  ,idAmbulancia IN INT
  ,idExpediente IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idAtencion = '' OR idAtencion IS NULL THEN
    mensaje:= mensaje || 'idAtencion, ';
  END IF;
  IF observacion = '' OR observacion IS NULL THEN
    mensaje:= mensaje || 'observacion, ';
  END IF;
  IF fechaHoraAtencion = '' OR fechaHoraAtencion IS NULL THEN
    mensaje:= mensaje || 'fechaHoraAtencion, ';
  END IF;
  IF idParamedico = '' OR idParamedico IS NULL THEN
    mensaje:= mensaje || 'idParamedico, ';
  END IF;
  IF idAmbulancia = '' OR idAmbulancia IS NULL THEN
    mensaje:= mensaje || 'idAmbulancia, ';
  END IF;
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos:'||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;