CREATE OR REPLACE PROCEDURE PL_VincularMedico(
  idMedico IN INT
  ,idConsultorio IN INT
  ,idTurno IN INT
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
  IF idMedico = '' OR idMedico IS NULL THEN
    mensaje:= mensaje || 'idMedico, ';
  END IF;
  IF idConsultorio = '' OR idConsultorio IS NULL THEN
    mensaje:= mensaje || 'idConsultorio, ';
  END IF;
  IF idTurno = '' OR idTurno IS NULL THEN
    mensaje:= mensaje || 'id Turno, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

  SELECT
    COUNT(*)
  INTO contador
  FROM MEDICO
  WHERE ID_MEDICO = idMedico
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de medico ingresado';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM CONSULTORIO
  WHERE ID_CONSULTORIO = idConsultorio
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de consultorio ingresado';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM TURNO
  WHERE ID_TURNO = idTurno
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de consultorio ingresado';
    RETURN;
  END IF;

  INSERT INTO MEDICOCONSULTORIO
  (ID_MEDICO, ID_CONSULTORIO, ID_TURNO) VALUES
  (idMedico, idConsultorio, idTurno);
  COMMIT;
  mensaje:='Registro insertado satisfactoriamente';
  resultado:=1;
END;