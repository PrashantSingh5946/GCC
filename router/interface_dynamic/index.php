<?php
session_start();
if((isset($_COOKIE["HOST"]))&&(isset($_COOKIE["passw"]))){
$_SESSION["HOST"]= $_COOKIE["HOST"];

$_SESSION["passw"]=$_COOKIE["passw"];

}
else
{ $home_url = 'index.php';
  header('Location: ' . $home_url);}


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/home.css">

</head>
<body>
	<!-- <button onclick="send_message()">Send</button> -->
	<div class="cont">
    <div class="sentinel">
      <div class="login" id="login">

        <p id="mess">Allocate the IPs to the following interfaces</p>

         <form method="post" action="config_inter.py">
         	<div id="interfaces"> 

	        </div>
        
         
       


        <input type="hidden" value="<?php echo $_SESSION["HOST"]; ?>" name="HOSTNAME" id="HOSTNAME"/>

        <input type="hidden" value="<?php echo $_SESSION["passw"]; ?>" name="password"/>





       <button type="submit" name="submit" class="login__submit" value="submit">Submit</button>

        </form>

      </div>  

	</div>

<script src="jquery.min.js"></script>
<script language="javascript" type="text/javascript">  
	//create a new WebSocket object.
	var interfaces = $('#interfaces');
	var wsUri = "ws://localhost:9000/demo/server.php"; 	
	websocket = new WebSocket(wsUri); 
	
	websocket.onopen = function(ev) { // connection is open 
		send_message();
	
		
	}
	// Message received from server
	websocket.onmessage = function(ev) {
		var response 		= JSON.parse(ev.data); //PHP sends Json data
		
		var res_type 		= response.type; //message type
		var user_message 	= response.message; //message text
		var user_name 		= response.name; //user name
		var user_color 		= response.color; //color

		switch(res_type){
			case 'interfaces':
			var i;
			    for(i=0;i<user_message.length;i++){
			    	//interfaces.append('<div class="message"> '+ user_message[i] + '</div>');
			    	interfaces.append('<div class="login__row">'+
          '<input type="checkbox" value="'+user_message[i]+'"  class="login__checkbox" name="check_list[]" />'+
          '<input type="text" name="'+user_message[i]+'"  class="login__input name" placeholder="'+user_message[i]+'">'+
         '</div>')
			    }
				
				break;
		
		}
		

	};
	
	websocket.onerror	= function(ev){ interfaces.append('<div class="system_error">Error Occurred - ' + ev.data + '</div>'); }; 
	websocket.onclose 	= function(ev){ interfaces.append('<div class="system_msg">Connection Closed</div>'); }; 

	
	
	//Send message
	function send_message(){
		
		var message_input = 'do sh ip int brief'; //user message text
		var name_input = document.getElementById("HOSTNAME").value; //user name
		var type = 'command';
		interfaces.append(name_input);
		
		

		//prepare json data
		var msg = {
			message: "do sh ip int brief",
			type:"command",
			name: name_input

			
		};
		//convert and send data to server
		websocket.send(JSON.stringify(msg));	
		
	}
</script>
</body>
</html>
