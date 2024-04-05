#!C:/xampp/python.exe
import cgi
import cgitb
cgitb.enable()
import sys

import telnetlib
import time



print("content-type: text/html\n\n" )


form=cgi.FieldStorage()

enter="\r"

HOST=form['HOSTNAME'].value
passw=form['password'].value

tftp_HOST=form['tftp_HOST'].value
tftp_srcfileName=form['source_fileName'].value
tftp_destfileName=form['destination_fileName'].value

print(tftp_HOST)
print(tftp_srcfileName)
print(tftp_destfileName)

connection=telnetlib.Telnet(HOST)
connection.open(HOST)
connection.read_until('Password: '.encode('ascii'))
connection.write((passw + '\n').encode('ascii'))
print(connection.read_lazy())

connection.write(('en'+enter).encode('ascii'))
connection.write((passw + '\n').encode('ascii'))
print(connection.read_lazy())




    
connection.write(('copy tftp start'+enter).encode('ascii'))


connection.read_until(('Address or name of remote host []? ').encode('ascii'))
connection.write((tftp_HOST+enter).encode('ascii'))

connection.write(enter.encode('ascii'))
print(connection.read_some())


connection.read_until(('Source filename []? ').encode('ascii'))
connection.write((tftp_srcfileName+enter).encode('ascii'))


connection.read_until(('Destination filename [startup-config]? '))
connection.write(enter.encode('ascii'))


time.sleep(2)



   













