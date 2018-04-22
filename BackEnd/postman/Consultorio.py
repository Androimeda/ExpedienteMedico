import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Consultorio'
data={
  'accion':'crear',
  'idPiso': None,
}
print postear(data,url)
print

url='Consultorio'
data={
  'accion':'listarPorPiso',
  'idPiso': None,
}
print postear(data,url)
print

url='Consultorio'
data={
  'accion':'listarPorCentro',
  'idCentroMedico': None,
  'nombreCentro': None,
}
print postear(data,url)
print

url='Consultorio'
data={
  'accion':'listarPorMedico',
  'idMedico': None,
}
print postear(data,url)
print

url='Consultorio'
data={
  'accion':'vincularMedico',
}
print postear(data,url)
print
