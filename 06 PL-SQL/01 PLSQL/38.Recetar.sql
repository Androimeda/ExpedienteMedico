CREATE OR REPLACE PROCEDURE PL_Recetar(
  idConsulta IN INT
  ,dosis IN VARCHAR
  ,intervaloTiempo IN VARCHAR
  ,duracionTratamiento IN VARCHAR
  ,idTipoTratamiento IN INT
  ,idViaSuministro IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
  contador INT;
  id_insert_tratamiento INT;
BEGIN
  mensaje:='';
  resultado:=0;
  id_insert_tratamiento:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idConsulta = '' OR idConsulta IS NULL THEN
    mensaje:= mensaje || 'idConsulta, ';
  END IF;
  IF dosis = '' OR dosis IS NULL THEN
    mensaje:= mensaje || 'dosis, ';
  END IF;
  IF intervaloTiempo = '' OR intervaloTiempo IS NULL THEN
    mensaje:= mensaje || 'intervaloTiempo, ';
  END IF;
  IF duracionTratamiento = '' OR duracionTratamiento IS NULL THEN
    mensaje:= mensaje || 'duracionTratamiento, ';
  END IF;
  IF idTipoTratamiento = '' OR idTipoTratamiento IS NULL THEN
    mensaje:= mensaje || 'idTipo, ';
  END IF;
  IF idViaSuministro = '' OR idViaSuministro IS NULL THEN
    mensaje:= mensaje || 'idViaSuministro, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

  SELECT
    COUNT(*)
  INTO contador
  FROM TIPOTRATAMIENTO
  WHERE ID_TIPO = idTipoTratamiento
  ;
  IF contador=0 THEN
    mensaje:='No existe TIPO';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM VIASUMINISTRO
  WHERE ID_VIA_SUMINISTRO = idViaSuministro
  ;
  IF contador=0 THEN
    mensaje:='No existe VIA';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM CONSULTAEXTERNA
  WHERE ID_CONSULTA = idConsulta
  ;
  IF contador=0 THEN
    mensaje:='No existe CONSULTA';
    RETURN;
  END IF;


  INSERT INTO TRATAMIENTO
  (DOSIS, INTERVALO_TIEMPO, FECHA_INICIO, DURACION_TRATAMIENTO, ID_TIPO, ID_VIA_SUMINISTRO) VALUES
  (dosis, intervaloTiempo, SYSDATE, duracionTratamiento, idTipoTratamiento, idViaSuministro)
  RETURNING ID_TRATAMIENTO INTO id_insert_tratamiento;

  if id_insert_tratamiento!=0 THEN
    INSERT  INTO TRATAMIENTOCONSULTA(
    ID_CONSULTA,
    ID_TRATAMIENTO
  )VALUES (
    idConsulta,
    id_insert_tratamiento
  );
  COMMIT;
  mensaje:='se ingreso la informacion correctamente';
  resultado:=1;
  ELSE
    mensaje:='Fallo insecion';
    ROLLBACK;
    RETURN;
  END IF;
END;
/