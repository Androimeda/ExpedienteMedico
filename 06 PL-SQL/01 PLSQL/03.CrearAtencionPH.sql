CREATE OR REPLACE PROCEDURE PL_CrearAtencionPH(
  observacion IN VARCHAR
  ,idParamedico IN int
  ,idAmbulancia IN int
  ,idExpediente IN int
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
  IF idParamedico = '' OR idParamedico IS NULL THEN
    mensaje:= mensaje || 'idParamedico, ';
  END IF;
  IF idAmbulancia = '' OR idAmbulancia IS NULL THEN
    mensaje:= mensaje || 'idAmbulancia, ';
  END IF;
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos:'||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
  SELECT
    COUNT(*)
  INTO contador
  FROM PARAMEDICO
  WHERE ID_PARAMEDICO = idParamedico;
  IF contador=0 THEN
    mensaje:='No existe idParamedico';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM AMBULANCIA
  WHERE ID_AMBULANCIA = idAmbulancia
  ;
  IF contador=0 THEN
    mensaje:='No existe idAmbulancia';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM EXPEDIENTE
  WHERE id_expediente = idExpediente
  ;
  IF contador=0 THEN
    mensaje:='No existe idExpediente';
    RETURN;
  END IF;

  INSERT INTO ATENCIONPREHOSPITALARIA
  (OBSERVACION, FECHA_HORA_ATENCION, ID_PARAMEDICO, ID_AMBULANCIA, ID_EXPEDIENTE)
  VALUES (observacion, SYSDATE, idParamedico, idAmbulancia, idExpediente);
  COMMIT;
  mensaje:='Registro ingresado satisfactoriamente';
  resultado:=1;

END;