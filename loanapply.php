
<!DOCTYPE html>
<html>
<head>
  <title>APPLY FOR LOANS!</title>
  <link rel="stylesheet" href="loanapplyphp.css">
</head>
<body>
<aside class = "left">
      <nav>
      <img src="log.jpg"/>
      <a href="homepage.php" >Home</a>
      <a href="teams.html">Account Overview</a>
      <a href="showtransact.php">View Statement</a>
      <a href="payment.html" >Utility Payment</a>
      <a href="facebook.com" >Service Request</a>
      <a href="loanapply.html" class="active">Apply for loan</a>
      <a href="loanrepay.php">Loan payment</a>
      <a href="">Make Fixed Deposit</a>
    </nav>
    </aside><?php 
$loan_amt=$_POST['loan_amt'];
$type=$_POST['type'];
$accnum=$_COOKIE['accnum'];

$link=mysqli_connect("localhost","root","","aakash");
$a=1;
  $query="SELECT accnum FROM customer";
  $d=mysqli_query($link,$query);
  while ($row=mysqli_fetch_assoc($d))
  {
  	if($row['accnum']==$accnum)
  		{ $a=0; break; }
  }
  if($a==1)
  	{ echo "user does not exist"; exit; }
  
  

$loannum=mt_rand(0,10000);


$d=strtotime("today");
$date=strtotime("+1 year", $d);

$date1=date("Y-m-d", $date);
$interest="SELECT interest FROM loans WHERE type='$type';";
$int2=mysqli_query($link,$interest);
$row = mysqli_fetch_assoc($int2);
$paymentamt=$loan_amt+($loan_amt*$row['interest']*0.01);


$query1="INSERT INTO loan VALUES('$accnum','$loannum','$loan_amt','$type'); ";


$query2="INSERT INTO loanpayment VALUES('$loannum','$date1','$paymentamt');";

$query3="UPDATE account set balance=balance+$loan_amt;";

$result1=mysqli_query($link,$query1);
$result2=mysqli_query($link,$query2);
$result4=mysqli_query($link,$query3);
$a=mt_rand(0,10000);
$date2=date("Y-m-d",$d);

$result3=mysqli_query($link,"INSERT INTO transaction VALUES('4','$accnum','$a','$date2','$loan_amt');");


  

if($result1 && $result2 && $result3 && $result4){
	?>
	<!DOCTYPE html>
	<html>
	<body>
	<div class="notice">Your Loan has been approved!</div>
	</body>
	</html><?php
	
}else{?><!DOCTYPE html>
<html>
<body>
<h1> Not Sort</h1>
</body>
</html><?php
}

 ?>