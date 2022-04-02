<?php
require 'template/header.html';
require 'config.php';
require 'model/Post.php';
require 'dao/PostDaoMysql.php';
$postDao = new PostDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id){
    $post = $postDao->listarPorId($id);
}else{
    header("Location: visualizarTodos.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
            
            <div class="post">
                <div class="titulo">
                    <h2><?= $post->getTitulo(); ?></h2>
                </div>
                <div class="imagem">
                    <img src="uploads/<?= $post->getImagem(); ?>" alt="">
                </div>
                <div class="conteudo">
                    
                    <p> <?= $post->getTexto(); ?></p>
                </div>

                <address>Autor: <?= $post->getAutor(); ?></address>

                <div class="actions">
                    <a href="editar.php?id=<?=$post->getId()?>">Editar post</a>
                    <a href="excluir.php?id=<?=$post->getId()?>" onclick="return confirm('Deseja mesmo excluir este post?')">Excluir post</a>

                </div>
            </div>
            <a href="visualizarTodos.php">Voltar</a>
    </div>
</body>
</html>