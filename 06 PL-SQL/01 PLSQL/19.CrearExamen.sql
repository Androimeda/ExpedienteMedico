CREATE OR REPLACE PROCEDURE PL_CrearExamen(
  urlDocumento IN VARCHAR
  ,idTipo IN INT
  ,idCentroMedico IN INT
  ,observacion IN VARCHAR
  ,idExpediente IN INT
  ,fecha IN TIMESTAMP
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
  IF urlDocumento = '' OR urlDocumento IS NULL THEN
    mensaje:= mensaje || 'urlDocumento, ';
  END IF;
  IF idTipo = '' OR idTipo IS NULL THEN
    mensaje:= mensaje || 'idTipo, ';
  END IF;
  IF idCentroMedico = '' OR idCentroMedico IS NULL THEN
    mensaje:= mensaje || 'idCentroMedico, ';
  END IF;
  IF observacion = '' OR observacion IS NULL THEN
    mensaje:= mensaje || 'observacion, ';
  END IF;
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF fecha = '' OR fecha IS NULL THEN
    mensaje:= mensaje || 'fecha, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
  SELECT
    COUNT(*)
  INTO contador
  FROM TIPOEXAMEN
  WHERE ID_TIPO = idTipo
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de tipo de enfermedad';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM CENTROMEDICO
  WHERE ID_CENTRO_MEDICO = idCentroMedico
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de centro medico';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM EXPEDIENTE
  WHERE id_expediente = idExpediente
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de expediente';
    RETURN;
  END IF;

  INSERT INTO EXAMEN
  (URL_DOCUMENTO, ID_TIPO, ID_CENTRO_MEDICO, OBSERVACION, ID_EXPEDIENTE, FECHA) VALUES
  (urlDocumento, idTipo, idCentroMedico, observacion, idExpediente, fecha);
  COMMIT;
  mensaje:='Registro insertado satisfactoriamente';
  resultado:=1;

END;
/