<?php
include "db_connect.php";


// include "header.php";

if (isset($_POST['cadastrar'])) {

  
  $email= mysqli_escape_string($connect,$_POST['email']);
  $senha=mysqli_escape_string($connect, $_POST['senha']);
  $config=mysqli_escape_string($connect, $_POST['confi']);
  $nome=mysqli_escape_string($connect, $_POST['nome']);
  $telefone= mysqli_escape_string($connect, $_POST['telefone']);
  $morada=mysqli_escape_string($connect, $_POST['morada']);
  $data=mysqli_escape_string($connect, $_POST['data']);



   $sql=mysqli_query($connect,"SELECT email FROM usuarios WHERE email='$email'");

$num=mysqli_num_rows($sql);
if ($num>=1) {
  echo '<h4>Este e-mail já foi cadastrado <a href="login.php">clique aqui</a> para acessar a sua conta!<h4>';
}elseif ($nome=='' or strlen($nome)<10 ) {
  echo "<h4>Preencha devidamente o campo Nome! Precisa ter pelo menos 8 caracteres.<h4>";
  }elseif ($email=='' or strlen($email)<10) {
    echo "<h4>Digite correctamente o seu endereço e-mail<h4>";
    }elseif ($senha=='' or strlen($senha)<6) {
      echo "<h4>Para casos de segurança digite uma senha com 6 ou mais caracteres<h4>";
    }elseif($config!==$senha){
      echo "erro ao confirmar senha";
  }

  else {

  $query="INSERT INTO usuarios (email,senha,nome,telefone,endereco, data) VALUES ('$email','$senha','$nome','$telefone','$morada','$data')";
     $data=mysqli_query($connect, $query);
      if ($data) {
        header("Location:boasvindas.php");
      }else{
        echo "<h4>Desculpe! Ocorreu um erro ao cadastrar-se. Tente novamente preenchendo devidamente os campos.<h4>";
      }
    }
  }



 ?>

  <!DOCTYPE html>
  <html lang="pt-br">

  <head>
    <!-- <link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Montserrat'> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" type="text/css" href="reset.css"> -->

        <meta charset="utf-8">
        <title>cadastrar</title>
<style type="text/css">
body{

  font-family: Arial;background: #eee;}
  ::-webkit-input-placeholder{color: #7f7e7d}
    :-moz-placeholder{color: #7f7e7d}
    ::-moz-placeholder{color: #7f7e7d}
    :-ms-input-placeholder{color: #7f7e7d}
    .entra{margin: auto;text-align: center;font-size: 18px;position: relative;margin-top: -190px;margin-right:3%;position:relative;}
    .logo{width: 100%;height: 200px; background: url(imagens/official-logo.png) center center/400px no-repeat;font-size: 0;background-position:40% -114px;position: relative;display: block;margin-top: 10px;padding: 40px;}
    form{margin-top: 10px;position: relative;display: block;}
     p.para{clear: both;margin-top: 2px;text-align: center;font-size: 16px;position: relative;}
    .input{margin: auto;background: transparent;margin-top: -4px;font-size: 16px;width: 80%;display: block;height: 26px;border:1px solid #81256c;}
    div#bottom{background: #81256c;width: 90%;margin: auto;border-radius:10px;border-top-left-radius: 0px;border-top-right-radius: 0px;}
       div#bottom p{color: #fff;font-family: Arial;font-size: 14px;width: 80%;word-wrap: break-word;}
    div#tudo{margin: auto;width:60%;height: 600px;background: #fff;margin-bottom: 60px;margin-top: 40px;}
    a.a{margin: auto;text-decoration: none;margin-top: 14%;font-size: 15px;font-family: mixage BK BT;color: #81256c;text-align: center;}
    button.enviar{background-color:#81256c;width: 120px;border:none;font-size: 16px;float: right;height:40px;color: #fff;cursor: pointer;margin-right: 10%}
    .div{width: 80%;margin: auto;}
  }


  </style>
  </head>

  <body>
        <div id="tudo">
        <center><span><h1 class="logo">img-login</h1></span></center>

        <center><h3 class="entra">Crie sua conta agora mesmo</h3></center><br>


          <form method="POST" >

  
    <input type="text" name="nome" placeholder="nome completo (mínimo 6 caracteres)" required="required" class="input"><br>
    <input type="email" name="email" placeholder="endereço e-mail" required="required" class="input"><br>
    <input type="password" name="senha" placeholder="senha de usuário (mínimo 6 caracteres)" required="required" class="input"><br>
    <input type="password" name="confi" placeholder="confirme a sua senha" required="required" class="input"><br>
    <input type="text" name="morada" placeholder="sua morada" required="required" class="input"><br>


    <div>


      <!-- <input type="text" placeholder="nome do seu site (opcional)" name="site" class="input"><br> -->
      <!-- <input type="text" placeholder="endereço do seu site (opcional)" name="endereco" class="input"><br> -->
        <input type="text" placeholder="telefone" name="telefone" class="input"><br>
    </div>


    <div class="div"><a class="a" href="login.php">Já tens uma conta?</a></div><br>
    <button name="cadastrar" class="enviar">Seguinte</button>

  </form>
   </div>

  </body>

  </html>