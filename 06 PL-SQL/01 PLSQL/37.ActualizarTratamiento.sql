CREATE OR REPLACE PROCEDURE PL_ActualizarTratamiento(
  idTratamiento IN INT
  ,pdosis IN VARCHAR
  ,intervaloTiempo IN VARCHAR
  ,fechaInicio IN DATE
  ,duracionTratamiento IN VARCHAR
  ,idTipo IN INT
  ,idViaSuministro IN INT
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
  IF idTratamiento = '' OR idTratamiento IS NULL THEN
    mensaje:= mensaje || 'idTratamiento, ';
    RETURN;
  END IF;
  IF pdosis = '' OR pdosis IS NULL THEN
    mensaje:= mensaje || 'dosis, ';
    RETURN;
  END IF;
  IF intervaloTiempo = '' OR intervaloTiempo IS NULL THEN
    mensaje:= mensaje || 'intervaloTiempo, ';
    RETURN;
  END IF;
  IF fechaInicio = '' OR fechaInicio IS NULL THEN
    mensaje:= mensaje || 'fechaInicio, ';
    RETURN;
  END IF;
  IF duracionTratamiento = '' OR duracionTratamiento IS NULL THEN
    mensaje:= mensaje || 'duracionTratamiento, ';
    RETURN;
  END IF;
  IF idTipo = '' OR idTipo IS NULL THEN
    mensaje:= mensaje || 'idTipo, ';
    RETURN;
  END IF;
  IF idViaSuministro = '' OR idViaSuministro IS NULL THEN
    mensaje:= mensaje || 'idViaSuministro, ';
    RETURN;
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

  SELECT
    COUNT(*)
  INTO vnConteo
  FROM TRATAMIENTO
  WHERE ID_TRATAMIENTO = idTratamiento
  ;
  IF vnConteo=0 THEN
    mensaje:='No existe codigo de tratamiento ingresado';
    RETURN;
  END IF;


  SELECT COUNT(* ) INTO vnConteo
    FROM  TIPOTRATAMIENTO
    WHERE idTipo=ID_TIPO;
  IF vnConteo=0 THEN
    mensaje:='El tipo de tratamiento con el identificador: '||idTipo ||'no esta registrado';
    RETURN ;
  END IF;

  SELECT COUNT(*) INTO vnConteo
    FROM  VIASUMINISTRO
    WHERE idViaSuministro=ID_VIA_SUMINISTRO;
  IF vnConteo=0 THEN
    mensaje:='la via de suministro con identificador: '||idViaSuministro||'no esta registrada';
    RETURN ;
  END IF;

--   INSERT INTO TRATAMIENTO(
--     ID_TRATAMIENTO ,
--     DOSIS ,
--     INTERVALO_TIEMPO,
--     FECHA_INICIO,
--     DURACION_TRATAMIENTO,
--     ID_TIPO,
--     ID_VIA_SUMINISTRO
--
--   )VALUES (
--     idTratamiento ,
--     dosis ,
--     intervaloTiempo,
--     fechaInicio,
--     duracionTratamiento,
--     idTipo ,
--     idViaSuministro
--   );
  UPDATE TRATAMIENTO
  SET
    DOSIS=pdosis
    ,INTERVALO_TIEMPO=intervaloTiempo
    ,FECHA_INICIO = fechaInicio
    ,DURACION_TRATAMIENTO = duracionTratamiento
    ,ID_TIPO = idTipo
    ,ID_VIA_SUMINISTRO = idViaSuministro
  WHERE ID_TRATAMIENTO = idTratamiento;
  COMMIT ;
  mensaje:='Se ingreso la informacion correctamente';
  resultado:=1;
END;