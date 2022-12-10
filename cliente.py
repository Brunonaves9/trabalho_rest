import requests
import json

url = "http://localhost/trabalho_rest/tarefas"

myResponse = requests.get(url)

if(myResponse.ok):

    jData = json.loads(myResponse.content)

    print("Foram encontrados {0} Tarefas.".format(len(jData)))
    print("\n")
    for tarefa in jData:
        for atributo in tarefa:
            print (atributo + ": " + str(tarefa[atributo]))
        print("\n")
else:
  # If response code is not ok (200), print the resulting http error code with description
    myResponse.raise_for_status()