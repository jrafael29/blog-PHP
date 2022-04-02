<?php
require 'template/header.html';
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
    <h2 style="text-align: center; margin-bottom:20px;">Adicionar post</h2>
        <form action="adicionar_action.php" method="post" enctype="multipart/form-data">
            <label>Autor: <br>
                <input class="input" type="text" name="autor" placeholder="Insira o nome do autor" maxlength="30" required>
            </label>
        <br><br>
            <label>Titulo: <br>
                <input class="input" type="text" name="titulo" placeholder="Insira o titulo da publicação" maxlength="150" required>
            </label>
        <br><br>
            <label>Corpo da publicação: <br>
                <textarea name="texto" cols="30" rows="5" maxlength="1500" required style="resize: none;"></textarea>
            </label>
        <br><br>
            <label>
                Imagem: <br>
                <input type="file" name="imagem">
            </label>
        <br><br>
            <input class="btn" type="submit" value="Adicionar">
        </form>
    </div>
</body>
</html>
