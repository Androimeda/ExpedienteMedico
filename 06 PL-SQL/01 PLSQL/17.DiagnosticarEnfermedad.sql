CREATE OR REPLACE PROCEDURE PL_DiagnosticarEnfermedad(
  idEnfermedad IN INT
  ,idMedico IN INT
  ,fechaDiagnostico IN TIMESTAMP
  ,idExpediente IN INT
  ,idConsulta IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE 	contador INTEGER;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idEnfermedad = '' OR idEnfermedad IS NULL THEN
    mensaje:= mensaje || 'idEnfermedad, ';
  END IF;
  IF idMedico = '' OR idMedico IS NULL THEN
    mensaje:= mensaje || 'idMedico, ';
  END IF;
  IF fechaDiagnostico = '' OR fechaDiagnostico IS NULL THEN
    mensaje:= mensaje || 'fechaDiagnostico, ';
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