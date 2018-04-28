CREATE OR REPLACE PROCEDURE PL_CrearMedico(
  pNombre IN VARCHAR
  ,sNombre IN VARCHAR
  ,pApellido IN VARCHAR
  ,sApellido IN VARCHAR
  ,direccion IN VARCHAR
  ,sexo IN VARCHAR
  ,noIdentidad IN VARCHAR
  ,idPais IN INT
  ,idEspecialidad IN VARCHAR
  ,noColegiacion IN VARCHAR
  ,correo IN VARCHAR
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
temMensaje VARCHAR(2000);
vnConteo NUMBER;
id_insert_persona INTEGER;
BEGIN
  id_insert_persona:=0;
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF pNombre = '' OR pNombre IS NULL THEN
    mensaje:= mensaje || 'pNombre, ';
  END IF;
  IF pApellido = '' OR pApellido IS NULL THEN
    mensaje:= mensaje || 'pApellido, ';
  END IF;
  IF sexo = '' OR sexo IS NULL OR SEXO NOT IN ('F','M') THEN
    mensaje:= mensaje || 'sexo (F OR M), ';
  END IF;
  IF noIdentidad = '' OR noIdentidad IS NULL THEN
    mensaje:= mensaje || 'noIdentidad, ';
  END IF;
  IF idPais = '' OR idPais IS NULL THEN
    mensaje:= mensaje || 'idPais, ';
  END IF;
  IF idEspecialidad = '' OR idEspecialidad IS NULL THEN
    mensaje:= mensaje || 'idEspecialidad, ';
  END IF;
  IF noColegiacion = '' OR noColegiacion IS NULL THEN
    mensaje:= mensaje || 'noColegiacion, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
SELECT COUNT(*) INTO vnConteo
  FROM PAIS
  WHERE  idPais=ID_PAIS;
IF vnConteo=0 THEN
    mensaje:='EL pais: '|| idPais ||'no esta registrado.';
  RETURN ;
END IF;

SELECT COUNT(*) INTO vnConteo
  FROM  ESPECIALIDAD
  WHERE  idEspecialidad=ID_ESPECIALIDAD;
IF vnConteo=0 THEN
  mensaje:='La especialidad: '|| idEspecialidad||'no esta registrada';
  RETURN;
END IF;

SELECT COUNT(*) INTO vnConteo
  FROM PERSONA
  WHERE noIdentidad=NO_IDENTIDAD;
IF vnConteo>0 THEN
  mensaje:='El numero de identidad: '|| noIdentidad||' ya existe';

  SELECT
    ID_PERSONA
  INTO id_insert_persona
  FROM PERSONA
  WHERE NO_IDENTIDAD = noIdentidad;

ELSE
  INSERT INTO PERSONA(
    P_NOMBRE,
    S_NOMBRE,
    P_APELLIDO,
    S_APELLIDO,
    DIRECCION,
    NO_IDENTIDAD,
    ID_PAIS,
    SEXO,
    CORREO
  )VALUES (
    pNombre,
    sNombre,
    pApellido,
    sApellido,
    direccion,
    noIdentidad,
    idPais,
    sexo,
    correo
  ) RETURNING ID_PERSONA INTO id_insert_persona;

  IF id_insert_persona=0 THEN
    mensaje:='Ocurrio un error en la insercion de persona, no se guardó nada';
    ROLLBACK;
    RETURN;
  END IF;
END IF;

  SELECT
    COUNT(*)
  INTO vnConteo
  FROM MEDICO
  WHERE ID_PERSONA = id_insert_persona;

  IF vnConteo!=0 THEN
    mensaje:='Registro de Medico ya existe en la tabla, persona con el mismo noIdentidad en tabla medico';
    RETURN;
  ELSE
    INSERT INTO MEDICO(
    NO_COLEGIACION,
    ID_PERSONA,
    ID_ESPECIALIDAD
  )VALUES (
    noColegiacion,
    id_insert_persona,
    idEspecialidad
  );
    COMMIT ;
    mensaje:='La insercion fue exitosa';
    resultado:=1;
  END IF;


END;
/