<?php
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$mailing = $_POST['mailingList'];
	$fname = $_POST['firstName'];
	$lname = $_POST['lastName'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$ID = 0;
  session_start();
?>

<html>
<head>
<title>Regrestration</title>
</head>
<body>
	<?php
	$con = mysql_connect("localhost","DBandGUI","narwhal");
  	if (!$con)
  	{
  	die('Could not connect: ' . mysql_error());
  	}
  	mysql_select_db("CustomCupcakes", $con);
  	$sql = "SELECT MAX(customer_ID) AS 'max' FROM Customers;";
  	$result = mysql_query($sql) or die(mysql_error());
  	while($row = mysql_fetch_assoc($result))
	{
    	foreach($row as $cname => $cvalue)
    	{
    		if ($cname == "max")
    		{
    			$ID = $cvalue + 1;
    		}
    	}
	}
	$_SESSION['cID'] = $ID;
	$sql2 = "INSERT INTO Customers VALUES ('$ID','$mailing','$fname','$lname','$address','$city','$state','$zip','$email','$pass','$phone')";
	$result = mysql_query($sql) or die(mysql_error());
 	header("Location: order.php");
 	?>
 </body>
 </html>
 