#!C:/xampp/python.exe
import time, http.cookies

# Instantiate a SimpleCookie object
cookie = http.cookies.SimpleCookie()
name='192.168.100.13'

# The SimpleCookie instance is a mapping
cookie['HOST'] = str(name)

# Output the HTTP message containing the cookie
print(cookie)
print('Content-Type: text/html\n')



