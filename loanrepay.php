
<!DOCTYPE html>
<html>
<head>
	<title>APPLY FOR LOANS!</title>
	<link rel="stylesheet" href="loanrepay.css">
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
$accnum=$_COOKIE['accnum'];

$link=mysqli_connect("localhost","root","","aakash");

$a=1;
  $query="SELECT accnum FROM customer";
  $d=mysqli_query($link,$query);
  while ($row=mysqli_fetch_assoc($d))
  {
  	if($row['accnum']==$accnum)
  		{ $a=0; break;}
  }
  if($a==1)
  	{ echo "user does not exist"; exit; }
 



$query1="SELECT loannum from loan where accnum='$accnum';";//"SELECT paymentmt from loan,loanpayment where loan.loannum=loanpayment.loannum and loan.accnum='$accnum';"

$result1=mysqli_query($link,$query1);
$a=mysqli_fetch_assoc($result1);

$loannum=$a['loannum'];

$query2="SELECT paymentamt from loanpayment where loannum=$loannum;";

$result2=mysqli_query($link,$query2);
$b=mysqli_fetch_assoc($result2);

$amt=$b['paymentamt'];

setcookie("amot", $amt);


if($query1 && $query2){ ?>
	<html>
	<body>
		<h2>Amount payable:<?php echo $amt; ?></h2>
		<h3> To pay click submit </h3>
		<div class="login-page">
  <div class="form">
		<form  method="POST"  id="form1" action="loanpayment.php">
		 <button type="submit"  form="form1" value="Submit">Submit</button>
		</form>
		</div>
		</div>
		
	</body>
	</html>

	<?php
	
	

}
else{
	echo "error";
}


  ?>
  </body>
</html>