CREATE OR REPLACE PROCEDURE PL_CrearReferencia(
  descripcion IN VARCHAR
  ,idMedico IN INT
  ,idExpediente IN INT
  ,idCentroMedicoRemite IN INT
  ,idCentroMedicoRecibe IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
  vnConteo NUMBER;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idMedico = '' OR idMedico IS NULL THEN
    mensaje:= mensaje || 'idMedico, ';
  END IF;
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF idCentroMedicoRemite = '' OR idCentroMedicoRemite IS NULL THEN
    mensaje:= mensaje || 'idCentroMedicoRemite, ';
  END IF;
  IF idCentroMedicoRecibe = '' OR idCentroMedicoRecibe IS NULL THEN
    mensaje:= mensaje || 'idCentroMedicoRecibe, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
  SELECT COUNT(*) INTO vnConteo
    FROM MEDICO
    WHERE idMedico=ID_MEDICO;
  IF vnConteo=0 THEN
    mensaje:='El medico con identificador: '||idMedico||'no esta registrado';
    RETURN ;
  END IF;

 SELECT COUNT(*) INTO vnConteo
    FROM EXPEDIENTE
    WHERE idExpediente=ID_EXPEDIENTE;
  IF vnConteo=0 THEN
    mensaje:='El expediente con identificador: '||idExpediente||'no esta registrado';
    RETURN ;
  END IF;

  SELECT COUNT(*) INTO vnConteo
    FROM CENTROMEDICO
    WHERE ID_CENTRO_MEDICO = idCentroMedicoRemite;
  IF vnConteo=0 THEN
    mensaje:='El CENTRO medico REMITENTE no esta registrado';
    RETURN ;
  END IF;

  SELECT COUNT(*) INTO vnConteo
    FROM CENTROMEDICO
    WHERE ID_CENTRO_MEDICO = idCentroMedicoRecibe;
  IF vnConteo=0 THEN
    mensaje:='El CENTRO medico RECEPTOR no esta registrado';
    RETURN ;
  END IF;

  INSERT INTO REFERENCIA(
    DESCRIPCION,
    ID_MEDICO,
    ID_EXPEDIENTE,
    ID_CENTRO_MEDICO_REMITE,
    ID_CENTRO_MEDICO_RECIBE
  )VALUES (
    descripcion,
    idMedico,
    idExpediente,
    idCentroMedicoRemite,
    idCentroMedicoRecibe
  );
  COMMIT ;
  mensaje:='Se ha creado la referencia con exito CAPITAN!';
  resultado:=1;

END;
/