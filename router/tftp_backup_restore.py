#!C:/xampp/python.exe
import telnetlib
import cgi
import cgitb
import time
cgitb.enable()

enter='\r'
form=cgi.fieldstorage()

HOST=form['HOSTNAME'].value
passw=form['password'].value

tftp_HOST=form['tftp_HOST'].value
tftp_srcfileName=form['source_fileName'].value
tftp_destfileName=form['destination_fileName'].value

connection=telnetlib.Telnet(HOST)
connection.open(HOST)
connection.read_until('Password: '.encode('ascii'))
connection.write((passw + '\n').encode('ascii'))

connection.write('enable'+enter.encode('ascii'))
connection.write((passw+enter).encode('ascii'))
    
connection.write(('copy tftp: startup-config'+enter).encode('ascii'))
connection.read_until('Address or name of remote host []? '.encode('ascii'))
connection.write((tftp_HOST+enter).encode('ascii'))

connection.read_until('Source filename []? '.encode('ascii'))
connection.write((tftp_srcfile+enter).encode('ascii'))

if ftp_destfileName==('None' or 'none'):
    connection.read_until('Destination filename [startup-config]? '.encode('ascii'))
    connection.write(enter.encode('ascii'))
else:
    connection.read_until('Destination filename [startup-config]? '.encode('ascii'))
    connection.write((tftp_destfileName+enter).encode('ascii'))

time.sleep(2)
