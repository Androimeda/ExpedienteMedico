import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Edificio'
data={
  'accion':'crear',
  'nombre': None,
  'idCentroMedico': None,
}
print postear(data,url)
print

url='Edificio'
data={
  'accion':'actualizarPiso',
  'descripcion': None,
  'idPiso': None,
}
print postear(data,url)
print

url='Edificio'
data={
  'accion':'agregarPiso',
  'descripcion': None,
  'idEdificio': None,
}
print postear(data,url)
print

url='Edificio'
data={
  'accion':'listarPiso',
  'idPiso': None,
}
print postear(data,url)
print

url='Edificio'
data={
  'accion':'listarPorCentro',
  'idCentroMedico': None,
  'nombreCentro': None,
}
print postear(data,url)
print

url='Edificio'
data={
  'accion':'listar',
  'idEdificio': None,
}
print postear(data,url)
print
