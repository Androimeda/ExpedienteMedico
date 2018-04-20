CREATE OR REPLACE PROCEDURE PL_ActualizarEnfermedad(
  idEnfermedad IN INT
  ,enfermedad IN VARCHAR
  ,idTipoEnfermedad IN INT
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
  IF enfermedad = '' OR enfermedad IS NULL THEN
    mensaje:= mensaje || 'enfermedad, ';
  END IF;
  IF idTipoEnfermedad = '' OR idTipoEnfermedad IS NULL THEN
    mensaje:= mensaje || 'idTipoEnfermedad, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;