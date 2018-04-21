CREATE OR REPLACE PROCEDURE PL_CrearHojaTrabajoSocial(
  descripcion IN VARCHAR
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
  WHERE ID_EXPEDIENTE = idExpediente;
IF vnConteo=0 THEN
  mensaje:='No hay registros del expediente' || idExpediente;
RETURN ;
END IF ;

  INSERT INTO HOJATRABAJOSOCIAL(
    DESCRIPCION,
    ID_EXPEDIENTE,
    ID_CENTRO_MEDICO,
    FECHA
  )VALUES (
    descripcion,
    idExpediente,
    idCentroMedico,
    sysdate
  );

   COMMIT;

    mensaje:='Hoja de Trabajo social ingresada correctamente';
    resultado:=1;

END;