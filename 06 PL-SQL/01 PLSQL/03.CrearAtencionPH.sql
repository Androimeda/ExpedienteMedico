CREATE OR REPLACE PROCEDURE PL_CrearAtencionPH(
  observacion IN VARCHAR
  ,idParamedico IN int
  ,idAmbulancia IN int
  ,idExpediente IN int 
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