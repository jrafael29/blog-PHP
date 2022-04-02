<?php

require 'config.php';
require 'model/Post.php';
require 'dao/PostDaoMysql.php';
$postDao = new PostDaoMysql($pdo);


$id = filter_input(INPUT_GET, 'id');

if($id){

    $post = $postDao->listarPorId($id);
    $img = $post->getImagem();
    $dir = "uploads/".$img;
    echo $dir;
    unlink($dir);

    $postDao->deletar($id);

    header("Location: visualizarTodos.php");
    exit;

}else{
    header("Location: index.php");
    exit;
}