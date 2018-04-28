CREATE OR REPLACE FUNCTION FN_VerificarUsuario(
  pcorreo IN VARCHAR
  ,pcontrasena IN VARCHAR
  ,mensaje OUT VARCHAR
) RETURN SMALLINT
IS
--DECLARE
  vnConteo NUMBER;
BEGIN
  mensaje:='';
/*----------------VALIDACION DE CAMPOS----------------*/
  IF pcorreo = '' OR pcorreo IS NULL THEN
    mensaje:= mensaje || 'correo, ';
  END IF;
  IF pcontrasena = '' OR pcontrasena IS NULL THEN
    mensaje:= mensaje || 'contrasena, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN 0;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

  SELECT COUNT(*)
  INTO vnConteo
  FROM USUARIO U
  INNER JOIN PERSONA P
    ON P.ID_PERSONA=U.ID_PERSONA
  WHERE pcorreo=CORREO;

  IF vnConteo=0 THEN
    mensaje:='No existe usuario: '|| pcorreo;
    RETURN 0;
  END IF;

  SELECT COUNT(*)
  INTO vnConteo
  FROM USUARIO U
  INNER JOIN PERSONA P
    ON P.ID_PERSONA=U.ID_PERSONA
  WHERE CONTRASENA = pcontrasena AND pcorreo=CORREO;
  IF vnConteo=0 THEN
    mensaje:='Contrasena de usuario es incorrecta: '|| pcorreo;
    RETURN 0;
  END IF;
  RETURN 1;
END;
