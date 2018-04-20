CREATE OR REPLACE PROCEDURE PL_ActualizarAmbulancia(
  idAmbulancia IN INT
  ,placa IN VARCHAR
  ,idCentroMedico IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idAmbulancia = '' OR idAmbulancia IS NULL THEN
    mensaje:= mensaje || 'idAmbulancia, ';
  END IF;
  IF placa = '' OR placa IS NULL THEN
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

END;