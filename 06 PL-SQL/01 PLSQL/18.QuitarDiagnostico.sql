CREATE OR REPLACE PROCEDURE PL_QuitarDiagnostico(
  idEnfermedad IN INT
  ,idExpediente IN INT
  ,idConsulta IN INT
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
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF idConsulta = '' OR idConsulta IS NULL THEN
    mensaje:= mensaje || 'idConsulta, ';
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
    mensaje:='No existe codigo Enfermedad ingresado';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM EXPEDIENTE
  WHERE id_expediente = idExpediente
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo expediente ingresado';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM CONSULTAEXTERNA
  WHERE ID_CONSULTA = idConsulta
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo Consulta ingresado';
    RETURN;
  END IF;

  UPDATE ENFERMEDADCONSULTA
  SET ESTADO = 0
  WHERE ID_ENFERMEDAD = idEnfermedad
  AND ID_EXPEDIENTE = idExpediente
  AND ID_CONSULTA = idConsulta;

  COMMIT;
  mensaje:='Actualizada satisfactoriamente';
  resultado:=1;

END;
/