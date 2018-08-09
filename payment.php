<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Utility Payment</title>
	<link rel="stylesheet" href="paymentphp.css">
	
	</head>
<body>
 <section class="row-alt">
<h1>Welcome to Online banking System</h1>




<?php
$accnum = $_COOKIE['accnum'];
$depositname=$_POST['to'];
$amount=$_POST['amount'];

$link=mysqli_connect("localhost","root","","aakash");


  $query="SELECT balance FROM account where accnum='$accnum';";
  $d=mysqli_query($link,$query);
  $row=mysqli_fetch_assoc($d);

  if(($row['balance']-$amount) < 0) { echo "Insufficient balance"; exit; }


$result1=mysqli_query($link,"UPDATE account set balance=balance-$amount where accnum=$accnum;");
$result2=mysqli_query($link,"UPDATE account set balance=balance+$amount where accnum=$depositname;");
$a=mt_rand(0,10000);
$d=strtotime("today");
$date2=date("Y-m-d",$d);
$result3=mysqli_query($link,"INSERT INTO transaction values('$accnum',$depositname,'$a','$date2','$amount')");

if($result1 && $result2 && $result3){
	?>
	<div class="notice">
	<?php
	echo "Payment Successful!";?>
	</div><?php
} else echo "Not successful";
 ?>

  

</section>
<aside class = "left">
			<nav>
			<img src="log.jpg"/>
			<a href="homepage.php" >Home</a>
			<a href="accover.php">Account Overview</a>
			<a href="showtransact.php" >View Statement</a>
			<a href="payment.html" class="active">Utility Payment</a>
			<a href="custreq.html" >Service Request</a>
			<a href="loanapply.html" >Apply for loan</a>
			<a href="loanrepay.php" >Loan payment</a>
			<a href="makefd.html">Make Fixed Deposit</a>
		</nav>
		</aside>
		
</body>
</html>