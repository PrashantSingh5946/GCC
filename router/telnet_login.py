#!C:/xampp/python.exe
import cgi
import cgitb
cgitb.enable()
import sys
import telnetlib
import time, http.cookies
enter="\r"


form=cgi.FieldStorage()
exception=""
passw=""
HOST=""

try:
    pas=form['password'].value
    HOS=form['HOST'].value
    HOST=HOS
    passw=pas
    

except Exception:
    exception='Enter the values at least <a href="index.php">Click to go back to login page</a>'
    
try:
    
    connection=telnetlib.Telnet(HOST)
    connection.open(HOST)
    connection.read_until('Password: '.encode('ascii'))
    connection.write((passw + '\n').encode('ascii'))
    
    if connection.read_until(('R1>').encode('ascii')):
        cookie = http.cookies.SimpleCookie()
        cookiep = http.cookies.SimpleCookie()
        cookie['HOST'] = str(HOST)
        cookiep['passw'] = str(passw)
        print(cookie)
        print(cookiep)
        print("content-type: text/html\n\n" )
        print('login successful')
        print('<meta http-equiv="refresh" content="0;url=home.php" />')

    elif 'password' in form:
        print("content-type: text/html\n\n" )
        print('Enter the correct details')
        print('<a href="index.php">Click to go back to login page</a>')

except:
    print("content-type: text/html\n\n" )
    print("Please enter the correct details")
    print('<a href="index.php">Click to go back to login page</a>')










### Instantiate a SimpleCookie object
##cookie = http.cookies.SimpleCookie()
##name='akash456'
##
### The SimpleCookie instance is a mapping
##cookie['HOST'] = str(name)
##
### Output the HTTP message containing the cookie
##print(cookie)
##print('Content-Type: text/html\n')
##
##print('<html><body>')
##print('Server time is', time.asctime(time.localtime()))
##print('</body></html>')















