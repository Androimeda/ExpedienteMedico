CREATE OR REPLACE PROCEDURE PL_CrearEnfermedad(
  enfermedad IN VARCHAR
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

  INSERT INTO ENFERMEDAD
  (ENFERMEDAD, ID_TIPO_ENFERMEDAD) VALUES
  (enfermedad, idTipoEnfermedad);
  COMMIT;
  mensaje:='Registro insertado satisfactoriamente';
  resultado:=1;
END;