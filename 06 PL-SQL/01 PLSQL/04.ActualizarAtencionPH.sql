CREATE OR REPLACE PROCEDURE PL_ActualizarAtencionPH(
  idAtencion IN INT
  ,pobservacion IN VARCHAR
  ,fechaHoraAtencion IN TIMESTAMP
  ,idParamedico IN INT
  ,idAmbulancia IN INT
  ,idExpediente IN INT
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
  IF idAtencion = '' OR idAtencion IS NULL THEN
    mensaje:= mensaje || 'idAtencion, ';
  END IF;
  IF pobservacion = '' OR pobservacion IS NULL THEN
    mensaje:= mensaje || 'observacion, ';
  END IF;
  IF fechaHoraAtencion = '' OR fechaHoraAtencion IS NULL THEN
    mensaje:= mensaje || 'fechaHoraAtencion, ';
  END IF;
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
  FROM ATENCIONPREHOSPITALARIA
  WHERE ID_ATENCION = idAtencion
  ;
  IF contador=0 THEN
    mensaje:='No existe registro de AtencionPreHospitalaria';
    RETURN;
  END IF;

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

  UPDATE ATENCIONPREHOSPITALARIA
  SET OBSERVACION= pobservacion,
  FECHA_HORA_ATENCION= fechaHoraAtencion,
  ID_PARAMEDICO= idParamedico,
  ID_AMBULANCIA= idAmbulancia,
  ID_EXPEDIENTE= idExpediente
  WHERE
    ID_ATENCION = idAtencion
  ;
  COMMIT;
  mensaje:='Actualizada   satisfactoriamente';
  resultado:=1;
END;
/