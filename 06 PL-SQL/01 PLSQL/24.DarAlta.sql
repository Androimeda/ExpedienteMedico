CREATE OR REPLACE PROCEDURE PL_DarAlta(
  idIngreso IN INT
  ,fechaHoraAlta IN TIMESTAMP
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idIngreso = '' OR idIngreso IS NULL THEN
    mensaje:= mensaje || 'idIngreso, ';
  END IF;
  IF fechaHoraAlta = '' OR fechaHoraAlta IS NULL THEN
    mensaje:= mensaje || 'fechaHoraAlta, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;