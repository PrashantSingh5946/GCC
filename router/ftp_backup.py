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

ftp_HOST=form['ftp_HOST'].value
ftp_User=form['ftp_user'].value
ftp_Password=form['ftp_password'].value
ftp_fileName=form['fileName'].value


connection=telnetlib.Telnet(HOST)
connection.open(HOST)
connection.read_until('Password: '.encode('ascii'))
connection.write((passw + '\n').encode('ascii'))

connection.write(('enable'+enter).encode('ascii'))
connection.write((passw+enter).encode('ascii'))
connection.write(('conf t'+enter).encode('ascii'))


if ftp_User==('None' or 'none') and ftp_Password==('None' or 'none'):
    connection.write(('exit'+enter).encode('ascii'))
else:
    connection.write(('ip ftp username '+ftp_User+enter).encode('ascii'))
    connection.write(('ip ftp password '+ftp_Password+enter).encode('ascii'))
    connection.write(('exit'+enter).encode('ascii'))
    
    
connection.write((('copy startup-config  ftp:'+enter)).encode('ascii'))
connection.read_until('Address or name of remote host []? '.encode('ascii'))
connection.write((ftp_HOST+enter).encode('ascii'))


if ftp_fileName==('None' or 'none'):
    connection.read_until('Destination filename [r1-confg]? '.encode('ascii'))
    connection.write(enter.encode('ascii'))
else:
    connection.read_until('Destination filename [r1-confg]? '.encode('ascii'))
    connection.write((ftp_fileName+enter).encode('ascii'))
    print("File backed up successfully via FTP")
   

time.sleep(2)
