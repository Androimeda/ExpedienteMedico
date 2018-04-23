import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Ambulancia'
data={
  'accion':'crear',
  'placa': None,
  'idCentroMedico': None,
}
print postear(data,url)
print

url='Ambulancia'
data={
  'accion':'listarTodos',
  'idCentroMedico': None,
}
print postear(data,url)
print

url='Ambulancia'
data={
  'accion':'actualizar',
  'placa': None,
  'idCentroMedico': None,
  'idAmbulancia': None,
}
print postear(data,url)
print

url='Ambulancia'
data={
  'accion':'listarPorCentroMedico',
  'idCentroMedico': None,
  'nombreCentro': None,
}
print postear(data,url)
print
