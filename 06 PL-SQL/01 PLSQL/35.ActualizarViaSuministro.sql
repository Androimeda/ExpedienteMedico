CREATE OR REPLACE PROCEDURE PL_ActualizarViaSuministro(
  idViaSuministro IN INT
  ,viaSuministro IN VARCHAR
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
  IF idViaSuministro = '' OR idViaSuministro IS NULL THEN
    mensaje:= mensaje || 'idViaSuministro, ';
  END IF;
  IF viaSuministro = '' OR viaSuministro IS NULL THEN
    mensaje:= mensaje || 'viaSuministro, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
SELECT count(*) INTO vnConteo
  FROM VIASUMINISTRO
  WHERE id_via_suministro=idViaSuministro;
IF vnConteo=0 THEN
  mensaje:='NO esta registrado el identificador: '|| idViaSuministro;
END IF;

  UPDATE VIASUMINISTRO
    SET
      VIA_SUMINISTRO=viaSuministro
    WHERE idViaSuministro=ID_VIA_SUMINISTRO;

  COMMIT ;
  mensaje:='Se actualizo la informacion correctamente';
  resultado:=1;

END;