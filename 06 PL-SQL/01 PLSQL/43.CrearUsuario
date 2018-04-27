CREATE OR REPLACE PROCEDURE PL_CrearUsuario(
  contrasena IN INT
  ,idTipoUsuario IN INT
  ,idTipoCentroMedico IN INT
  ,cnombre IN VARCHAR
  ,cdIreccion IN INT
  ,pNombre IN VARCHAR
  ,sNombre IN VARCHAR
  ,pApellido IN VARCHAR
  ,sApellido IN VARCHAR
  ,direccion IN VARCHAR
  ,noIdentidad IN VARCHAR
  ,idPais IN INT
  ,sexo IN VARCHAR
  ,correo IN VARCHAR
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
  vnconteo INTEGER;
  existePersona INTEGER;
  idPersona INTEGER;
  idCentroMedico INTEGER;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF contrasena = '' OR contrasena IS NULL THEN
    mensaje:= mensaje || 'contrasena, ';
  END IF;
  IF idTipoUsuario = '' OR idTipoUsuario IS NULL THEN
    mensaje:= mensaje || 'idTipoUsuario, ';
  END IF;
  IF idTipoCentroMedico = '' OR idTipoCentroMedico IS NULL THEN
    mensaje:= mensaje || 'idTipoCentroMedico, ';
  END IF;
  IF cnombre = '' OR cnombre IS NULL THEN
    mensaje:= mensaje || 'nombre, ';
  END IF;
  IF cdIreccion = '' OR dIreccion IS NULL THEN
    mensaje:= mensaje || 'dIreccion, ';
  END IF;
  IF pNombre = '' OR pNombre IS NULL THEN
    mensaje:= mensaje || 'pNombre, ';
  END IF;
  IF sNombre = '' OR sNombre IS NULL THEN
    mensaje:= mensaje || 'sNombre, ';
  END IF;
  IF pApellido = '' OR pApellido IS NULL THEN
    mensaje:= mensaje || 'pApellido, ';
  END IF;
  IF sApellido = '' OR sApellido IS NULL THEN
    mensaje:= mensaje || 'sApellido, ';
  END IF;
  IF direccion = '' OR direccion IS NULL THEN
    mensaje:= mensaje || 'direccion, ';
  END IF;
  IF noIdentidad = '' OR noIdentidad IS NULL THEN
    mensaje:= mensaje || 'noIdentidad, ';
  END IF;
  IF idPais = '' OR idPais IS NULL THEN
    mensaje:= mensaje || 'idPais, ';
  END IF;
  IF sexo = '' OR sexo IS NULL THEN
    mensaje:= mensaje || 'sexo, ';
  END IF;
  IF correo = '' OR correo IS NULL THEN
    mensaje:= mensaje || 'correo, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
SELECT
    COUNT(*)
  INTO VnConteo
  FROM TIPOUSUARIO
  WHERE idTipoUsuario=ID_TIPO_USUARIO
  ;
  IF vnconteo=0 THEN
    mensaje:='No existe';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO VnConteo
  FROM TIPOCENTRO
  WHERE idTipoCentroMedico= ID_TIPO_CENTRO
  ;
  IF vnconteo=0 THEN
    mensaje:='No existe';
    RETURN;
  END IF;

  existePersona:=FN_VERIFICARPERSONA(noIdentidad, mensaje);

  IF existePersona = 1 THEN
    SELECT
      ID_PERSONA
    INTO idPersona
    FROM PERSONA
    WHERE NO_IDENTIDAD = noIdentidad;
  ELSE
    idPersona:=FN_CREARPERSONA(pNombre, sNombre, pApellido, sApellido,
                               direccion, noIdentidad, idPersona, sApellido, correo, mensaje);
    IF idPersona=0 THEN
      resultado:=0;
      mensaje:='No se pudo realizar inserción';
      RETURN;
    END IF;
  END IF;

  INSERT INTO CENTROMEDICO (
    NOMBRE,
    DIRECCION,
    ID_TIPO_CENTRO
  )VALUES (
    cnombre,
    cdIreccion,
    idTipoCentroMedico
  )RETURNING ID_CENTRO_MEDICO into idCentroMedico;

  INSERT INTO USUARIO(
    CONTRASEÑA,
    ID_TIPO_USUARIO,
    ID_PERSONA,
    ID_CENTRO_MEDICO
    )VALUES (
    contrasena,
    idTipoCentroMedico,
    idPersona,
    idCentroMedico
  );
COMMIT;
  resultado:=1;
  mensaje:='la insercion fue realizada correctamente';
END;