<?php   
include"db_connect.php";
session_start();
if (isset($_SESSION['email'])) {
$login_cookie=$_COOKIE['login'];	
}else{
	unset($login_cookie);
}

if (!isset($_SESSION['email']) and !isset($_SESSION['senha'])) {
	 // header("Location:index.php");	
}else{
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="reset.css"> -->
</head>
<body>

<!-- <header class="header-seg">
	<div class="seg"><a href="index.php">Voltar para página principal</a></div>
	<span><h1 class="logo-um">magazine</h1></span>
</header> -->

</body>
</html>