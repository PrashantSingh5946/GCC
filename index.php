<?php
  require_once('connectvars.php');

  // Start the session
  session_start();

  if (isset($_SESSION['username'])){ 
         $home_url = 'home.php';
         
         header('Location: ' . $home_url);
     }


  // Clear the error message
  $error_msg = "";

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['username'])) {
  	
    if (isset($_POST['submit'])) {
      // Connect to the database
   
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      // Grab the user-entered log-in data
      $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

      if (!empty($user_username) && !empty($user_password)) {

      
          
        // Look up the username and password in the database
        $query = "SELECT username,first_name,role FROM user_data WHERE(password = '$user_password'&&
        username= '$user_username')";
        $data = mysqli_query($dbc, $query);
       



        if (mysqli_num_rows($data) == 1) {

        	
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = mysqli_fetch_array($data);
          
          $_SESSION['username'] = $row['username'];
          $_SESSION['first_name']=$row['first_name'];
          $_SESSION['role']=$row['role'];


         
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
          $home_url = 'home.php';
         
          header('Location: ' . $home_url);
        }
        else {
          // The username/password are incorrect so set an error message
          $error_msg = 'Sorry, you must enter a valid username and password to log in.';
        }
      }
      else {
        // The username/password weren't entered so set an error message
        $error_msg = 'Sorry, you must enter your username and password to log in.';
      }
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

  <div class="cont">
  <div class="demo">
    <form class="login" id="login" method="post" action="index.php">
      <div class="login__check"></div>
      <div class="login__form">
        <div class="login__row">
          <input type="text" class="login__input name" placeholder="Username" name="username"
          id="username"/>

        </div>
        <div class="login__row">
          <input type="password" class="login__input pass" placeholder="Password" name="password" 
          id="password"/>
        </div>
        <button type="submit" class="login__submit" id="submit" name="submit" value="submit">Sign in</button>
            </div>
            </form>
   </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

   




</body>

</html>
