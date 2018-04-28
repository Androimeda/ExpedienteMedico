CREATE OR REPLACE PROCEDURE PL_ActualizarAmbulancia(
  idAmbulancia IN INT
  ,p_placa IN VARCHAR
  ,idCentroMedico IN INT
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
  IF idAmbulancia = '' OR idAmbulancia IS NULL THEN
    mensaje:= mensaje || 'idAmbulancia, ';
  END IF;
  IF p_placa = '' OR p_placa IS NULL THEN
    mensaje:= mensaje || 'placa, ';
  END IF;
  IF idCentroMedico = '' OR idCentroMedico IS NULL THEN
    mensaje:= mensaje || 'idCentroMedico, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

  /*Verificacion de ambulancias*/
  SELECT
    COUNT(*)
  INTO contador
  FROM AMBULANCIA
  WHERE ID_AMBULANCIA = idAmbulancia
  ;
  IF contador=0 THEN
    mensaje:='No existe idAmbulancia';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM CENTROMEDICO
  WHERE ID_CENTRO_MEDICO = idCentroMedico
  ;
  IF contador=0 THEN
    mensaje:='No existe idCentroMedico';
    RETURN;
  END IF;

  UPDATE AMBULANCIA
  SET
  AMBULANCIA.placa = p_placa,
  ID_CENTRO_MEDICO=idCentroMedico
  WHERE ID_AMBULANCIA=idAmbulancia;

  COMMIT;
  mensaje:='Actualizada satisfactoriamente';
  resultado:=1;
END;
/