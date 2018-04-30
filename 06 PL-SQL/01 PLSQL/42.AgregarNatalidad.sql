CREATE OR REPLACE PROCEDURE PL_AgregarNatalidad(
  idExpediente IN INT
  ,fechaHora IN TIMESTAMP
  ,ordenPartoMultiple IN INT
  ,idCentroMedico IN INT
  ,idMadre IN INT
  ,idPadre IN INT
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
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF fechaHora = '' OR fechaHora IS NULL THEN
    mensaje:= mensaje || 'fechaHora, ';
  END IF;
  IF idCentroMedico = '' OR idCentroMedico IS NULL THEN
    mensaje:= mensaje || 'idCentroMedico, ';
  END IF;
  IF idMadre = '' OR idMadre IS NULL THEN
    mensaje:= mensaje || 'idMadre, ';
  END IF;
  IF idPadre = '' OR idPadre IS NULL THEN
    mensaje:= mensaje || 'idPadre, ';
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
    mensaje:='No existe codigo de Expediente ingresado';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM CENTROMEDICO
  WHERE ID_CENTRO_MEDICO = idCentroMedico
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de centro medico ingresado';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM PERSONA
  WHERE ID_PERSONA = idMadre
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de persona (madre) en la tabla de personas';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM PERSONA
  WHERE ID_PERSONA = idPadre
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de persona (padre) en la tabla de personas';
    RETURN;
  END IF;


  SELECT
    COUNT(*)
  INTO contador
  FROM NATALIDAD
  WHERE ID_EXPEDIENTE = idExpediente
  ;
  IF contador>0 THEN
    mensaje:='Ya existe registro de natalidad para la persona';
    RETURN;
  END IF;

  INSERT INTO NATALIDAD
  (ID_EXPEDIENTE, FECHA_HORA, ORDEN_PARTO_MULTIPLE, ID_CENTRO_MEDICO, ID_MADRE, ID_PADRE) VALUES
  (idExpediente, fechaHora, ordenPartoMultiple, idCentroMedico, idMadre, idPadre);
  COMMIT;
  mensaje:='Registro insertado satisfactoriamente';
  resultado:=1;
END;
/