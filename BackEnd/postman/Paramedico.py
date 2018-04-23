import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Paramedico'
data={
  'accion':'crear',
  'idPais': None,
  'noIdentidad': None,
  'pNombre': None,
  'sNombre': None,
  'sApellido': None,
  'direccion': None,
  'correo': None,
  'pApellido': None,
  'sexo': None,
  'licencia': None,
}
print postear(data,url)
print

url='Paramedico'
data={
  'accion':'buscarPorApellido',
  'sApellido': None,
  'pApellido': None,
}
print postear(data,url)
print

url='Paramedico'
data={
  'accion':'buscarPorNoIdentidad',
  'noIdentidad': None,
}
print postear(data,url)
print

url='Paramedico'
data={
  'accion':'listarTodos',
  'idCentroMedico': None,
}
print postear(data,url)
print

url='Paramedico'
data={
  'accion':'actualizar',
  'correo': None,
  'idParamedico': None,
  'licencia': None,
  'direccion': None,
}
print postear(data,url)
print

url='Paramedico'
data={
  'accion':'buscarPorNombre',
  'pNombre': None,
  'sNombre': None,
}
print postear(data,url)
print

url='Paramedico'
data={
  'accion':'listar',
  'idParamedico': None,
}
print postear(data,url)
print
