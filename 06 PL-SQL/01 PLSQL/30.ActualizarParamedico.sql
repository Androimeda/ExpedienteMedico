CREATE OR REPLACE PROCEDURE PL_ActualizarParamedico(
  idParamedico IN INT,
  direccion IN VARCHAR
  ,correo IN VARCHAR
  ,licencia IN VARCHAR
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
  IF direccion = '' OR direccion IS NULL THEN
    mensaje:= mensaje || 'direccion, ';
  END IF;
  IF correo = '' OR correo IS NULL THEN
    mensaje:= mensaje || 'correo, ';
  END IF;
  IF licencia = '' OR licencia IS NULL THEN
    mensaje:= mensaje || 'licencia, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
SELECT COUNT(*) INTO vnConteo
  FROM PARAMEDICO
  WHERE ID_PARAMEDICO=idParamedico;
IF vnConteo=0 THEN
  mensaje:=idParamedico ||'No esta registrado como paramedico';
  RETURN ;
END IF;
  UPDATE  PERSONA
    SET
      DIRECCION=direccion,
      CORREO=correo
    WHERE
      ID_PERSONA=
            (SELECT ID_PERSONA
            FROM PARAMEDICO
            WHERE ID_PARAMEDICO=idParamedico);

  UPDATE PARAMEDICO
    SET
      LICENCIA=licencia
    WHERE idParamedico=ID_PARAMEDICO;
END;