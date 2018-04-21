CREATE OR REPLACE PROCEDURE PL_AgregartelefonoxCentro(
  idCentroMedico IN INT
  ,telefono IN VARCHAR
  ,idTipoTelefono IN INT
  ,idPais IN INT
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
  IF idCentroMedico = '' OR idCentroMedico IS NULL THEN
    mensaje:= mensaje || 'idCentroMedico, ';
  END IF;
  IF telefono = '' OR telefono IS NULL THEN
    mensaje:= mensaje || 'telefono, ';
  END IF;
  IF idTipoTelefono = '' OR idTipoTelefono IS NULL THEN
    mensaje:= mensaje || 'idTipoTelefono, ';
  END IF;
  IF idPais = '' OR idPais IS NULL THEN
    mensaje:= mensaje || 'idPais, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
 SELECT COUNT(*) INTO vnConteo
    FROM CENTROMEDICO
    WHERE idCentroMedico=ID_CENTRO_MEDICO ;
  IF vnConteo=0 THEN
    mensaje:='El CENTRO medico con identificador: '||idCentroMedico||' no esta registrado';
    RETURN ;
  END IF;
  SELECT COUNT(*) INTO vnConteo
    FROM TIPOTELEFONO
    WHERE idTipoTelefono=ID_TIPO_TELEFONO;
  IF vnConteo=0 THEN
    mensaje:='El TIPO de telefono: '||idTipoTelefono||' no esta registrado';
    RETURN ;
  END IF;
  SELECT COUNT(*) INTO vnConteo
  FROM PAIS
  WHERE  idPais=ID_PAIS;
IF vnConteo=0 THEN
    mensaje:='EL pais: '|| idPais ||'no esta registrado.';
    RETURN ;
END IF;

  INSERT INTO TELEFONO (
    TELEFONO,
    ID_TIPO_TELEFONO,
    ID_PAIS
  )VALUES(
    telefono,
    idTipoTelefono,
    idPais
  );

  INSERT INTO TELEFONOCENTROMEDICO (
  )VALUES(
    idCentroMedico=ID_CENTRO_MEDICO,
    ?

  )RETURNING ID_TELEFONO INTO ID_TELEFONO;

  COMMIT ;
  mensaje:='Se ingreso la informacion correctamente';
  resultado:=1;
END;

