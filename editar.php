<?php
require 'config.php';
require 'model/Post.php';
require 'dao/PostDaoMysql.php';
require 'template/header.html';

$postDao = new PostDaoMysql($pdo);


$id = filter_input(INPUT_GET, 'id');

if($id){
    $post = $postDao->listarPorId($id);
}else{
    header("Location: index.php");
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
    <div class="content">
        <h2 style="text-align: center; margin-bottom:20px;">Atualizar post</h2>
        <form action="editar_action.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$post->getId();?>">
            <label>Autor: <br>
                <input class="input" type="text" name="autor" required value="<?=$post->getAutor();?>" maxlength="30">
            </label>
        <br><br>
            <label>Titulo: <br>
                <input class="input" type="text" name="titulo" required value="<?=$post->getTitulo();?>" maxlength="150">
            </label>
        <br><br>
            <label>Corpo da publicação: <br>
                <textarea name="texto" cols="30" rows="5" required maxlength="1500" style="resize: none;"><?=$post->getTexto();?></textarea>
            </label>
        <br><br>
            <input type="hidden" name="imagemAntiga" value="<?=$post->getImagem()?>">
            <label>
                Imagem: <br>
                <input type="file" name="imagem">
            </label>
        <br><br>
            <input class="btn" type="submit" value="Atualizar">
        </form>
    </div>
</body>
</html>