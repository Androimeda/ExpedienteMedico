CREATE OR REPLACE PROCEDURE PL_ActualizarParamedico(
  idParamedico IN INT,
  pdireccion IN VARCHAR
  ,pcorreo IN VARCHAR
  ,plicencia IN VARCHAR
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
  IF pdireccion = '' OR pdireccion IS NULL THEN
    mensaje:= mensaje || 'direccion, ';
  END IF;
  IF pcorreo = '' OR pcorreo IS NULL THEN
    mensaje:= mensaje || 'correo, ';
  END IF;
  IF plicencia = '' OR plicencia IS NULL THEN
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
      DIRECCION=pdireccion,
      CORREO=pcorreo
    WHERE
      ID_PERSONA=
            (SELECT ID_PERSONA
            FROM PARAMEDICO
            WHERE ID_PARAMEDICO=idParamedico);

  UPDATE PARAMEDICO
    SET
      LICENCIA=plicencia
    WHERE idParamedico=ID_PARAMEDICO;

  COMMIT;
  mensaje:='Actualizada satisfactoriamente';
  resultado:=1;
END;