<?php
require 'config.php';
require 'model/Post.php';
require 'dao/PostDaoMysql.php';
$postDao = new PostDaoMysql($pdo);


$id = filter_input(INPUT_POST, 'id');
$autor = filter_input(INPUT_POST, 'autor');
$titulo = filter_input(INPUT_POST, 'titulo');
$texto = filter_input(INPUT_POST, 'texto');
$antigaImagem = filter_input(INPUT_POST, 'imagemAntiga');
$novaImagem = $_FILES['imagem'];

$imagemNome;

if($novaImagem['name'] != ""){
    // se tiver foto:
    $str = $novaImagem['name'];
    $arr = explode(".", $str);
    $extensao = "." . $arr[1];
    $imagemNome = md5(time() ). $extensao;
    $dir = "./uploads/";
    move_uploaded_file($novaImagem['tmp_name'], $dir . $imagemNome);
    unlink($dir.$antigaImagem);

}else{
    $imagemNome = $antigaImagem;
}

if($id && $autor && $titulo && $texto){
    $p = new Post();
    $p->setId($id);
    $p->setAutor($autor);
    $p->setTitulo($titulo);
    $p->setTexto($texto);
    $p->setImagem($imagemNome);
    
    $postDao->atualizar($p);

    header("Location: visualizarTodos.php");
    exit;

}else{
    header("Location: index.php");
    exit;
}