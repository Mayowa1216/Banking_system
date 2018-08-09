<?php 
$username=$_POST['username'];
$password=$_POST['password'];

$link=mysqli_connect("localhost","root","","aakash");
//localhost,username,password,database name
 $query="SELECT * FROM customer WHERE username='$username' AND password='$password';";
 $query1="SELECT accnum From customer WHERE username='$username' AND password='$password';";
	$result1=mysqli_query($link,$query1);
	$a=mysqli_fetch_assoc($result1);
	$accnum=$a['accnum'];
	setcookie("accnum",$accnum);
	$query2="SELECT name from customer_info where accnum=$accnum;";
	$result2=mysqli_query($link,$query2);
	$b=mysqli_fetch_assoc($result2);
	$name=$b['name'];
	setcookie("name",$name);
	echo $name;

 $result=mysqli_query($link,$query);
 if(mysqli_num_rows($result)==1){
?>
	
<?php
header('Location: homepage.php');
}else{
}
//header('Location: loginmain.html');
	echo "ashj";
 ?>
