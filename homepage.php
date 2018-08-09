<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WELCOME</title>
	<link rel="stylesheet" href="homepage.css">
	
	</head>
	<aside class = "left">
			<nav>
			<img src="log.jpg"/>
			<a href="homepage.php" class="active">Home</a>
			<a href="accover.php">Account Overview</a>
			<a href="showtransact.php">View Statement</a>
			<a href="payment.html">Utility Payment</a>
			<a href="custreq.html" >Service Request</a>
			<a href="loanapply.html" >Apply for loan</a>
			<a href="loanrepay.php">Loan payment</a>
			<a href="makefd.html">Make Fixed Deposit</a>
		</nav>
		</aside>
		
<body>
 <section class="row-alt">
<h1>Welcome to Online banking System</h1>
</section>
<?php
$name=$_COOKIE['name'];
$accnum=$_COOKIE['accnum'];
?>
<html>
<body>
<h2>
<?php
 echo "HELLO! $name"."\n";?></h2>
<h3>
<?php
echo "Your Account number is: $accnum";
?>
</h3>
</body>
</html>



</body>
</html>