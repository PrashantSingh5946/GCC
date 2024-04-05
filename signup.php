<?php
session_start();

 if($_SESSION['role']!='admin')
 {
         $home_url = 'home.php';
         
          header('Location: ' . $home_url);
 }

 


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>


  <style>
p{
  color:white;
  font-size: 8em;
}
</style>

  <div class="cont">




<?php
  
  require_once('connectvars.php');

  // Connect to the database
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Error');
   


  if (isset($_POST['submit'])) {
   


    // Grab the profile data from the POST
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
    $dob = mysqli_real_escape_string($dbc, trim($_POST['dob']));
    $first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    $last_name = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    $email_id = mysqli_real_escape_string($dbc, trim($_POST['email_id']));
    $role = mysqli_real_escape_string($dbc, trim($_POST['role']));
    $contact_no = mysqli_real_escape_string($dbc, trim($_POST['contact_no']));


 
    if (!empty($username) && !empty($password)) {
      // Make sure someone isn't already registered using this username
     
      $query = "SELECT * FROM user_data WHERE username = '$username'";
      $data = mysqli_query($dbc, $query);
      //tset case 1

   


    if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database

        mysqli_query($dbc, $query);
        
      $query = "INSERT INTO `user_data`(`first_name`,`last_name`,`username`, `password`,`email_id`,`dob`,`role`,`reg_date`) VALUES ('$first_name','$last_name','$username', '$password','$email_id','$dob','$role',now())";

        mysqli_query($dbc, $query);
        
        // Confirm success with the user
        echo '<p class="error"> Your new account has been successfully created. You\'re now ready to <a href="index.php">log in</a>. </p>';
        

        mysqli_close($dbc);
        exit();
      }
      else {
        // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
        $username = "";
        echo '2';
      }
    }
    
  }

  mysqli_close($dbc);
?>
  <link rel="stylesheet" type="text/css" href="css/signup.css" />
  <p>Please enter your details to sign up for GCC.</p>
  <div class="sentinel">
    <div class="login__form">
  <form class="login" id="login" method="post" action="signup.php" >
      
   
      
      <div class="login__row">
      <input type="text" id="username" class="login__input name" 
      name="username" placeholder="Username" /><br />
      </div>

      <div class="login__row">
      <input type="password" id="password" class="login__input name" name="password" placeholder="Password"/>
      </div>

      <div class="login__row">
      <input type="text" id="first_name" class="login__input name" 
      name="first_name" placeholder="First Name" />
      </div>

      <div class="login__row">
      <input type="text" id="last_name" class="login__input name" 
      name="last_name" placeholder="Last Name" />
      </div>
       
       <div class="login__row">
      <input type="text" id="email_id" class="login__input name" 
      name="email_id" placeholder="Email" />
      </div>

      <div class="login__row">
      <input type="date" id="dob" class="login__input name" 
      name="dob" placeholder="DOB (YYYY-MM-DD)" />
      </div>

      <div class="login__row">
      <input type="text" id="role" class="login__input name" 
      name="role" placeholder="Role" />
      </div>

       <div class="login__row">
      <input type="text" id="contact_no" class="login__input name" 
      name="contact_no" placeholder="Contact No" />
      </div>
       <input type="submit" class="login__submit" value="Sign Up" name="submit" />
      
  </form>
  </div>
</div>
</div>
</body> 
</html>
