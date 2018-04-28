import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Usuario'
data={
  'accion':'login',
  'correo': None,
  'contrasena': None,
}
print postear(data,url)
print

url='Usuario'
data={
  'accion':'registrar',
}
print postear(data,url)
print
