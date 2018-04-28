CREATE OR REPLACE FUNCTION FN_VerificarPersona(

  noIdentidad IN VARCHAR
  ,mensaje OUT VARCHAR

) RETURN SMALLINT
IS
--DECLARE
  vnConteo NUMBER;

BEGIN
  mensaje:='';

/*----------------VALIDACION DE CAMPOS----------------*/

  IF noIdentidad = '' OR noIdentidad IS NULL THEN
    mensaje:= mensaje || 'noIdentidad, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN 0;

  END IF;
/*---------------- CUERPO DEL PL----------------*/
  SELECT
    COUNT(*)
  INTO VnConteo
  FROM PERSONA
  WHERE noIdentidad=NO_IDENTIDAD
  ;
  IF vnConteo<>0 THEN
    mensaje:='la persona con identidad: '|| noIdentidad||' ya existe';
    RETURN 1;
  ELSE
    mensaje:='la persona con identidad: '|| noIdentidad||' NO existe';
    RETURN 0;
  END IF;




END;
/