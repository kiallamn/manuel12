<?php 
header('content-Type: text/html; charset=utf-8');
$servername="localhost";
$username="root";
$password="";
$db_connect="novalivraria";

$connect=mysqli_connect($servername,$username,$password,$db_connect);


 if (mysqli_connect_error()):
 	echo "falha na conexão".mysqli_connect_error();
 endif;
?>