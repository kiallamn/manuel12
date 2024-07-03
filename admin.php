<?php


include 'header.php';

if (!isset($_SESSION['email']) and !isset($_SESSION['senha'])) {
    header("Location:login.php");   

}else{
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Admin</title>
    <link rel="stylesheet" href="css/admin-style.css">

<style type="text/css">
    

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

header {
    background-color: #81256c;
    color: #fff;
    padding: 20px;
    text-align: center;
    border-radius: 8px 8px 0 0;
}

nav a {
    color: #fff;
    text-decoration: none;
    margin: 0 15px;
}

.content {
    background-color: #fff;
    padding: 20px;
    border-radius: 0 0 8px 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h1, h2 {
    color: #81256c;
}

form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="number"],
input[type="file"] {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button {
    background-color: #81256c;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #6a1e59;
}



</style>




</head>
<body>
    <div class="container">
        <A href="index.php"><button type="submit">HOME</button></a><br><br>
        <header>
            <h1 style="color:#fff">Painel de Admin</h1>
            <nav>
                <a href="admin.php">Adicionar Livro</a>
                <a href="view_books.php">Ver Livros</a>
            </nav>
        </header>

        <div class="content">
            <!-- Formulário para adicionar livro -->
            <section id="add-book">
                <h2>Adicionar Livro</h2>
                <form action="add_book.php" method="post" enctype="multipart/form-data">
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" required>

                    <label for="autor">Autor:</label>
                    <input type="text" id="autor" name="autor" required>

                    <label for="editora">Editora:</label>
                    <input type="text" id="editora" name="editora" required>

                    <label for="ano">Ano de Publicação:</label>
                    <input type="number" id="ano" name="ano" required>

                    <label for="paginas">Total de Páginas:</label>
                    <input type="number" id="paginas" name="paginas" required>

                    <label for="preco">Preço:</label>
                    <input type="number" step="0.01" id="preco" name="preco" required>

                    <label for="img">Imagem:</label>
                    <input type="file" id="img" name="img" required>

                    <button type="submit">Adicionar Livro</button>
                </form>
            </section>
        </div>
    </div>
</body>
</html>




