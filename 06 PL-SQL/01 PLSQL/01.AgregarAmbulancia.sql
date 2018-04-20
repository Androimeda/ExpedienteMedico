CREATE OR REPLACE PROCEDURE PL_CrearAmbulancia(
    placa IN VARCHAR
    ,idCentro IN INTEGER
    ,mensaje OUT VARCHAR
    ,resultado OUT SMALLINT
)
IS
-- DECLARE
    existeCentro INTEGER; /*Registra el número de registros en tabla CentroMedico*/
BEGIN
    /*Comprobar centro*/
    SELECT 
        COUNT(cem.id_centro_medico) 
    INTO existeCentro 
    FROM Centromedico cem
    WHERE Id_Centro_Medico=idCentro;
    /*Si existe el centro inserta el registro*/
    IF existeCentro !=0 THEN
        /*Insercion*/
        INSERT INTO Ambulancia 
        (placa, Id_Centro_Medico) VALUES (placa, idCentro);
        COMMIT;
        /*Devuelve los valore*/
        mensaje:='Creado exitosamente';
        resultado:=1;
    ELSE
        /*Devuelve los valore*/
        mensaje:='No existe centro medico';
        resultado:=0;
    END IF;
END PL_CrearAmbulancia;