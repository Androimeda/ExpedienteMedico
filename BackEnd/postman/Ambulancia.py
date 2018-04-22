import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Ambulancia'
data={
  'accion':'crear',
  'placa': 'Null',
  'idCentroMedico': 1,
}
print postear(data,url)
print

url='Ambulancia'
data={
  'accion':'listarTodos',
  'idCentroMedico': 1,
}
print postear(data,url)
print

url='Ambulancia'
data={
  'accion':'actualizar',
  'idAmbulancia': 4,
  'placa': 'AAS 4219',
  'idCentroMedico': 5,
}
print postear(data,url)
print

url='Ambulancia'
data={
  'accion':'listarPorCentroMedico',
  'nombreCentro': None,
  'idCentroMedico': 1,
}
print postear(data,url)
print
