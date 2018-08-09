<html>

<head>
	<title>Transactions</title>
	<link rel="stylesheet" href="showtransaction.css">
</head>
<body>
<section class="row-alt">




	

<?php 
$accnum=$_COOKIE['accnum'];

$link=mysqli_connect("localhost","root","","aakash");

$query2="SELECT * FROM transaction where from1='$accnum' or to1='$accnum'  ;";
$result2=mysqli_query($link,$query2);

echo "<table >\n";
echo "<tr><th>FROM</th><th>TO</th><th>TRANSACTION-ID</th><th>DATE</th><th>AMOUNT</th></tr>";
$query1="SELECT balance from account where accnum=$accnum;";

$result1=mysqli_query($link,$query1);
$bal=mysqli_fetch_assoc($result1);?>

<h1>
<?php
if($result1) echo " Your Account Balance is=Rs.".$bal['balance'];
?>
</h1>
<?php
while($row=mysqli_fetch_assoc($result2)){

	echo "<tr><td>{$row['from1']}</td>   <td> {$row['to1']}</td>    <td> {$row['tid']}</td>    <td> {$row['tdate']}</td>	<td> {$row['amount']}</td>	</tr>";
}

?>
</section>
<aside class = "left">
			<nav>
			<img src="log.jpg"/>
			<a href="homepage.php" >Home</a>
			<a href="accover.php">Account Overview</a>
			<a href="showtransact.php" class="active">View Statement</a>
			<a href="payment.html">Utility Payment</a>
			<a href="custreq.html" >Service Request</a>
			<a href="loanapply.html" >Apply for loan</a>
			<a href="loanrepay.php">Loan payment</a>
			<a href="makefd.html">Make Fixed Deposit</a>
		</nav>
		</aside>
		
</body>
</html>
</body>
</html>