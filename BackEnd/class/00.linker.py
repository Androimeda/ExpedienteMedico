
import re
import os
tab ="  "

def get_data(filename):
	f = open(filename, 'r')
	lineas = f.readlines()
	f.close()

	data={}
	c=''
	for li in lineas:
		li=li.replace("\n", '')
		if "function" in li and not ("//" in li) and not ("__" in li) and not ("get" in li) and not ("set" in li):
			li = li.replace(" ", "")
			li = li.replace("public", "")
			li = li.replace("\t", "")
			li = li.replace("function", "")
			li = li.replace("($conexion){", "")
			c=li
			data[li]=[]
		if "$this->" in li and not(":" in li) and not("=" in li) and not("return" in li):
			li = li.replace(",","")
			li = li.replace("\"","")
			li = li.replace("\t","")
			li = li.replace(" ","")
			li = li.replace("$this->","")
			if "get" in li:
				li=li[3:4].lower()+li[4:-2]
			data[c].append(li)
	for i in data:
		lista = data[i]
		lista = set(lista)
		lista = list(lista)
		data[i]=lista
	return data

def get_bufer(filename):
	data = get_data(filename)
	bufer=''
	for i in data:
		met = i
		par = data[i]
		bufer+="case '"+met+"':"+"\n"
		for p in par:
			bufer+="\n"
			bufer+=tab
			if ("id" in p):
				bufer+="if(isset($_POST['"+p+"']) && $_POST['"+p+"']!=''){"+"\n"
			else:
				bufer+="if(isset($_POST['"+p+"'])){"+"\n"
			bufer+=tab*2
			bufer+="$"+p+"= $_POST['"+p+"'];"+"\n"
			bufer+=tab
			bufer+="}else{"+"\n"
			bufer+=tab*2
			if "id" in p:
				bufer+='$'+p+"='null';"+"\n";
			else:
				bufer+='$'+p+"=null;"+"\n";
			bufer+=tab*2
			bufer+="$res['mensaje']='Se necesita campo: "+p+"';"+"\n"
			bufer+=tab*2
			bufer+="$res['resultado']=false;"+"\n"
			bufer+=tab*2
			bufer+="echo json_encode($res);"+"\n"
			bufer+=tab*2
			bufer+="break;"+"\n"

			bufer+=tab
			bufer+="}"+"\n"
		clase = filename[:-4]
		obj = clase.lower()
		bufer+=tab
		bufer+="$"+obj+"=new "+clase+"();"+"\n"
		for p in par:
			bufer+=tab
			bufer+="$"+obj+"->set"+p[0].upper()+p[1:]+"($"+p+");"+"\n"
		bufer+=tab
		bufer+="echo $"+obj+"->"+met+"($conexion);"+"\n"
		bufer+="break;"+"\n"*2
	bufer+="default:"+"\n"
	bufer+=tab*2
	bufer+="$res['mensaje']='Accion no reconocida';"+"\n"
	bufer+=tab*2
	bufer+="$res['resultado']=false;"+"\n"
	bufer+=tab*2
	bufer+="echo json_encode($res);"+"\n"
	bufer+="break;"+"\n"
	return bufer

filename = 'Cirugia.php'
def get_file(filename):
	k=''
	k+="<?php"+"\n"
	k+='header("Access-Control-Allow-Origin: *");'+"\n"
	k+="include_once('./utils/date.php');"+"\n"
	k+="include_once('../class/Conexion.php');"+"\n"
	if filename in ('Medico.php', 'Paciente.php', 'Paramedico.php'):
		k+="include_once('../class/Persona.php');"+"\n"
	k+="include_once('../class/"+filename+"');"+"\n"
	k+="if(isset($_POST['accion'])){"+"\n"
	k+="$conexion = new Conexion();"+"\n"
	k+="switch ($_POST['accion']) {"+"\n"
	k+=get_bufer(filename)+"\n"
	k+="}"+"\n"
	k+="$conexion->close();"+"\n"
	k+="}else{"+"\n"
	k+=tab
	k+="$res['mensaje']='Accion no especificada';"+"\n"
	k+=tab
	k+="$res['resultado']=false;"+"\n"
	k+=tab
	k+="echo json_encode($res);"+"\n"
	k+="}"+"\n"
	k+="?>"
	return k

print "LINKER - SERVICE - SWITCH"
files = os.listdir('.');
for filename in files:
	if ".php" in filename and not ("Conexion" in filename):
		c = filename[0].lower()+filename[1:-4]
		f = open("../services/"+filename.lower(), "w+")
		f.writelines(get_file(filename))
		f.close()