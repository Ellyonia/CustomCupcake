<?php
	$email = $_POST['email'];
	$pass = $_POST['password'];

?>
<html>
<head>
<title>Verify Login</title>
</head>
<body>
	<?php

	$con = mysql_connect("localhost","DBandGUI","narwhal");
  	if (!$con)
  	{
  	die('Could not connect: ' . mysql_error());
  	}
  	mysql_select_db("CustomCupcakes", $con);

  	$sql = "SELECT password FROM Customers WHERE email = '$email'";

  	$result = mysql_query($sql) or die(mysql_error());
  	while($row = mysql_fetch_assoc($result))
{
    foreach($row as $cname => $cvalue)
    {
    	if ($cname == "password")
    	{
    		if ( $pass == $cvalue)
    		{
    			print "You have successfully Logined in. Welcome ";
    			$valid = 1;
          header("Location: order.php");
    		}
    	}
    }
    print "\r\n";
}
if ($valid == 0)
{
	print "Access Denied, Incorrect User Information.";
header("Location: index.php");
}


  mysql_close($con);

?>
</body>
</html>