<?php 
$accnum = $_COOKIE['accno'];

$link=mysqli_connect("localhost","root","","aakash");

$query1="SELECT balance from account where accnum=$accnum;";

$result1=mysqli_query($link,$query1);
$bal=mysqli_fetch_assoc($result1);

if($result1) echo "balance = ".$bal['balance'];

 ?>