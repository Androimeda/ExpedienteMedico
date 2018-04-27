CREATE OR REPLACE FUNCTION FN_CrearPersona(
    pNombre     IN  VARCHAR
  , sNombre     IN  VARCHAR
  , pApellido   IN  VARCHAR
  , sApellido   IN  VARCHAR
  , direccion   IN  VARCHAR
  , noIdentidad IN  VARCHAR
  , idPais      IN  INT
  , sexo        IN  VARCHAR
  , correo      IN  VARCHAR
  , mensaje     OUT VARCHAR
)
  RETURN INTEGER
IS
  --DECLARE
  vnConteo          NUMBER;
  id_persona_insert INTEGER;
  BEGIN
    mensaje := '';
    /*----------------VALIDACION DE CAMPOS----------------*/
    IF pNombre = '' OR pNombre IS NULL
    THEN
      mensaje := mensaje || 'pNombre, ';
    END IF;
    IF sNombre = '' OR sNombre IS NULL
    THEN
      mensaje := mensaje || 'sNombre, ';
    END IF;
    IF pApellido = '' OR pApellido IS NULL
    THEN
      mensaje := mensaje || 'pApellido, ';
    END IF;
    IF sApellido = '' OR sApellido IS NULL
    THEN
      mensaje := mensaje || 'sApellido, ';
    END IF;
    IF direccion = '' OR direccion IS NULL
    THEN
      mensaje := mensaje || 'direccion, ';
    END IF;
    IF noIdentidad = '' OR noIdentidad IS NULL
    THEN
      mensaje := mensaje || 'noIdentidad, ';
    END IF;
    IF idPais = '' OR idPais IS NULL
    THEN
      mensaje := mensaje || 'idPais, ';
    END IF;
    IF sexo = '' OR sexo IS NULL
    THEN
      mensaje := mensaje || 'sexo, ';
    END IF;
    IF correo = '' OR correo IS NULL
    THEN
      mensaje := mensaje || 'correo, ';
    END IF;
    IF mensaje <> '' OR mensaje IS NOT NULL
    THEN
      mensaje := 'Campos requeridos: ' || mensaje;
      RETURN 0;
    END IF;
    /*---------------- CUERPO DEL PL----------------*/
    SELECT COUNT(*)
    INTO vnConteo
    FROM PERSONA
    WHERE ID_PAIS = idPais;
    IF vnConteo = 0
    THEN
      mensaje := 'EL pais con el identificador: ' || idPais || 'no esta registrado';
      RETURN 0;
    END IF;

    INSERT INTO PERSONA (
      P_NOMBRE,
      S_NOMBRE,
      P_APELLIDO,
      S_APELLIDO,
      DIRECCION,
      NO_IDENTIDAD,
      ID_PAIS,
      SEXO,
      CORREO
    ) VALUES (
      pNombre,
      sNombre,
      pApellido,
      sApellido,
      direccion,
      noIdentidad,
      idPais,
      sexo,
      correo
    )
    RETURNING ID_PERSONA INTO id_persona_insert;
    COMMIT;
    mensaje := 'Registro insertado satisfactoriamente';
    RETURN id_persona_insert;
  END;
