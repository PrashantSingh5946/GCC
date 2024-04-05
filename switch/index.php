<?php
session_start();


  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['username'])) {
    if ( isset($_COOKIE['username'])) {
    
      $_SESSION['username'] = $_COOKIE['username'];
    }

    else{
    	 $home_url = '../index.php';
        header('Location: ' . $home_url);
    }
  }







?>




<!DOCTYPE html>
<html lang="en" >


<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
  
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>


  <script>
function serial() {
  
  document.getElementById("ssh").style.display = "none";
  document.getElementById("telnet").style.display = "none";
  document.getElementById("serial").style.display = "inline";
}

function ssh() {
  document.getElementById("telnet").style.display = "none";
   document.getElementById("serial").style.display = "none";

  document.getElementById("ssh").style.display = "inline";

}

function telnet() {
  
  document.getElementById("serial").style.display = "none";
  document.getElementById("ssh").style.display = "none";
  document.getElementById("telnet").style.display = "inline";
}
</script>

<script src="main.js"></script>

 


  <div class="cont">
    <div class="sentinel">
      <div class="login" id="login">
        <p>Please select the type of connection you want to establish</p>
        <br>

        <div id="separator">
       <input type="radio" name="option" onclick="serial()" > <label for="">Serial</label>      

       <input type="radio" name="option"  onclick="telnet()"> <label for="">Telnet</label> 

       <input type="radio" name="option" onclick="ssh()"> <label for="">SSH</label> 
       </div>




      <div class="box" id="box">

       <div id="serial" class="serial">
        <form method="post" action="login.php">
          <div class="login__row">
        <input type="password" id="password"class="login__input pass" placeholder="Password">
       </div>
         <div class="login__row">
      <input type="text" id="comport" class="login__input name" placeholder="COM Port">
      </div>
       <button type="submit" class="login__submit" id="serial_submit" name="submit" value="submit">Sign in</button>
        </form>
       </div>    

     
      <div id="ssh" class="ssh">
      <form method="post" action="login.php">
      <div class="login__row">
      <input type="text" id="HOST" name="HOST"class="login__input name" placeholder="HOST">
      </div>
      <div class="login__row">
      <input type="text" id="username" name="username"class="login__input name" placeholder="Username">
      </div>
      <div class="login__row">
      <input type="password" id="password" name="password" class="login__input pass" placeholder="Password" >
      </div>
      <button type="submit" class="login__submit" id="ssh_submit" name="submit" value="submit">Sign in</button>
      </form>
      </div>


      <div id="telnet" class="telnet">
        <form id="telnet" method="post" action="telnet_login.py">
         <div class="login__row">
          <input type="HOST" id="HOST" name="HOST" class="login__input pass" placeholder="Enter target IP address">
        </div>
        <div class="login__row">
        <input type="password" id="password" name="password" class="login__input pass" placeholder="Password">
        </div>
        <button type="submit" class="login__submit" id="telnet_submit" name="telnet_submit" value="submit">Sign in</button>
         
        </form>
       </div>    


      

     </div>

   

   </div>
   </div>
  

  

   




</body>

</html>
