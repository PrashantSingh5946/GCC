<?php
session_start();

// If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['username'])) {
    if ( isset($_COOKIE['username'])) {
    
      $_SESSION['username'] = $_COOKIE['username'];
    }
  }


 if (!isset($_SESSION['username'])){ 
    $home_url = 'index.php';
  header('Location: ' . $home_url);}

  






?>


<html>

<link rel="stylesheet" href="home.css">

</script>

<body>

<div id="navigation" class="container">


<div class="division">
<ul style="list-style: none;">
<li></li>
<li><a href="logout.php"><?php echo'WELCOME  '.$_SESSION['first_name']; ?></a></li>

<li><a href="logout.php">Logout</a></li>
<?php
if($_SESSION['role']=='admin')
{
	?>
<li><a href="signup.php">Add Users</a></li>

<?php
}
?>
</ul>
</div>

<div id="routers" class="division">
<h>Routers</h>
<ul style="list-style: none; text-align: left;">
<li></li>
<li><a href="router/home.php">Cisco ISR</a></li>
<li><a href="logout.php">Cisco 2911</a></li>
<li><a href="logout.php">Cisco 1941</a></li>
<li><a href="logout.php">Cisco 3745</a></li>

</ul>

</div>	


<div id="switches" class="division">
<h>	Switches</h>
<ul style="list-style: none; text-align: left;">
<li></li>
<li><a href="switch/index.php">Cisco 2960</a></li>
<li><a href="logout.php">Cisco 3650</a></li>
<li><a href="logout.php">Cisco 3750</a></li>
<li><a href="logout.php">Cisco 3850</a></li>

</ul>

</div>	


	

</div>
</body>
</html>