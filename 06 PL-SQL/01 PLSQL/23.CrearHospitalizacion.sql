CREATE OR REPLACE PROCEDURE PL_CrearHospitalizacion(
  observacion IN VARCHAR
  ,fechaHoraIngreso IN TIMESTAMP
  ,fechaHoraAlta IN TIMESTAMP
  ,idPiso IN INT
  ,cama IN VARCHAR
  ,idMedico IN INT
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
  IF observacion = '' OR observacion IS NULL THEN
    mensaje:= mensaje || 'observacion, ';
  END IF;
  IF fechaHoraIngreso = '' OR fechaHoraIngreso IS NULL THEN
    mensaje:= mensaje || 'fechaHoraIngreso, ';
  END IF;
  IF fechaHoraAlta = '' OR fechaHoraAlta IS NULL THEN
    mensaje:= mensaje || 'fechaHoraAlta, ';
  END IF;
  IF idPiso = '' OR idPiso IS NULL THEN
    mensaje:= mensaje || 'idPiso, ';
  END IF;
  IF cama = '' OR cama IS NULL THEN
    mensaje:= mensaje || 'cama, ';
  END IF;
  IF idMedico = '' OR idMedico IS NULL THEN
    mensaje:= mensaje || 'idMedico, ';
  END IF;
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;