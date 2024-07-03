<?php
include "db_connect.php";
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Buscar o ID do usuário usando o email
    $query = "SELECT id_user FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id_user = $row['id_user'];

        $id_livro = $_POST['id_livro'];
        $titulo = $_POST['titulo'];
        $data_emprestimo = date("Y-m-d");

        // Inserir o empréstimo na tabela
        $sql = "INSERT INTO emprestimos (id_user, id_livro, titulo, data_emprestimo) VALUES ('$id_user', '$id_livro', '$titulo', '$data_emprestimo')";

        if (mysqli_query($connect, $sql)) {
            $message = "Livro emprestado com sucesso!";
        } else {
            $message = "Erro ao emprestar livro: " . mysqli_error($connect);
        }
    } else {
        $message = "Usuário não encontrado.";
    }
} else {
    $message = "Você precisa estar logado para emprestar um livro.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimo de Livro</title>
    <link rel="stylesheet" href="css/style.css">


<style type="text/css">
    

.container {
    text-align: center;
    margin-top: 50px;
}

h1 {
    color: #81256c;
    margin-bottom: 20px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #81256c;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

.btn:hover {
    background-color: #6a1e56;
}



</style>


</head>
<body>
    <div class="container">
        <h1><?php echo $message; ?></h1>
        <a href="books.php" class="btn">Voltar para Livros</a>
    </div>
</body>
</html>
