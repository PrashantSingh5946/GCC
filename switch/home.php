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


<html>

<link rel="stylesheet" href="home.css">

</script>

<body>

<div id="navigation" class="container">


<div class="division">
<ul style="list-style: none;">
<li></li>
<li><a href="../logout.php"><?php echo'WELCOME  '.$_SESSION['first_name']; ?></a></li>

<li><a href="../logout.php">Logout</a></li>
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
<h>Functions</h>
<ul style="list-style: none; text-align: left;">
<li></li>
<li><a href="config_vlan.php">Configure VLAN</a></li>
<li><a href="../logout.php">Take Backup</a></li>
<li><a href="../logout.php">Restore Backup</a></li>

</ul>

</div>	




	

</div>
</body>
</html>