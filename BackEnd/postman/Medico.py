import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Medico'
data={
  'accion':'crear',
  'noColegiacion': None,
  'idPais': None,
  'noIdentidad': None,
  'idEspecialidad': None,
  'pNombre': None,
  'sNombre': None,
  'sApellido': None,
  'direccion': None,
  'correo': None,
  'pApellido': None,
  'sexo': None,
}
print postear(data,url)
print

url='Medico'
data={
  'accion':'buscarPorApellido',
  'sApellido': None,
  'pApellido': None,
}
print postear(data,url)
print

url='Medico'
data={
  'accion':'buscarPorNoIdentidad',
  'noIdentidad': None,
}
print postear(data,url)
print

url='Medico'
data={
  'accion':'listarTodos',
  'idCentroMedico': None,
}
print postear(data,url)
print

url='Medico'
data={
  'accion':'actualizar',
  'correo': None,
  'noColegiacion': None,
  'idEspecialidad': None,
  'idMedico': None,
  'direccion': None,
}
print postear(data,url)
print

url='Medico'
data={
  'accion':'buscarPorNombre',
  'pNombre': None,
  'sNombre': None,
}
print postear(data,url)
print

url='Medico'
data={
  'accion':'listar',
  'idMedico': None,
}
print postear(data,url)
print
