CREATE OR REPLACE PROCEDURE PL_ActualizarConsultaExterna(
  idConsulta IN INT
  ,idExpediente IN INT
  ,idConsultorio IN INT
  ,idMedico IN INT
  ,fechaHora IN TIMESTAMP
  ,psintomas IN VARCHAR
  ,pdiagnostico IN VARCHAR
  ,pobservacion IN VARCHAR
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
  IF idConsulta = '' OR idConsulta IS NULL THEN
    mensaje:= mensaje || 'idConsulta, ';
  END IF;
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF idConsultorio = '' OR idConsultorio IS NULL THEN
    mensaje:= mensaje || 'idConsultorio, ';
  END IF;
  IF idMedico = '' OR idMedico IS NULL THEN
    mensaje:= mensaje || 'idMedico, ';
  END IF;
  IF fechaHora = '' OR fechaHora IS NULL THEN
    mensaje:= mensaje || 'fechaHora, ';
  END IF;
  IF psintomas = '' OR psintomas IS NULL THEN
    mensaje:= mensaje || 'sintomas, ';
  END IF;
  IF pdiagnostico = '' OR pdiagnostico IS NULL THEN
    mensaje:= mensaje || 'diagnostico, ';
  END IF;
  IF pobservacion = '' OR pobservacion IS NULL THEN
    mensaje:= mensaje || 'observacion, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

  SELECT
    COUNT(*)
  INTO contador
  FROM CONSULTAEXTERNA
  WHERE ID_CONSULTA = idConsulta
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de consulta ingresada';
    RETURN;
  END IF;


  SELECT
    COUNT(*)
  INTO contador
  FROM CONSULTORIO
  WHERE ID_CONSULTORIO = idConsultorio
  ;
  IF contador=0 THEN
    mensaje:='No existe Consultorio ingresado';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM EXPEDIENTE
  WHERE id_expediente = idExpediente
  ;
  IF contador=0 THEN
    mensaje:='No existe expediente ingresado';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM MEDICO
  WHERE ID_MEDICO = idMedico
  ;
  IF contador=0 THEN
    mensaje:='No existe Medico ingresado';
    RETURN;
  END IF;

  UPDATE CONSULTAEXTERNA
  SET
  ID_EXPEDIENTE= idExpediente,
  ID_CONSULTORIO= idConsultorio,
  ID_MEDICO= idMedico,
  FECHA_HORA= fechaHora,
  SINTOMAS= psintomas,
  DIAGNOSTICO= pdiagnostico,
  OBSERVACION= pobservacion
  WHERE
    ID_CONSULTA= idConsulta;

  COMMIT;
  mensaje:='Actualizada   satisfactoriamente';
  resultado:=1;

END;