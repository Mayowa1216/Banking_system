
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="custreq.css">
</head>
<body>

<aside class = "left">
			<nav>
			<img src="log.jpg"/>
			<a href="homepage.php" >Home</a>
			<a href="accover.php">Account Overview</a>
			<a href="showtransact.php" >View Statement</a>
			<a href="payment.html" >Utility Payment</a>
			<a href="custreq.html" class="active">Service Request</a>
			<a href="loanapply.html" >Apply for loan</a>
			<a href="loanrepay.php" >Loan payment</a>
			<a href="makefd.html">Make Fixed Deposit</a>
		</aside>
		
		<?php 
$type=$_POST['type']; 
$accnum=$_COOKIE['accnum'];


$link=mysqli_connect("localhost","root","","aakash");
$d=strtotime("today");
$date=strtotime("+1 week", $d);
$date1=date("d-m-Y", $date);
$result1=mysqli_query($link,"INSERT INTO customerreq values('$accnum','$type','$date1');");

if($result1)?>
<div class="notice"><?php echo "Your request for " . $type." will be completed by ".$date1;?>
</div>

