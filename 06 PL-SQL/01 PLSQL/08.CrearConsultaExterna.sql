CREATE OR REPLACE PROCEDURE PL_CrearConsultaExterna(
  idConsultorio IN INT
  ,idExpediente IN INT
  ,idMedico IN INT
  ,fechaHora IN TIMESTAMP
  ,sintomas IN VARCHAR
  ,diagnostico IN VARCHAR
  ,observacion IN VARCHAR
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
  IF  = '' OR  IS NULL THEN
    mensaje:= mensaje || ', ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;