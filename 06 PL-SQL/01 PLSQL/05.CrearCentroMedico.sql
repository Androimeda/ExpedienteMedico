CREATE OR REPLACE PROCEDURE PL_CrearCentroMedico(
  nombre IN VARCHAR
  ,direccion IN VARCHAR
  ,idTipoCentro IN INT
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
  IF nombre = '' OR nombre IS NULL THEN
    mensaje:= mensaje || 'nombre, ';
  END IF;
  IF direccion = '' OR direccion IS NULL THEN
    mensaje:= mensaje || 'direccion, ';
  END IF;
  IF idTipoCentro = '' OR idTipoCentro IS NULL THEN
    mensaje:= mensaje || 'idTipoCentro, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
  SELECT
    COUNT(*)
  INTO contador
  FROM TIPOCENTRO
  WHERE ID_TIPO_CENTRO = idTipoCentro
  ;
  IF contador=0 THEN
    mensaje:='No existe idTipoCentro';
    RETURN;
  END IF;

  INSERT INTO CENTROMEDICO
  (NOMBRE, DIRECCION, ID_TIPO_CENTRO) VALUES
  (nombre, direccion, idTipoCentro);
  COMMIT;

  mensaje:='Registro insertado satisfactoriamente';
  resultado:=1;

END;