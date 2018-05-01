@echo off
cd ".\06 PL-SQL\01 PLSQL\"
@echo on
bash 00.call.cmd
copy "99.PROCEDURES.sql" "..\..\03 Scripts\"

@echo off
cd "..\..\"
@echo on

@echo off
cd ".\08 Vistas\"
@echo on
bash 00.call.cmd
copy "98.VISTAS.sql" "..\03 Scripts\"

@echo off
cd "..\"
cd ".\07 Funciones\"
@echo on
bash 00.call.cmd
copy "99.FUNCIONES.sql" "..\03 Scripts\"

@echo off
cd "..\"
cd ".\BackEnd\class\"
@echo on
bash 00.link.cmd

@echo off
cd "..\..\"
@echo on


@echo off
pause
@echo on
cls