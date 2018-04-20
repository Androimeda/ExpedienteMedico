CREATE OR REPLACE PROCEDURE PL_PL_CrearConsultorio(
  idPiso IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
  contador INT;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idPiso = '' OR idPiso IS NULL THEN
    mensaje:= mensaje || 'idPiso, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
  SELECT
    COUNT(*)
  INTO contador
  FROM PISO
  WHERE ID_PISO = idPiso
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de piso ingresado';
    RETURN;
  END IF;

  INSERT INTO CONSULTORIO
  (ID_PISO) VALUES(idPiso);

  COMMIT;
  mensaje:='Registro insertado satisfactoriamente';
  resultado:=1;


END;