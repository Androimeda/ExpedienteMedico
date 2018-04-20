CREATE OR REPLACE PROCEDURE PL_ActualizarViaSuministro(
  idViaSuministro IN INT
  ,viaSuministro IN VARCHAR
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idViaSuministro = '' OR idViaSuministro IS NULL THEN
    mensaje:= mensaje || 'idViaSuministro, ';
  END IF;
  IF viaSuministro = '' OR viaSuministro IS NULL THEN
    mensaje:= mensaje || 'viaSuministro, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;