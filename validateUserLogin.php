<?php
	$email = $_POST['email'];
	$pass = $_POST['password'];
  session_start();
?>
<html>
<head>
<title>Verify Login</title>
</head>
<body>
	<?php
  $valid = 0;
	$con = mysql_connect("localhost","DBandGUI","narwhal");
  	if (!$con)
  	{
  	die('Could not connect: ' . mysql_error());
  	}
  	mysql_select_db("CustomCupcakes", $con);

  	$sql = "SELECT password, customer_ID FROM Customers WHERE email = '$email'";

  	$result = mysql_query($sql) or die(mysql_error());
  	while($row = mysql_fetch_assoc($result))
{
    foreach($row as $cname => $cvalue)
    {
    	if ($cname == "password")
    	{
    		if ( $pass == $cvalue)
    		{
    			$valid = 1;
    		}
    	}
      if ($cname == "customer_ID")
      {
        $_SESSION['cID'] = $cvalue;
      }
    }
}
  if ($valid == 1)
  {
  header("Location: order.php");
  }
  else
      header("Location: index.php");
  mysql_close($con);

?>
</body>
</html>