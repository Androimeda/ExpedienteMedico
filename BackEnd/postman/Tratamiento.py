import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Tratamiento'
data={
  'accion':'crear',
  'dosis': None,
  'intervaloTiempo': None,
  'fechaInicio': None,
  'duracionTratamiento': None,
  'idTipoTratamiento': None,
  'idViaSuministro': None,
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'agregarTipoTratamiento',
  'tipoTratamiento': None,
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'listarPorPaciente',
  'idPaciente': None,
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'listarTipoTratamiento',
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'actualizarReceta',
  'idTratamiento': None,
  'idConsulta': None,
  'idMedico': None,
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'agregarViaSuministro',
  'viaSuministro': None,
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'listarViaSuministro',
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'recetar',
  'idTratamiento': None,
  'idConsulta': None,
  'idMedico': None,
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'actualizarViaSuministro',
  'idViaSuministro': None,
  'viaSuministro': None,
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'actualizarTipoTratamiento',
  'tipoTratamiento': None,
  'idTipoTratamiento': None,
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'actualizar',
  'idTratamiento': None,
  'dosis': None,
  'intervaloTiempo': None,
  'fechaInicio': None,
  'duracionTratamiento': None,
  'idTipoTratamiento': None,
  'idViaSuministro': None,
}
print postear(data,url)
print
