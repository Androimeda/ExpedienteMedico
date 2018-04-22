import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Medico'
data={
  'accion':'crear',
  'pNombre': None,
  'sNombre': None,
  'pApellido': None,
  'sApellido': None,
  'direccion': None,
  'sexo': None,
  'noIdentidad': None,
  'idPais': None,
  'idEspecialidad': None,
  'noColegiacion': None,
  'correo': None,
}
print postear(data,url)
print

url='Medico'
data={
  'accion':'buscarPorApellido',
  'pApellido': None,
  'sApellido': None,
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
  'idMedico': None,
  'direccion': None,
  'idEspecialidad': None,
  'noColegiacion': None,
  'correo': None,
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
