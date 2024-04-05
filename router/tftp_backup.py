#!C:/xampp/python.exe
import cgi
import cgitb
cgitb.enable()
import sys

import telnetlib
import time



print("content-type: text/html\n\n" )


form=cgi.FieldStorage()

HOST=form['HOSTNAME'].value
passw=form['password'].value
tftp_HOST=form['tftp_HOST'].value
tftp_fileName=form['fileName'].value


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

if tftp_HOST==('None' or 'none'):
    connection.write(('exit'+enter).encode('ascii'))
else:
    connection.write(('exit'+enter).encode('ascii'))
    
    
connection.write((('copy startup-config  tftp:'+enter)).encode('ascii'))
connection.read_until('Address or name of remote host []? '.encode('ascii'))
connection.write((tftp_HOST+enter).encode('ascii'))


if tftp_fileName==('None' or 'none'):
    connection.read_until('Destination filename [r1-confg]? '.encode('ascii'))
    connection.write(enter.encode('ascii'))
else:
    connection.read_until('Destination filename [r1-confg]? '.encode('ascii'))
    connection.write((tftp_fileName+enter).encode('ascii'))
    print("File backed up successfully via TFTP")
   

time.sleep(2)












