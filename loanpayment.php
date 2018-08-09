<!DOCTYPE html>
<html>
<head>
	<title>APPLY FOR LOANS!</title>
	<link rel="stylesheet" href="paymentphp.css">
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
			<a href="loanrepay.php" class="active">Loan payment</a>
			<a href="makefd.html">Make Fixed Deposit</a>
		</nav>
		</aside>
<?php  

$amt = $_COOKIE['amot'];
$accnum = $_COOKIE['accnum'];



$link=mysqli_connect("localhost","root","","aakash");
$query1="SELECT loannum from loan where accnum='$accnum';";

$result1=mysqli_query($link,$query1);
$a=mysqli_fetch_assoc($result1);
$loannum=$a['loannum'];



  $query="SELECT balance FROM account where accnum='$accnum';";
  $d=mysqli_query($link,$query);
  $row=mysqli_fetch_assoc($d);

  if(($row['balance']-$amt) < 0) { echo "Insufficient balance"; exit; }
  $p=$row['balance']-$amt;
  $q="UPDATE account set balance=$p where accnum='$accnum';";
  $k=mysqli_query($link,$q);



$result2=mysqli_query($link,"DELETE FROM loanpayment where loannum='$loannum';");
$result3=mysqli_query($link,"DELETE FROM loan where loannum='$loannum';");
$a=mt_rand(0,10000);

$d=strtotime("today");
$date2=date("Y-m-d",$d);
$result3=mysqli_query($link,"INSERT INTO transaction values('$accnum',4,'$a','$date2','$amt')");

if($result1 && $result2 && $result3 && $k){
	?>
	<div class="notice"> 
	<?php
	echo "Payment Successful";?>
	</div><?php
}else
{
	echo "";
}



?>
</body>
</html>
