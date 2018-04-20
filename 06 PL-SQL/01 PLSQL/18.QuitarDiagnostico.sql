CREATE OR REPLACE PROCEDURE PL_QuitarDiagnostico(
  idEnfermedad IN INT
  ,idExpediente IN INT
  ,idConsulta IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idEnfermedad = '' OR idEnfermedad IS NULL THEN
    mensaje:= mensaje || 'idEnfermedad, ';
  END IF;
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF idConsulta = '' OR idConsulta IS NULL THEN
    mensaje:= mensaje || 'idConsulta, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;