CREATE OR REPLACE PROCEDURE PL_crearTratamiento(

  ,dosis IN VARCHAR
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

  IF dosis = '' OR dosis IS NULL THEN
    mensaje:= mensaje || 'dosis, ';
  END IF;
  IF intervaloTiempo = '' OR intervaloTiempo IS NULL THEN
    mensaje:= mensaje || 'intervaloTiempo, ';
  END IF;
  IF fechaInicio = '' OR fechaInicio IS NULL THEN
    mensaje:= mensaje || 'fechaInicio, ';
  END IF;
  IF duracionTratamiento = '' OR duracionTratamiento IS NULL THEN
    mensaje:= mensaje || 'duracionTratamiento, ';
  END IF;
  IF idTipo = '' OR idTipo IS NULL THEN
    mensaje:= mensaje || 'idTipo, ';
  END IF;
  IF idViaSuministro = '' OR idViaSuministro IS NULL THEN
    mensaje:= mensaje || 'idViaSuministro, ';
  END IF;
  IF mensaje<>'' THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
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

  INSERT INTO TRATAMIENTO(

    DOSIS ,
    INTERVALO_TIEMPO,
    FECHA_INICIO,
    DURACION_TRATAMIENTO,
    ID_TIPO,
    ID_VIA_SUMINISTRO

  )VALUES (

    dosis ,
    intervaloTiempo,
    fechaInicio I,
    duracionTratamiento,
    idTipo ,
    idViaSuministro
  );

  COMMIT ;
  mensaje:='Se ingreso la informacion correctamente';
  resultado:=1;

END;