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
<html lang="en" >


<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
  
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>

      <link rel="stylesheet" href="css/style_backup.css">

  
</head>

<body>


  <script>
function ftp() {
  
  document.getElementById("tftp").style.display = "none";

  document.getElementById("ftp").style.display = "inline";
}

function tftp() {
  document.getElementById("ftp").style.display = "none";
   

  document.getElementById("tftp").style.display = "inline";

}


</script>

<script src="main.js"></script>

 


  <div class="cont">
    <div class="sentinel">
      <div class="login" id="login">
        <p>Please select the type of connection you want to establish</p>
        <br>

        <div id="separator">
       <input type="radio" name="option" onclick="ftp()" > <label for="">FTP</label>      

       <input type="radio" name="option"  onclick="tftp()"> <label for="">TFTP</label> 

      
       </div>




      <div class="box" id="box">

       <div id="ftp" class="ftp">
        <form method="post" action="ftp_restore.py">
       <input type="hidden" value="<?php echo $_SESSION["HOST"]; ?>" name="HOSTNAME"/>

       <input type="hidden" value="<?php echo $_SESSION["passw"]; ?>" name="password"/>
          <div class="login__row">
      <input type="text" id="ftp_HOST" name="ftp_HOST"class="login__input name" placeholder="HOST">
      </div>
          <div class="login__row">
           <input type="text" id="ftp_user" class="login__input name" name="ftp_user" placeholder="Username">
         </div>
          <div class="login__row">
        <input type="password" id="ftp_password" name="ftp_password"class="login__input pass" placeholder="Password">
       </div>
         <div class="login__row">
      <input type="text" id="source_fileName" name="source_fileName"class="login__input name" placeholder="Source File Name">
      </div>

      <div class="login__row">
      <input type="text" id="destination_fileName" name="destination_fileName"class="login__input name" placeholder="Destination File Name">
      </div>


       <button type="submit" class="login__submit" id="serial_submit" name="submit" value="submit">Restore</button>
        </form>
       </div>    

     
      <div id="tftp" class="tftp">
      <form method="post" action="tftp_backup_restore.py">

      <div class="login__row">
      <input type="text" id="tftp_HOST" name="tftp_HOST"class="login__input name" placeholder="HOST">
      </div>

        <div class="login__row">
      <input type="text" id="source_fileName" name="source_fileName"class="login__input name" placeholder="Source File Name">
      </div>

      <div class="login__row">
      <input type="text" id="destination_fileName" name="destination_fileName"class="login__input name" placeholder="Destination File Name">
      </div>

     
      <input type="hidden" value="<?php echo $_SESSION["HOST"]; ?>" name="HOSTNAME"/>

       <input type="hidden" value="<?php echo $_SESSION["passw"]; ?>" name="password"/>
     
      <button type="submit" class="login__submit" id="ssh_submit" name="submit" value="submit">Restore</button>
      </form>
      </div>


        


      

     </div>

   

   </div>
   </div>
  

  

   




</body>

</html>
