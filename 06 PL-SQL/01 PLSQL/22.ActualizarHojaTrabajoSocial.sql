CREATE OR REPLACE PROCEDURE PL_ActualizarHojaTrabajoSocial(
  idTS IN INT
  ,descripcion IN VARCHAR
  ,idExpediente IN INT
  ,idCentroMedico IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
temMensaje VARCHAR(2000);
vnConteo NUMBER;

BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idTS = '' OR idTS IS NULL THEN
    mensaje:= mensaje || 'idTS, ';
  END IF;
  IF descripcion = '' OR descripcion IS NULL THEN
    mensaje:= mensaje || 'descripcion, ';
  END IF;
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF idCentroMedico = '' OR idCentroMedico IS NULL THEN
    mensaje:= mensaje || 'idCentroMedico, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
  SELECT COUNT(*) INTO vnConteo
    FROM EXPEDIENTE
    WHERE ID_EXPEDIENTE= idExpediente;
  IF vnConteo=0 THEN
    mensaje:='No existe el registro con el id: ' || idExpediente;
  END IF;
  SELECT  COUNT(*) INTO vnConteo
    FROM HOJATRABAJOSOCIAL
    WHERE ID_TS=idTS;
  IF vnConteo=0 THEN
    mensaje:='No existe la hoja: ' || idTS;
  END IF;
  SELECT COUNT(*) INTO vnConteo
    FROM  CENTROMEDICO
    WHERE idCentroMedico= ID_centro_medico;
  IF vnConteo=0 THEN
    mensaje:='NO esta registrado el centro medico con id: ' || idCentroMedico;
  END IF;

    UPDATE HOJATRABAJOSOCIAL
      SET
        DESCRIPCION=descripcion,
        ID_EXPEDIENTE= idExpediente,
        ID_CENTRO_MEDICO=idCentroMedico
      WHERE
        idTS=ID_TS;
        mensaje:= 'actualizacion realizada correctamente';
      COMMIT ;
      mensaje:='No se pudo actualizar';
      resultado:=1;

END;