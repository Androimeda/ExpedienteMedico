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
			if not ("hash" in li):
				li = li.replace(",","")
				li = li.replace("\"","")
				li = li.replace("\t","")
				li = li.replace(" ","")
				li = li.replace("$this->","")
				if "get" in li:
					li=li[3:4].lower()+li[4:-2]
				data[c].append(li)
			else:
				li = li.replace(" ","").replace(")", "").split("$this->")[1]
				if "get" in li:
					li=li[3:4].lower()+li[4:-2]
				data[c].append(li)
	for i in data:
		lista = data[i]
		lista = set(lista)
		lista = list(lista)
		data[i]=lista
	return data

# filename = "Paramedico.php"
def get_buffer(filename):
	data = get_data(filename)
	v=''
	v+="import requests"+"\n"
	v+="def postear(data, url):"+"\n"
	v+="    return requests.post('http://127.0.0.1/syme/BackEnd/services/\'+url+\'.php', data=data).content"+"\n"
	for i in data:
		v+="\n"
		v+="url='"+filename[:-4]+"'"+"\n"
		v+="data={"+"\n"
		met = i
		v+=tab
		v+="'accion':'"+met+"',"+"\n"
		par = data[i]
		for p in par:
			v+=tab
			v+="'"+p+"': None,\n"
		v+="}"+"\n"
		v+="print postear(data,url)"+"\n"
		v+="print"+"\n"
	return v

# print get_buffer(filename)

print "PYTHON-POST"
files = os.listdir('.');
for filename in files:
	if ".php" in filename and not ("Conexion" in filename):
		c = filename[0].lower()+filename[1:-4]
		f = open("../postman/"+filename[:-4]+".py", "w+")
		a=get_buffer(filename)
		f.writelines(a)
		f.close()
		