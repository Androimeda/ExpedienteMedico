import os

files =  os.listdir('.')

for file in files:
	if ".php" in file and not("index" in file) and not("nav-bar" in file):
		controller = "controlador/"+file[:-4]+".js"
		fo = open(file,"r")
		f = open(controller, "w+")
		f.write('$("#").addClass("active");'+"\n")
		lineas =  fo.readlines()
		fo.close()
		lineas = lineas[:-2]
		lineas.append('    <script src="'+controller+'"></script>'+'\n')
		lineas.append('  </body>'+'\n')
		lineas.append('</html>'+'\n')
		fo = open(file, "w+")
		fo.writelines(lineas)
		fo.close()
		f.close()
