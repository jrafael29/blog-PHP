<?php
require 'config.php';
require 'model/Post.php';
require 'dao/PostDaoMysql.php';

$postDao = new PostDaoMysql($pdo);


$autor = filter_input(INPUT_POST, 'autor');
$texto = filter_input(INPUT_POST, 'texto');
$titulo = filter_input(INPUT_POST, 'titulo');
$imagem = $_FILES['imagem'];

$imagemNome;
if(isset($imagem)){
    $str = $imagem['name'];
    $arr = explode(".", $str);
    $extensao = "." . $arr[1];
    $imagemNome = md5(time() ). $extensao;
    $dir = "./uploads/";
    move_uploaded_file($imagem['tmp_name'], $dir . $imagemNome);
}

if($autor && $texto){

    $novoPost = new Post();
    $novoPost->setAutor($autor);
    $novoPost->setTitulo($titulo);
    $novoPost->setTexto($texto);
    $novoPost->setImagem($imagemNome);
    $postDao->adicionar($novoPost);


    header("Location: visualizarTodos.php");
    exit;


}else{
    header("Location: adicionar.php");
    exit;
}