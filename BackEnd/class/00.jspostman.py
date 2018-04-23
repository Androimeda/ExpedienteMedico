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

def get_buffer(filename):
	data = get_data(filename)
	v=""
	for i in data:
		met = i
		par = data[i]
		v+="$.ajax({"+"\n"
		v+=tab+"url:CONST_SITIO_URL+'/services/"+filename+"',"+"\n"
		v+=tab+"method:'POST',"+"\n"
		v+=tab+"dataType:'JSON',"+"\n"
		v+=tab+"data:{"+"\n"
		v+=tab*2
		v+="'accion':'"+met+"',"+"\n"
		par = data[i]
		for p in par:
			v+=tab*2
			v+="'"+p+"': null,\n"
		v+=tab+"},"+"\n"
		v+=tab+"success:function(respuesta){"+"\n"
		v+=tab*2+"console.log(respuesta);"+"\n"
		v+=tab+"},"+"\n"
		v+=tab+"error: function(error){"+"\n"
		v+=tab*2+"console.log(error);"+"\n"
		v+=tab+"},"+"\n"
		v+=tab+"complete: function(){"+"\n"
		v+=tab*2+"//TO-DO"+"\n"
		v+=tab+"}"+"\n"
		v+="});"+"\n"
		v+="\n"*2
	return v

print "JS-POST"
files = os.listdir('.');
for filename in files:
	if ".php" in filename and not ("Conexion" in filename):
		c = filename[0].lower()+filename[1:-4]
		f = open("../ajax/"+filename[:-4]+".js", "w+")
		a=get_buffer(filename)
		f.writelines(a)
		f.close()
		