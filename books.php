<?php

include "header.php";

$post_livro = "SELECT * FROM livros ORDER BY id DESC";
$result_livro = mysqli_query($connect, $post_livro);
$total_livros = mysqli_num_rows($result_livro);

?>

html
Copiar código
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
   <!-- Custom CSS -->
   <style>

      body {
          font-family: Arial, sans-serif;
          background-color: #f4f4f4;
          margin: 0;
          padding: 0;
      }

      .containerr {
          max-width: 1200px;
          margin: 0 auto;
          padding: 10px;

      }

      #conteudo {
          display: flex;
          flex-direction: column;
          align-items: center;
          gap: 20px;
          text-align: left;
      }

      #conteudo center {
          width: 100%;
          max-width: 800px;
          box-sizing: border-box;
          background-color: #fff;
          padding: 15px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          border-radius: 8px;
          display: flex;
          align-items: center;
          text-align: left;
      }

      .div_img_livro {
          text-align: center;
          flex-shrink: 0;
      }

      .div_img_livro img {
          max-width: 390px;
          height: auto;
          border-radius: 8px;
      }

      .book-details {
          margin-left: 20px;
      }

      .titulo {
          color: #81256c;
          font-size: 1.2em;
          margin-bottom: 10px;
      }

      .preco {
          font-weight: bold;
          margin-bottom: 10px;
      }

      .editora,
      .ano,
      .paginas {
          margin-bottom: 5px;
      }

      @media (max-width: 768px) {
          #conteudo center {
              flex-direction: column;
              text-align: center;
          }

          .book-details {
              margin-left: 0;
              margin-top: 15px;
          }

          .div_img_livro img {
              max-width: 100px;
          }
      }

      button {
    font-family: Arial, sans-serif;
    font-size: 16px;
    padding: 10px 20px;
    margin: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

button.comprar {
    background-color: #81256c;
    color: #fff;
}

button.comprar:hover {
    background-color: #6a1e59;
    color: #f4f4f4;
}

button.emprestar {
    background-color: #81256c;
    color: #fff;
}

button.emprestar:hover {
    background-color: #6a1e59;
    color: #f4f4f4;
}

   </style>
</head>
<body class="main-layout Books-bg">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header>
      <?php include "cabecalho.php"; ?>
   </header>
   <!-- end header -->
   <div class="about-bg">
      <div class="container">
         <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
               <div class="abouttitle">
                  <h2>Nossos Livros</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--Books -->
   <div class="Bookss">
      <div class="containerr">
         <div id="conteudo">
            <br>
            <?php 
            while ($livro = mysqli_fetch_array($result_livro)) {
               $titulo = $livro['titulo'];
               $id = $livro['id'];
               $ano = $livro['pub'];
               $preco = $livro['preco'];
               $autor = $livro['autor'];
               $editora = $livro['editora'];
               $paginas = $livro['pag'];
            ?>
               <center>
               <div class="div_img_livro">
                  <a href="visu_livro.php?id=<?php echo $id; ?>">
                  <img class="img_livro" src="upload/<?php echo $livro['img'] ?>" alt="<?php echo $titulo; ?>"/></a>
               </div>
               <div class="book-details">
                  <p class="titulo"><?php echo "Titulo: " . $titulo ?></p>
                  <p class="preco"><?php echo "Preço: $preco&nbsp;Kz"?></p>
                  <p class="editora"><?php echo "Editora: " . $editora ?></p>
                  <p class="ano"><?php echo "Ano de Publicação: " . $ano ?></p>
                  <p class="paginas"><?php echo "Total de páginas: " . $paginas ?></p>


               <!-- <button class="comprar">COMPRAR</button>   -->
                <form action="emprestar.php" method="post">
                    <input type="hidden" name="id_livro" value="<?php echo $id; ?>">
                    <input type="hidden" name="titulo" value="<?php echo $titulo; ?>">
                    <button class="emprestar">EMPRESTAR</button>
                </form>


               </div>



               </center>
            <?php 
            } 
            ?>
         </div><br>
      </div>
   </div>
   <!-- end Books -->
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
