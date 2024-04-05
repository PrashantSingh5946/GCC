#!C:/xampp/python.exe
import cgi
import cgitb
cgitb.enable()
import sys

import telnetlib
import time



print("content-type: text/html\n\n" )
print("<br><B>Interfaces Configured :<br></B>")

form=cgi.FieldStorage()

HOST=form['HOSTNAME'].value
passw=form['password'].value
enter="\r"
connection=telnetlib.Telnet(HOST)
connection.open(HOST,23)


connection.read_until('Password: '.encode('ascii'))
connection.write((passw + '\n').encode('ascii'))


connection.write(('enable'+enter).encode('ascii'))
connection.write((passw+enter).encode('ascii'))
connection.write(('conf t'+enter).encode('ascii'))



check=form.getlist("check_list[]")
for x in check:
    
    print(x)
    print('</br>')
    print(form[x].value)
    connection.write(('inter '+ str(x) + enter).encode('ascii'))
    connection.write(('ip add ' + form[x].value + ' 255.255.255.0' + enter).encode('ascii'))
    connection.write(('no sh' + enter).encode('ascii'))
    





##if "Ethernet3/0" in form:
##    
##    inter0=form['Ethernet3/0'].value
##    if "Ethernet3/0" in check:
##        print("On Ethernet 3/0 :" + inter0 + "<br>")
##        connection.write(('inter Ethe 3/0' + enter).encode('ascii'))
##        connection.write(('ip add ' + str(inter0) + ' 255.255.255.0' + enter).encode('ascii'))
##        connection.write(('no sh' + enter).encode('ascii'))


time.sleep(1)

