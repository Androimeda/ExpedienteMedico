CREATE OR REPLACE PROCEDURE PL_AgregarDefuncion(
  observacionCausa IN VARCHAR
  ,fechaHora IN TIMESTAMP
  ,idExpediente IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
  contador INT;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF observacionCausa = '' OR observacionCausa IS NULL THEN
    mensaje:= mensaje || 'observacionCausa, ';
  END IF;
  IF fechaHora = '' OR fechaHora IS NULL THEN
    mensaje:= mensaje || 'fechaHora, ';
  END IF;
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
SELECT
    COUNT(*)
  INTO contador
  FROM EXPEDIENTE
  WHERE id_expediente = idExpediente
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de expediente ingresado';
    RETURN;
  END IF;

  INSERT INTO DEFUNCION
  (OBSERVACION_CAUSA, FECHA_HORA, ID_EXPEDIENTE) VALUES
  (observacionCausa, fechaHora, idExpediente);
  COMMIT;
  mensaje:='Registro insertado satisfactoriamente';
  resultado:=1;

END;
/