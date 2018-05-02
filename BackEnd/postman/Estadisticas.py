import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Estadisticas'
data={
  'accion':'medicos',
}
print postear(data,url)
print

url='Estadisticas'
data={
  'accion':'centros',
}
print postear(data,url)
print

url='Estadisticas'
data={
  'accion':'pacienteMax',
}
print postear(data,url)
print
