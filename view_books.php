<?php
// Inclua a conexão com o banco de dados
include 'db_connect.php';

// Excluir livro
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM livros WHERE id=$id";
    if (mysqli_query($connect, $sql)) {
        echo "Livro excluído com sucesso!";
    } else {
        echo "Erro ao excluir livro: " . mysqli_error($connect);
    }
}

// Obter todos os livros
$sql = "SELECT * FROM livros";
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Livros</title>
    <link rel="stylesheet" href="css/admin-style.css">


<style type="text/css">
    
/* Estilos gerais para o painel de administração */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

header {
    background-color: #81256c;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

header h1 {
    margin: 0;
    font-size: 24px;
}

nav {
    margin-top: 10px;
}

nav a {
    color: #fff;
    text-decoration: none;
    padding: 5px 10px;
    margin-right: 10px;
    background-color: #6b1d54;
    border-radius: 5px;
}

nav a:hover {
    background-color: #4a1233;
}

.content {
    margin-top: 20px;
}

form {
    max-width: 600px;
    margin: 0 auto;
}

form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

form input[type=text],
form input[type=number],
form input[type=file] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

form button[type=submit] {
    background-color: #81256c;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
}

form button[type=submit]:hover {
    background-color: #6b1d54;
}

.book-list {
    margin-top: 20px;
}

.book-item {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
    background-color: #fff;
    overflow: hidden;
}

.book-item img {
    width: 100px;
    float: left;
    margin-right: 10px;
}

.book-details {
    float: left;
    width: calc(100% - 120px); /* 100% - width of the image */
}

.book-details h3 {
    margin-top: 0;
    font-size: 18px;
    color: #81256c;
}

.book-details p {
    margin: 5px 0;
}

.book-actions {
    clear: both;
    margin-top: 10px;
}

.book-actions a {
    color: #81256c;
    text-decoration: none;
    padding: 5px 10px;
    margin-right: 10px;
    border: 1px solid #81256c;
    border-radius: 4px;
}

.book-actions a:hover {
    background-color: #81256c;
    color: #fff;
}

.book-actions button {
    background-color: #d9534f;
    color: #fff;
    border: none;
    padding: 5px 10px;
    margin-right: 10px;
    cursor: pointer;
    border-radius: 4px;
}

.book-actions button:hover {
    background-color: #c9302c;
}

@media (max-width: 768px) {
    .container {
        width: 90%;
    }
}

@media (max-width: 480px) {
    form input[type=text],
    form input[type=number],
    form input[type=file] {
        width: calc(100% - 16px);
    }
}


.container {
    width: 80%;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.message {
    text-align: center;
    margin-bottom: 20px;
}

.message h2 {
    color: #81256c;
    margin-top: 0;
}

.message p {
    margin-top: 10px;
}

.button-container {
    text-align: center;
    margin-top: 20px;
}

.button-container a {
    background-color: #81256c;
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 4px;
    margin-right: 10px;
}

.button-container a:hover {
    background-color: #6b1d54;
}

@media (max-width: 768px) {
    .container {
        width: 90%;
    }
}


</style>



</head>
<body>
    <div class="container">
        <header>
            <h1>Painel de Admin</h1>
            <nav>
                <a href="admin.php">Adicionar Livro</a>
                <a href="view_books.php">Ver Livros</a>
            </nav>
        </header>

        <div class="content">
            <h2>Livros Cadastrados</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Editora</th>
                    <th>Ano</th>
                    <th>Páginas</th>
                    <th>Preço</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
                <?php while ($livro = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $livro['id']; ?></td>
                    <td><?php echo $livro['titulo']; ?></td>
                    <td><?php echo $livro['autor']; ?></td>
                    <td><?php echo $livro['editora']; ?></td>
                    <td><?php echo $livro['pub']; ?></td>
                    <td><?php echo $livro['pag']; ?></td>
                    <td><?php echo $livro['preco']; ?></td>
                    <td><img src="upload/<?php echo $livro['img']; ?>" alt="<?php echo $livro['titulo']; ?>" style="width: 50px;"></td>
                    <td>
                        <a href="edit_book.php?id=<?php echo $livro['id']; ?>">Editar</a>
                        <a href="view_books.php?delete=<?php echo $livro['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este livro?');">Excluir</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>
