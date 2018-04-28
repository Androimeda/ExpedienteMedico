CREATE OR REPLACE PROCEDURE PL_ActualizarExamen(
  idExamen IN INT
  ,urlDocumento IN VARCHAR
  ,idTipo IN INT
  ,idCentroMedico IN INT
  ,pobservacion IN VARCHAR
  ,idExpediente IN INT
  ,pfecha IN TIMESTAMP
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
  IF idExamen = '' OR idExamen IS NULL THEN
    mensaje:= mensaje || 'idExamen, ';
  END IF;
  IF urlDocumento = '' OR urlDocumento IS NULL THEN
    mensaje:= mensaje || 'urlDocumento, ';
  END IF;
  IF idTipo = '' OR idTipo IS NULL THEN
    mensaje:= mensaje || 'idTipo, ';
  END IF;
  IF idCentroMedico = '' OR idCentroMedico IS NULL THEN
    mensaje:= mensaje || 'idCentroMedico, ';
  END IF;
  IF pobservacion = '' OR pobservacion IS NULL THEN
    mensaje:= mensaje || 'observacion, ';
  END IF;
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF pfecha = '' OR pfecha IS NULL THEN
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
  FROM EXAMEN
  WHERE ID_EXAMEN = idExamen
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de examen ingresado';
    RETURN;
  END IF;


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

  UPDATE EXAMEN
  SET
  URL_DOCUMENTO=urlDocumento,
  ID_TIPO=idTipo,
  ID_CENTRO_MEDICO=idCentroMedico,
  OBSERVACION=pobservacion,
  ID_EXPEDIENTE=idExpediente,
  FECHA=pfecha
  WHERE ID_EXAMEN=idExamen;
END;
/