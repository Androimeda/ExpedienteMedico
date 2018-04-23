import re
import os
tab ="  "
head = "$query=sprintf(\""

def count_s(i):
	return len(re.findall('\%s', i))

filename="Cirugia.sql"
def get_consultas(filename):
	f = open(filename, "r+")
	lineas = f.readlines()
	f.close()

	c=''
	for li in lineas:
		li = li.replace("\n", ' ')
		if not ('--' in li) and (li!='\n'):
			li = li.replace('  ', ' ')
			c+=li
	consultas = c.split(";")[:-1]
	return consultas


def file_queries(filename):
	consulta = get_consultas(filename)
	m=''
	for c in consulta:
		buffer = ""
		buffer="<?php"+"\n"
		buffer+=head+"\n"
		buffer+=tab+c+'\n'
		buffer+="\""+"\n"
		for a in range(count_s(c)):
			buffer+=tab+',$var'+'\n'
		buffer+=");"+"\n"
		buffer+="$resultado = $conexion->query($query);"+"\n"
		buffer+="$respuesta = $conexion->filas($resultado);"+"\n"
		buffer+="return json_encode($respuesta);"+"\n"
		buffer+="?>"+"\n"*2
		m+=buffer
	return m


files = os.listdir('.');
buffer=''
nfile="queries.php"
f=open("nfile.php", "w+")
for filename in files:
	if ".sql" in filename:
		buffer += file_queries(filename)+'\n'

f.write(buffer)
f.close()

