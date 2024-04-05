<?php 

if(isset($_POST['serial_submit']))
{ echo'4';

	if($_POST['password']=='akash')
    {header:'home.php';}

}



 if (isset($_POST['telnet_submit'])) {
 	echo'14';
	if($_POST['password']=='akash')
		{  $home_url = 'home.php';
  header('Location: ' . $home_url);}


}

?>