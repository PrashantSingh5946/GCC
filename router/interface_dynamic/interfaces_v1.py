#!C:/xampp/python.exe
import cgi
import cgitb
cgitb.enable()
import sys
import telnetlib
import time
import json


passw="akash"
enter='\r'



temp={}
from websocket import create_connection
ws = create_connection("ws://localhost:9000/websocket")


while(1==1):
      data={'type':'interfaces','message':[],'name':''}
      response=ws.recv()
      temp=json.loads(response)
      print("packet recieved")
      if(temp['type']=="command"):
            print("command recieved")
            HOST=temp['name']
            
            
      

            connection=telnetlib.Telnet(HOST)
            connection.open(HOST,23)

            connection.read_until('Password: '.encode())
            connection.write((passw + '\n').encode('ascii'))

            connection.write(('enable'+enter).encode('ascii'))
            connection.write((passw+enter).encode('ascii'))

            connection.write(('conf t'+enter).encode('ascii'))

            connection.write(('do sh ip int brief' + enter +"\n").encode('ascii'))

            temp=str(connection.read_until("5555".encode('ascii'),1))

            lines=temp.split("'") #split string into a list


            extract=lines[1]
            indi_lines=extract.split("\\r\\n")

            for i in range (7,(len(indi_lines)-1)):
                  print(indi_lines[i])
                  interface=indi_lines[i].split(" ")
                  data['message'].append(interface[0])


            print(data)



            ws.send(json.dumps(data))






