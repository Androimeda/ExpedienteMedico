CREATE OR REPLACE PROCEDURE PL_CrearAmbulancia(
  placa IN VARCHAR
  ,idCentro IN INTEGER
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
vnConteo INTEGER;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF placa = '' OR placa IS NULL THEN
    mensaje:= mensaje || 'placa, ';
  END IF;
  IF idCentro = '' OR idCentro IS NULL THEN
    mensaje:= mensaje || 'idCentro, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
    SELECT 
        COUNT(cem.id_centro_medico) 
    INTO vnConteo 
    FROM Centromedico cem
    WHERE Id_Centro_Medico=idCentro;
    IF vnConteo=0 THEN
        mensaje:='No existe Centro Medico para enlazar ambulancia';
        RETURN;
    END IF;
    
    INSERT INTO Ambulancia 
    (placa, Id_Centro_Medico) VALUES (placa, idCentro);
    COMMIT;
    /*Devuelve los valores*/
    mensaje:='Creado exitosamente';
    resultado:=1;
END;
/