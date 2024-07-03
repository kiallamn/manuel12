<?php  

session_start();

include "db_connect.php";

if (isset($_POST['enviar'])) :

	$email=mysqli_escape_string($connect ,$_POST['email']);
	$senha=mysqli_escape_string($connect, $_POST['senha']);  

if (empty($email) or empty($senha)) :
		echo "<h3>Os campos precisam ser devidamente preenchidos</h3>";
else:
	$sql= mysqli_query($connect, "SELECT * FROM usuarios WHERE email='$email'AND senha='$senha'");

	if (mysqli_num_rows($sql)<=0) {
		echo "<h3>Senha ou email errado</h3>";
		}else{
		$read=mysqli_query($connect,"SELECT * FROM usuarios where email='$email' AND senha='$senha'");
		if ($read) {
			$_SESSION['email']=$email;
 			$_SESSION['senha']=$senha;
 			$_SESSION['logado']=true;
	
 			setcookie("login", $email);
 			header("Location:index.php");
		
	}
}
endif;
endif;
?>



<!DOCTYPE html>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<!-- <link rel="stylesheet" type="text/css" href="reset.css"> -->
	<meta charset="utf-8">
	<title>Página inicial</title>
	<style type="text/css">


	body{

    background: #eee;
    font-family: Arial;background: #eee;}
	::-webkit-input-placeholder{color: #7f7e7d}
		:-moz-placeholder{color: #7f7e7d}
		::-moz-placeholder{color: #7f7e7d}
		:-ms-input-placeholder{color: #7f7e7d}
		.entra{margin: auto;text-align: center;font-size: 18px;}
		.logo{width: 100%;height: 200px; background: url(imagens/official-logo.png) center center/400px no-repeat;font-size: 0;background-position:40% -114px;position: relative;display: block;margin-top: 10px;padding: 40px;}
		form{margin-top: -150px;position: relative;display: block;}
		 p.para{clear: both;margin-top: 2px;text-align: center;font-size: 16px;}
		.logando{margin: auto;background: transparent;margin-top: 2px;font-size: 16px;width: 80%;display: block;height: 30px;border:1px solid #81256c;}
		div#bottom{background: #81256c;width: 90%;margin: auto;border-radius:10px;border-top-left-radius: 0px;border-top-right-radius: 0px;}
	     div#bottom p{color: #fff;font-family: Arial;font-size: 14px;width: 80%;word-wrap: break-word;}
		div#tudo{margin: auto;width:60%;height: 450px;background: #fff;margin-bottom: 40px;margin-top: 40px;}
		a.a{margin: auto;text-decoration: none;margin-top: 14%;font-size: 15px;font-family: mixage BK BT;color: #81256c;text-align: center;}
		button.enviar{background-color:#81256c;width: 120px;border:none;font-size: 16px;float: right;height:40px;color: #fff;cursor: pointer;margin-right: 10%}
		.div{width: 80%;margin: auto;}
	}

	</style>
</head>

<body>
<div id="tudo">
	<center><span><h1 class="logo">img-login</h1></span></center>

	


<form method="POST" action="">
<h3 class="entra">Entre na sua conta</h3><br>

	<input type="email" name="email" placeholder="endereço email"  class="logando"><br>
	<input type="password" name="senha" placeholder="senha" maxlength="10"  class="logando">
<br>
	


<div class="div">
			<a href="esqueci.php" class="a">Esqueceu a sua senha?</a><br><br>
			<a  href="cadastrar.php" class="a">Ainda não tem uma conta?</a><br><br>

			</div>
			<button class="enviar" name="enviar">Entrar</button>
		
</form>
<!-- <div id="bottom">
	<p class="ao">Ao fazer o login estará concordando com todas as políticas de utilização, Clique em entrar para aceder a sua conta ou crie uma agora mesmo <a href="cadastrar.php">clicando aqui.</a></p>
	</div> -->

	</div>
<!-- <p class="para" style="color: #ababab;">Bonsanúncios copyright &copy &nbsp2019</p> -->
</body>

</html>
