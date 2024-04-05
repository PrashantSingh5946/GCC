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





if "Ethernet3/0" in form:
    inter0=form['Ethernet3/0'].value
    if "Ethernet3/0" in check:
        print("On Ethernet 3/0 :" + inter0 + "<br>")
        connection.write(('inter Ethe 3/0' + enter).encode('ascii'))
        connection.write(('ip add ' + str(inter0) + ' 255.255.255.0' + enter).encode('ascii'))
        connection.write(('no sh' + enter).encode('ascii'))



if "Ethernet3/1" in form :
    inter1=form['Ethernet3/1'].value
    if "Ethernet3/1" in check:
        print("On Ethernet 3/1 :" + inter1 + "<br>")
        connection.write(('inter Ethe 3/1' + enter).encode('ascii'))
        connection.write(('ip add ' + str(inter1) + ' 255.255.255.0' + enter).encode('ascii'))
        connection.write(('no sh' + enter).encode('ascii'))

if "Ethernet3/2" in form :
    inter2=form['Ethernet3/2'].value
    if "Ethernet3/2" in check:
        print("On Ethernet 3/2 :" + inter2 + "<br>")
        connection.write(('inter Ethe 3/2' + enter).encode('ascii'))
        connection.write(('ip add ' + str(inter2) + ' 255.255.255.0' + enter).encode('ascii'))
        connection.write(('no sh' + enter).encode('ascii'))


if "Ethernet3/3" in form :
    inter3=form['Ethernet3/3'].value
    if "Ethernet3/3" in check:
        print("On Ethernet 3/3 :" + inter3 + "<br>")
        connection.write(('inter Ethe 3/3' + enter).encode('ascii'))
        connection.write(('ip add ' + str(inter3) + ' 255.255.255.0' + enter).encode('ascii'))
        connection.write(('no sh' + enter).encode('ascii'))

if "FastEthernet2/0" in form :
    inter4=form['FastEthernet2/0'].value
    if "FastEthernet2/0" in check:
        print("On Fast Ethernet 2/0 :" + inter4 + "<br>")
        connection.write(('inter fa 2/0' + enter).encode('ascii'))
        connection.write(('ip add ' + str(inter4) + ' 255.255.255.0' + enter).encode('ascii'))
        connection.write(('no sh' + enter).encode('ascii'))






if "FastEthernet2/1" in form :
    inter5=form['FastEthernet2/1'].value
    if "FastEthernet2/1" in check:
        print("On Fast Ethernet 2/1 :" + inter5 + "<br>")
        connection.write(('inter fa 2/1' + enter).encode('ascii'))
        connection.write(('ip add ' + str(inter5) + ' 255.255.255.0' + enter).encode('ascii'))
        connection.write(('no sh' + enter).encode('ascii'))

if "GigabitEthernet0/0" in form :
    inter6=form['GigabitEthernet0/0'].value
    if "GigabitEthernet0/0" in check:
        print("On Gigabit Ethernet 0/0 :" + inter6 + "<br>")
        connection.write(('inter gig 0/0' + enter).encode('ascii'))
        connection.write(('ip add ' + str(inter6) + ' 255.255.255.0' + enter).encode('ascii'))
        connection.write(('no sh' + enter).encode('ascii'))

time.sleep(1)

