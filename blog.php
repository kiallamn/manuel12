<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>NOVA LIVRARIA</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   


<style type="text/css">
   

body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.blog-container {
    width: 80%;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.blog-container h2 {
    text-align: center;
    color: #81256c;
}

.blog-post {
    margin-bottom: 20px;
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
}

.blog-title {
    font-size: 24px;
    color: #81256c;
    cursor: pointer;
    margin: 0;
    padding: 10px 0;
    transition: color 0.3s;
}

.blog-title:hover {
    color: #6b1d54;
}

.blog-content {
    display: none;
    margin-top: 10px;
}

.blog-content p {
    margin: 0;
    color: #333;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .blog-container {
        width: 90%;
    }
}



</style>




   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->

<?php include "cabecalho.php"; ?>


      <!-- end header -->
      <div class="about-bg">
         <div class="container">
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <div class="abouttitle">
                     <h2>Elimine suas dúvidas</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>







<div class="blog-container">
    <!-- <h2>Blog</h2> -->
    <div class="blog-post">
        <h3 class="blog-title">Nossa Missão</h3>
        <div class="blog-content">
            <p>Nossa missão é fornecer aos nossos clientes uma ampla seleção de livros a preços acessíveis e de alta qualidade. Acreditamos que a leitura pode transformar vidas e queremos tornar essa transformação acessível a todos.</p>
        </div>
    </div>
    <div class="blog-post">
        <h3 class="blog-title">Nossos Valores</h3>
        <div class="blog-content">
            <p>Valorizamos a integridade, a transparência e o compromisso com nossos clientes. Estamos empenhados em oferecer um excelente atendimento e garantir a satisfação de todos os nossos leitores.</p>
        </div>
    </div>
    <div class="blog-post">
        <h3 class="blog-title">Como funciona</h3>
        <div class="blog-content">
            <p>Basta escolher o Livro que deseja e solicitar o empréstimo clicando no botão "emprestar" na Página "Livros".</p>
        </div>
    </div>

        <div class="blog-post">
        <h3 class="blog-title">Nosso Público Alvo</h3>
        <div class="blog-content">
            <p>Amantes de leitura de todas as idades.</p>
        </div>
    </div>

    <div class="blog-post">
        <h3 class="blog-title">Tipos de livros</h3>
        <div class="blog-content">
            <p>Todos os livros em nossa Livraria oferecem conteúdo de qualidade e com foco na educação ou ensino de uma
            área específica da ciência!</p>
        </div>
    </div>

        <div class="blog-post">
        <h3 class="blog-title">Quem desenvolveu o site da NovaLivraria</h3>
        <div class="blog-content">
            <p>Este site foi desenvolvido por Manuel Kiala Ngombo como um projecto proposto pelo Professor Pedro Mbote.</p>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const titles = document.querySelectorAll('.blog-title');
        titles.forEach(title => {
            title.addEventListener('click', function() {
                const content = this.nextElementSibling;
                if (content.style.display === "none" || content.style.display === "") {
                    content.style.display = "block";
                } else {
                    content.style.display = "none";
                }
            });
        });
    });
</script>







      <!-- footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row pdn-top-30">
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                     <div class="Follow">
                        <h3>Follow Us</h3>
                     </div>
                     <ul class="location_icon">
                        <li> <a href="#"><img src="icon/facebook.png"></a></li>
                        <li> <a href="#"><img src="icon/Twitter.png"></a></li>
                        <li> <a href="#"><img src="icon/linkedin.png"></a></li>
                        <li> <a href="#"><img src="icon/instagram.png"></a></li>
                     </ul>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                     <div class="Follow">
                        <h3>Newsletter</h3>
                     </div>
                     <input class="Newsletter" placeholder="Enter your email" type="Enter your email">
                     <button class="Subscribe">Subscribe</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="copyright">
            <div class="container">
               <p>Copyright 2024 Todos Direitos Reservados <a href="https://html.design/"><br>
                  <strong>por Manuel Ngombo</strong></a></p>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>