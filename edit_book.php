<?php
// Inclua a conexão com o banco de dados
include 'db_connect.php';

// Verifica se o ID do livro foi passado via GET
if (!isset($_GET['id'])) {
    header("Location: view_books.php");
    exit();
}

$id = $_GET['id'];

// Obtém os dados atuais do livro pelo ID
$sql = "SELECT * FROM livros WHERE id=$id";
$result = mysqli_query($connect, $sql);
$livro = mysqli_fetch_assoc($result);

if (!$livro) {
    echo "Livro não encontrado.";
    exit();
}

// Processa o formulário quando enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editora = $_POST['editora'];
    $ano = $_POST['ano'];
    $paginas = $_POST['paginas'];
    $preco = $_POST['preco'];
    $img = $_FILES['img']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);

    // Verifica se a imagem foi alterada
    if ($img) {
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
        $sql_update = "UPDATE livros SET titulo='$titulo', autor='$autor', editora='$editora', pub='$ano', pag='$paginas', preco='$preco', img='$img' WHERE id=$id";
    } else {
        $sql_update = "UPDATE livros SET titulo='$titulo', autor='$autor', editora='$editora', pub='$ano', pag='$paginas', preco='$preco' WHERE id=$id";
    }

    // Executa a atualização no banco de dados
    if (mysqli_query($connect, $sql_update)) {
        echo "Livro atualizado com sucesso!";
        $livro = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM livros WHERE id=$id"));
    } else {
        echo "Erro ao atualizar livro: " . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="css/admin-style.css">


<style type="text/css">
    

body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

header {
    background-color: #81256c;
    color: #fff;
    padding: 10px 0;
    text-align: center;
    margin-bottom: 20px;
}

header h1 {
    margin: 0;
    font-size: 24px;
}

form {
    max-width: 600px;
    margin: 0 auto;
}

form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #81256c;
}

form input[type=text],
form input[type=number],
form textarea {
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

@media (max-width: 768px) {
    .container {
        width: 90%;
    }
}

@media (max-width: 480px) {
    form input[type=text],
    form input[type=number],
    form textarea {
        width: calc(100% - 16px);
    }
}
a {
    color: #fff;
    text-decoration: none;
    padding: 5px 10px;
    margin-right: 10px;
    /*margin-top: 0px;*/
    background-color: #6b1d54;
    border-radius: 5px;
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
            <h2>Editar Livro</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo $livro['titulo']; ?>" required>

                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" value="<?php echo $livro['autor']; ?>" required>

                <label for="editora">Editora:</label>
                <input type="text" id="editora" name="editora" value="<?php echo $livro['editora']; ?>" required>

                <label for="ano">Ano de Publicação:</label>
                <input type="number" id="ano" name="ano" value="<?php echo $livro['pub']; ?>" required>

                <label for="paginas">Total de Páginas:</label>
                <input type="number" id="paginas" name="paginas" value="<?php echo $livro['pag']; ?>" required>

                <label for="preco">Preço:</label>
                <input type="number" step="0.01" id="preco" name="preco" value="<?php echo $livro['preco']; ?>" required>

                <label for="img">Imagem:</label>
                <input type="file" id="img" name="img">
                <img src="upload/<?php echo $livro['img']; ?>" alt="<?php echo $livro['titulo']; ?>" style="width: 100px;">

                <button type="submit">Atualizar Livro</button>
            </form>
        </div>
    </div>
</body>
</html>
