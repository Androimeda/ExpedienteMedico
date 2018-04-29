CREATE OR REPLACE VIEW EmergenciaHoy
AS
SELECT * FROM VISTAEMERGENCIA EH
WHERE EXTRACT(DAY FROM EH.FECHA_HORA_ATENCION)= EXTRACT(DAY FROM SYSDATE)
AND EXTRACT(MONTH FROM EH.FECHA_HORA_ATENCION)= EXTRACT(MONTH FROM SYSDATE)
AND EXTRACT(YEAR FROM EH.FECHA_HORA_ATENCION)= EXTRACT(YEAR FROM SYSDATE);