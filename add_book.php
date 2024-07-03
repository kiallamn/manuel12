<?php
// Inclua a conexão com o banco de dados
include 'db_connect.php';

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

    // Move o arquivo para o diretório de uploads
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO livros (titulo, autor, editora, pub, pag, preco, img) VALUES ('$titulo', '$autor', '$editora', '$ano', '$paginas', '$preco', '$img')";
        if (mysqli_query($connect, $sql)) {
            echo "Livro adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar livro: " . mysqli_error($connect);
        }
    } else {
        echo "Erro ao fazer upload da imagem.";
    }
}
?>
