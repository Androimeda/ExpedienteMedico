import re
import os
tab ="  "
# print lineas

def get_proc_name(token):
	return token.replace("CREATE OR REPLACE PROCEDURE ", "").replace("(","").replace("\n","")

def get_var_name(token):
	token = token.replace("\n","").replace("p_","")
	parts = re.compile("\\b(IN|OUT)\\b").split(token)[0:3:2]
	n=[]
	for p in parts:
		p=p.replace(" ", "")
		n+=[p]
	return n

def get_tokens(lineas):
	c=0
	name=''
	vars=[]
	while True:
		li = lineas[c]
		if not (")" in li or len(li)<5):
			if c==0:
				name=get_proc_name(li)
			else:
				vars+=[get_var_name(li)]
			c+=1
		else:
			break
	return (name,vars)

def get_buffer(filename):
	file = open(filename, 'r')
	lineas = file.readlines()
	file.close()
	token = get_tokens(lineas)
	buffer="<?php"+"\n"
	buffer+="#"+filename+"\n"
	buffer+="# public function ... ($conexion) {..."+"\n"
	buffer+="# Llamada a "+token[0]+"\n"*2
	# buffer+="$msg = \'\';"+"\n"
	# buffer+="$res = 0;"+"\n"
	buffer+="$query=sprintf(\""+"\n"
	buffer+=tab+"BEGIN\n"
	buffer+=tab*2+token[0]+"("+"\n"
	c=0
	for i in token[1]:
		buffer+=tab*3
		if c!=0:
			buffer+=","
		if i[0]==",resultado":
			buffer+=":res"+"\n"
			continue
		elif i[0]==",mensaje":
			buffer+=":msg"+"\n"
			continue
		if i[1].lower() in ["integer", "int", "smallint", "timestamp", "date"]:
			buffer+="%s"+"\n"
		else:
			buffer+="\'%s\'"+"\n"
		c+=1
	buffer+=tab*2+");"+"\n"
	buffer+=tab+"END;"+"\n"
	buffer+="\","
	k=0
	for i in token[1]:
		m=i[0].replace(",","")
		if not (m in ["resultado", "mensaje", "datos"]):
			if k!=0:
				buffer+=tab+","
			else:
				buffer+="\n"+tab
			buffer+="$"+"this->"+m+"\n"
			# buffer+="$"+m+"\n"
			k+=1
	buffer+=");"+"\n"
	buffer+="$resultado=$conexion->query($query);"+"\n"
	buffer+="oci_bind_by_name($resultado, ':msg', $msg, 2000);"+"\n"
	buffer+="oci_bind_by_name($resultado, ':res', $res);"+"\n"
	buffer+="oci_execute($resultado);"+"\n"
	buffer+="oci_free_statement($resultado);"+"\n"
	buffer+="$respuesta=[];"+"\n"
	buffer+="$respuesta['mensaje'] = $msg;"+"\n"
	buffer+="$respuesta['resultado'] = $res == 1;"+"\n"
	# buffer+="echo json_encode($respuesta);"+"\n"*2
	buffer+="return json_encode($respuesta);"+"\n"*2
	buffer+="?>"
	return buffer


files = os.listdir('.');
for filename in files:
	if ".sql" in filename and not ("99" in filename):
		nfile=filename[:-4]+".php"
		f=open("00_CALLS/"+nfile, "w+")
		buffer = get_buffer(filename)
		f.write(buffer)
		f.close()