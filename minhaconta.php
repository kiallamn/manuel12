

<?php
session_start();
include "db_connect.php";






// include "db_connect.php";
// session_start();

if (isset($_SESSION['email'])) {
    $login_cookie = $_COOKIE['login'];

    if ($_SESSION['email'] == "manuel@gmail.com") {
        header("Location: admin.php");
        exit(); // Certifique-se de sair após o redirecionamento
    }
} else {
    unset($login_cookie);
    // echo 'logout<li class="mean-last"> <a href="login.php"><img src="images/top-icon.png" alt="#" /></a> </li>';
}

if (!isset($_SESSION['email']) && !isset($_SESSION['senha'])) {
    header("Location: login.php");
    exit(); // Certifique-se de sair após o redirecionamento
}





if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];
$query = "SELECT * FROM usuarios WHERE email = '$email'";
$result = mysqli_query($connect, $query);
$user = mysqli_fetch_assoc($result);

$books_query = "SELECT * FROM emprestimos WHERE id_user = '{$user['id_user']}'";
$books_result = mysqli_query($connect, $books_query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];

    $update_query = "UPDATE usuarios SET nome='$nome', telefone='$telefone', endereco='$endereco', senha='$senha' WHERE email='$email'";
    if (mysqli_query($connect, $update_query)) {
        $msg = "Dados atualizados com sucesso!";
    } else {
        $msg = "Erro ao atualizar dados: " . mysqli_error($connect);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Conta</title>
    <link rel="stylesheet" href="css/minhaconta-style.css">


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
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

h2 {
    text-align: center;
    color: #81256c;
}

.user-details,
.user-books {
    margin-bottom: 30px;
}

.user-details h3,
.user-books h3 {
    color: #81256c;
    margin-bottom: 10px;
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
form input[type=password] {
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

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th,
table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: #81256c;
    color: #fff;
}

.msg {
    color: green;
    text-align: center;
}



</style>


</head>
<body>
    <header>
        <!-- Inclua aqui o cabeçalho, caso já tenha sido criado -->
    </header>
    <div class="container">
    	        <A href="index.php"><button type="submit">HOME</button></a><br><br>

        <h2>Minha Conta</h2>
        <?php if (isset($msg)) { echo "<p class='msg'>$msg</p>"; } ?>
        <div class="user-details">
            <center><h3>Dados Pessoais</h3></center>
            <form action="minhaconta.php" method="post">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $user['nome']; ?>" required>
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="<?php echo $user['telefone']; ?>" required>
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" value="<?php echo $user['endereco']; ?>" required>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" value="<?php echo $user['senha']; ?>" required>
                <button type="submit">Atualizar Dados</button>
            </form>
        </div>
        <div class="user-books">
            <h3>Livros Emprestados</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID do Livro</th>
                        <th>Título</th>
                        <th>Data de Empréstimo</th>
                        <th>Data de Devolução</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($book = mysqli_fetch_assoc($books_result)) { ?>
                        <tr>
                            <td><?php echo $book['id_livro']; ?></td>
                            <td><?php echo $book['titulo']; ?></td>
                            <td><?php echo $book['data_emprestimo']; ?></td>
                            <td><?php echo $book['data_devolucao']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        <!-- Inclua aqui o rodapé, caso já tenha sido criado -->
    </footer>
</body>
</html>



