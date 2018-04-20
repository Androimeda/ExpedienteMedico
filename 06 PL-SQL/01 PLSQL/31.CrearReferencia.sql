CREATE OR REPLACE PROCEDURE PL_CrearReferencia(
  idReferencia IN INT
  ,descripcion IN VARCHAR
  ,idMedico IN INT
  ,idExpediente IN INT
  ,idCentroMedicoRemite IN INT
  ,idCentroMedicoRecibe IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idReferencia = '' OR idReferencia IS NULL THEN
    mensaje:= mensaje || 'idReferencia, ';
  END IF;
  IF descripcion = '' OR descripcion IS NULL THEN
    mensaje:= mensaje || 'descripcion, ';
  END IF;
  IF idMedico = '' OR idMedico IS NULL THEN
    mensaje:= mensaje || 'idMedico, ';
  END IF;
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF idCentroMedicoRemite = '' OR idCentroMedicoRemite IS NULL THEN
    mensaje:= mensaje || 'idCentroMedicoRemite, ';
  END IF;
  IF idCentroMedicoRecibe = '' OR idCentroMedicoRecibe IS NULL THEN
    mensaje:= mensaje || 'idCentroMedicoRecibe, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;