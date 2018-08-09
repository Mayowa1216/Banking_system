
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="payment.css">
</head>
<body>

<aside class = "left">
			<nav>
			<img src="log.jpg"/>
			<a href="homepage.php" >Home</a>
			<a href="accover.php">Account Overview</a>
			<a href="showtransact.php" >View Statement</a>
			<a href="payment.html" >Utility Payment</a>
			<a href="custreq.html" >Service Request</a>
			<a href="loanapply.html" >Apply for loan</a>
			<a href="loanrepay.php">Loan payment</a>
			<a href="makefd.html" class="active">Make Fixed Deposit</a>
		</nav>
</aside>


<?php
$link=mysqli_connect("localhost","root","","aakash");

$accnum = $_COOKIE['accnum'];
$amount=$_POST['amount'];
$duration=$_POST['duration'];

$q="UPDATE account set balance=balance-$amount where accnum=$accnum;";
  $k=mysqli_query($link,$q);
$q="UPDATE account set balance=balance+$amount where accnum=4;";
  $j=mysqli_query($link,$q);

$query="SELECT balance FROM account where accnum='$accnum';";
  $d=mysqli_query($link,$query);
  $row=mysqli_fetch_assoc($d);

  if(($row['balance']-$amount) < 0) { echo "Insufficient balance"; exit; }

$a=mt_rand(0,10000);
  $d=strtotime("today");
$date2=date("Y-m-d",$d);
$result1=mysqli_query($link,"INSERT INTO transaction values('$accnum','4','$a','$date2','$amount')");

$matamount=$amount*.05+$amount;

$result2=mysqli_query($link,"INSERT INTO fdaccount values('$accnum','$matamount','$amount','$duration');");

if($result2&&$result1&&$k&&$j) echo"Amount after 1 year is ". $matamount;
else echo "ERROR";

  ?>
  </body>
</html>