
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="accover.css">
</head>
<body>

<aside class = "left">
			<nav>
			<img src="log.jpg"/>
			<a href="homepage.php" >Home</a>
			<a href="accover.php" class="active">Account Overview</a>
			<a href="showtransact.php" >View Statement</a>
			<a href="payment.html" >Utility Payment</a>
			<a href="custreq.html" >Service Request</a>
			<a href="loanapply.html" >Apply for loan</a>
			<a href="loanrepay.php" >Loan payment</a>
			<a href="makefd.html">Make Fixed Deposit</a>
		</aside>
		<?php

$link=mysqli_connect("localhost","root","","aakash");
$accnum=$_COOKIE['accnum'];

$result1=mysqli_query($link,"SELECT * FROM customer_info where accnum=$accnum;");
$row1=mysqli_fetch_assoc($result1);
$result2=mysqli_query($link,"SELECT * FROM customer where accnum=$accnum;");
$row2=mysqli_fetch_assoc($result2);

if($result1 && $result2)
{?>
<div class="active1">
<?php
	echo "NAME:".$row1['name']."<br>";
	echo "CITY:".$row1['city']."<br>";
	echo "STREET:".$row1['street']."<br>";
	echo "EMAIL:".$row1['email']."<br>";
	echo "USERNAME:".$row2['username']."<br>";
	?>
	</div><?php
}

  ?>