CREATE OR REPLACE PROCEDURE PL_ActualizarExamen(
  idExamen IN INT
  ,urlDocumento IN VARCHAR
  ,idTipo IN INT
  ,idCentroMedico IN INT
  ,observacion IN VARCHAR
  ,idExpediente IN INT
  ,fecha IN TIMESTAMP
  , undefined undefined
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idExamen = '' OR idExamen IS NULL THEN
    mensaje:= mensaje || 'idExamen, ';
  END IF;
  IF urlDocumento = '' OR urlDocumento IS NULL THEN
    mensaje:= mensaje || 'urlDocumento, ';
  END IF;
  IF idTipo = '' OR idTipo IS NULL THEN
    mensaje:= mensaje || 'idTipo, ';
  END IF;
  IF idCentroMedico = '' OR idCentroMedico IS NULL THEN
    mensaje:= mensaje || 'idCentroMedico, ';
  END IF;
  IF observacion = '' OR observacion IS NULL THEN
    mensaje:= mensaje || 'observacion, ';
  END IF;
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF fecha = '' OR fecha IS NULL THEN
    mensaje:= mensaje || 'fecha, ';
  END IF;
  IF  = '' OR  IS NULL THEN
    mensaje:= mensaje || ', ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;