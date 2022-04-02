<?php
require 'template/header.html';
require 'config.php';
require 'model/Post.php';
require 'dao/PostDaoMysql.php';
$postDao = new PostDaoMysql($pdo);

$posts = $postDao->listarTodos();



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
        <?php foreach($posts as $post): ?>
            <div class="post">
                <div class="titulo">
                    <h2> <a href="visualizar.php?id=<?=$post->getId();?>"> <?= $post->getTitulo(); ?></a> </h2>
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
        <?php endforeach; ?>
    </div>
</body>
</html>