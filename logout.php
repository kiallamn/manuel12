<?php
session_start();
session_unset();
session_destroy();

setcookie('login', null, 0);
unset($login_cookie);
header("Location:index.php");

 ?>
