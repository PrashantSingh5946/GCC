$(document).ready(function()
{
	var socket=new WebSocket("ws:localhost:3000");
	socket.onopen=function()
	{
		console.log("connected");
	}
}




$("#serial_submit").click(function(ev)
{

  ev.preventDefault();

  var comport = $('#comport').val();
  var password= $('#password').val();

  sendMessage({ 'comport' :comport});

  sendMessage({ 'password' :password});
 // $('#comport').val("");
  //$('#password').val("");

});


var sendMessage=function(password,host)
{
	socket.send(pass.password)
	socket.send(hos.host)
}

$("#telnet_submit").click(function(ev)
{ document.getElementById("mess").value="Telnet Js is working";
  ev.preventDefault();
  var host=$('#HOST').val();
  var password= $('#password').val();

  sendMessage({ 'pass' :password});
  sendMessage({'hos' :host})
  //$('#password').val("");

});


$("#ssh_submit").click(function(ev)
{

  ev.preventDefault();

  var username = $('#username').val();
  var password= $('#password').val();

  sendMessage({ 'username' :username});

  sendMessage({ 'password' :password});
 // $('#comport').val("");
  //$('#password').val("");

});