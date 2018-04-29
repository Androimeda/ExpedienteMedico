import os

nfile = open("98.VISTAS.sql","w")

files = os.listdir('.');
for filename in files:
	if ".sql" in filename and not (("98") in filename):
		file = open(filename, "r")
		nfile.writelines(file.readlines())
		nfile.write("\n"*3)
nfile.close()
