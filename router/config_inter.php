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
  <title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
  
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>

      <link rel="stylesheet" href="css/home.css">

  
</head>

<body>



 


  <div class="cont">
    <div class="sentinel">
      <div class="login" id="login">

        <p id="mess">Allocate the IPs to the following interfaces</p>

         <form method="post" action="config_inter.py">
        
         <div class="login__row">
          <input type="checkbox" value="Ethernet3/0"  class="login__checkbox" name="check_list[]" />
          <input type="text" name="Ethernet3/0"  class="login__input name" placeholder="Ethernet3/0">
         </div>

         <div class="login__row">
          <input type="checkbox" value="Ethernet3/1" class="login__checkbox" name="check_list[]" />
          <input type="text" name="Ethernet3/1"  class="login__input name" placeholder="Ethernet3/1">
        </div>

        <div class="login__row">
          <input type="checkbox" value="Ethernet3/2" class="login__checkbox" name="check_list[]"/>
          <input type="text" name="Ethernet3/2"  class="login__input name" placeholder="Ethernet3/2">
        </div>

        <div class="login__row">
          <input type="checkbox" value="Ethernet3/3"  class="login__checkbox" name="check_list[]"/>
          <input type="text" name="Ethernet3/3"  class="login__input name" placeholder="Ethernet3/3">
        </div>

         <div class="login__row">
          <input type="checkbox" value="FastEthernet2/0" class="login__checkbox" name="check_list[]"/>
          <input type="text" name="FastEthernet2/0"  class="login__input name" placeholder="Fast Ethernet 2/0">
        </div>


         <div class="login__row">
          <input type="checkbox" value="FastEthernet2/1" class="login__checkbox"name="check_list[]" />
          <input type="text" name="FastEthernet2/1"  class="login__input name" placeholder="Fast Ethernet 2/1">
        </div>

        <div class="login__row">
          <input type="checkbox" value="GigabitEthernet0/0"  class="login__checkbox" name="check_list[]" />
          <input type="text" name="GigabitEthernet0/0"  class="login__input name" placeholder="Gigabit Ethernet 0/0">
        </div>


        <input type="hidden" value="<?php echo $_SESSION["HOST"]; ?>" name="HOSTNAME"/>

        <input type="hidden" value="<?php echo $_SESSION["passw"]; ?>" name="password"/>





       <button type="submit" name="submit" class="login__submit" value="submit">Submit</button>
        </form>
      


        


      

    

   
     </div>
   </div>
</div>
  

  

   




</body>

</html>
