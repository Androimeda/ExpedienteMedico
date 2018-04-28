CREATE OR REPLACE PROCEDURE PL_AgregarTelefonoPersona(
  idPersona IN INT
  ,telefono IN VARCHAR
  ,idTipoTelefono IN INT
  ,idPais IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
  vnConteo INTEGER;
  id_telefono_insert INTEGER;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idPersona = '' OR idPersona IS NULL THEN
    mensaje:= mensaje || 'idPersona, ';
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

SELECT
    COUNT(*)
  INTO vnConteo
  FROM PERSONA
  WHERE ID_PERSONA = idPersona
  ;
  IF vnConteo=0 THEN
    mensaje:='No existe codigo de persona ingresado';
    RETURN;
  END IF;


SELECT COUNT(*) INTO vnConteo
  FROM PAIS
  WHERE  idPais=ID_PAIS;
IF vnConteo=0 THEN
    mensaje:='EL pais: '|| idPais ||'no esta registrado.';
    RETURN ;
END IF;

  SELECT
    COUNT(*)
  INTO vnConteo
  FROM TIPOTELEFONO
  WHERE ID_TIPO_TELEFONO = idTipoTelefono
  ;
  IF vnConteo=0 THEN
    mensaje:='No existe codifo de Tipo de Telefono ingresado';
    RETURN;
  END IF;

  INSERT INTO telefono
  (TELEFONO, ID_TIPO_TELEFONO, ID_PAIS)
  VALUES (telefono, idTipoTelefono, idPais)
  RETURNING ID_TELEFONO INTO id_telefono_insert
  ;

  INSERT INTO TELEFONOPERSONA
  (ID_TELEFONO, ID_PERSONA)
  VALUES (id_telefono_insert, idPersona);
  COMMIT ;
  mensaje:='Se ingreso la informacion correctamente';
  resultado:=1;

END;
/