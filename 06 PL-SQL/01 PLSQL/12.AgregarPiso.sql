CREATE OR REPLACE PROCEDURE PL_AgregarPiso(
  idEdificio IN INT
  ,descripcion IN VARCHAR
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
  contador INTEGER;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idEdificio = '' OR idEdificio IS NULL THEN
    mensaje:= mensaje || 'idEdificio, ';
  END IF;
  IF descripcion = '' OR descripcion IS NULL THEN
    mensaje:= mensaje || 'descripcion, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
  SELECT
    COUNT(*)
  INTO contador
  FROM EDIFICIO
  WHERE ID_EDIFICIO = idEdificio
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de Edificio ingresado';
    RETURN;
  END IF;

  INSERT INTO PISO
  (DESCRIPCION, ID_EDIFICIO) VALUES
  (descripcion, idEdificio);

  COMMIT;
  mensaje:='Registro insertado satisfactoriamente';
  resultado:=1;

END;
/