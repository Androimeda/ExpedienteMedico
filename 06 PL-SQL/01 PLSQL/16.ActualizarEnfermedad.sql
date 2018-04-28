CREATE OR REPLACE PROCEDURE PL_ActualizarEnfermedad(
  idEnfermedad IN INT
  ,penfermedad IN VARCHAR
  ,idTipoEnfermedad IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
  contador INTEGER;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idEnfermedad = '' OR idEnfermedad IS NULL THEN
    mensaje:= mensaje || 'idEnfermedad, ';
  END IF;
  IF penfermedad = '' OR penfermedad IS NULL THEN
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
  SELECT
    COUNT(*)
  INTO contador
  FROM ENFERMEDAD
  WHERE ID_ENFERMEDAD = idEnfermedad
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de enfermedad ingresado';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM TIPOENFERMEDAD
  WHERE ID_TIPO_ENFERMEDAD = idTipoEnfermedad
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de enfermedad ingresado';
    RETURN;
  END IF;

  UPDATE ENFERMEDAD
  SET
  ENFERMEDAD= penfermedad,
  ID_TIPO_ENFERMEDAD= idTipoEnfermedad
  WHERE ID_ENFERMEDAD= idEnfermedad
  ;
  COMMIT;
  mensaje:='Actualizada   satisfactoriamente';
  resultado:=1;

END;
/