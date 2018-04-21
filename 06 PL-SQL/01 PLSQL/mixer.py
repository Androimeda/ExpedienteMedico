import os

nfile = open("99.PROCEDURES.sql","w")

files = os.listdir('.');
for filename in files:
	if ".sql" in filename and not (("99") in filename):
		file = open(filename, "r")
		nfile.writelines(file.readlines())
		nfile.write("\n"*3)
nfile.close()
