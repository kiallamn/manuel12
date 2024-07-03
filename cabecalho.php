   </head>
   <!-- body -->
   <body class="main-layout home_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo"> <a href="index.php"><img src="images/logo.png" alt="#"></a> </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
                              <ul class="menu-area-main">
                                 <li > <a href="index.php">HOME</a> </li>
                                 <li> <a href="about.php">SOBRE NÓS</a> </li>
                                 <li><a href="books.php">LIVROS</a></li>
                                 <li><a href="contact.php">CONTACTO</a></li>
                                 <li><a href="blog.php">BLOG</a></li>
<!--                                  <li class="mean-last"> <a href="#"><img src="images/search_icon.png" alt="#" /></a> </li> -->
                                 




<?php   
// include"db_connect.php";
// session_start();
if (isset($_SESSION['email'])) {
$login_cookie=$_COOKIE['login']; 
echo '<li class="mean-last"><a href="minhaconta.php">MINHA CONTA &nbsp; &nbsp;<img src="images/top-icon.png" alt="#" /></a></li>
<li class="mean-last"><a href="logout.php">SAIR</a></li>';
}else{
   unset($login_cookie);

}

if (!isset($_SESSION['email']) and !isset($_SESSION['senha'])) {
    // header("Location:index.php");   
   echo '<li class="mean-last"> <a href="login.php">LOGIN</a> </li>
   <li class="mean-last"> <a href="cadastrar.php">CADASTRA-SE</a> </li>';

}else{
   
}
?>


                                 <!-- <li class="mean-last"> <a href="#"><img src="images/search_icon.png" alt="#" /></a> </li> -->
                                 <!-- <li class="mean-last"> <a href="login.php"><img src="images/top-icon.png" alt="#" /></a> </li> -->
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
         <!-- end header inner -->
      </header>