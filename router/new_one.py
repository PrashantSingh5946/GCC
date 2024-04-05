#!C:/xampp/python.exe
import cgi
import cgitb
cgitb.enable()
import sys

import telnetlib
import time



print("content-type: text/html\n\n" )


enter="\r"


HOST='192.168.100.13'
passw='akash'
ftp_HOST="192.168.100.12"
ftp_User="admin"
ftp_Password="India@123"
ftp_srcfileName="r1"
ftp_destfileName="none"

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
    connection.write(('end'+enter).encode('ascii'))
    
    
connection.write((('copy ftp startup-config'+enter)).encode('ascii'))
connection.read_until('Address or name of remote host []? '.encode('ascii'))

connection.write((ftp_HOST+enter).encode('ascii'))

connection.read_until('Source filename []? '.encode('ascii'))
connection.write((ftp_srcfileName+enter).encode('ascii'))
connection.read_until('Destination filename [startup-config]? '.encode('ascii'))
connection.write(enter.encode('ascii'))
print("File restored successfully via FTP")




   













