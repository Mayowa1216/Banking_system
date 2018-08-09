<?php
$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['rpassword'];
$name=$_POST['name'];
$city=$_POST['city'];
$street=$_POST['street'];
$email=$_POST['email'];



if ($password!=$password2) {
	echo "Passowords do not match";
}else{
	$link=mysqli_connect("localhost","root","","aakash");
	$a=mt_rand(0,10000);

	$query1="INSERT INTO account values($a,10000,'Savings');";
	$query2="INSERT INTO customer values($a,'$username','$password');";
	$query3="INSERT INTO customer_info values($a,'$name','$street','$city','$email');";

	$result1=mysqli_query($link,$query1);
	$result2=mysqli_query($link,$query2);
	$result3=mysqli_query($link,$query3);

	if($result1 && $result2 && $result3){
	echo "User Registered succesfully with account nummber " . $a;	
	header('Location: loginmain.html');
	}else echo "sa";
}


  ?>

