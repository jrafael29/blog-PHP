<?php
require_once 'model/Post.php';


class PostDaoMysql implements PostDao{

    private $pdo;

    public function __construct(PDO $motor)
    {
        $this->pdo = $motor;
    }

    public function adicionar(Post $p)
    {
        $sql = $this->pdo->prepare("INSERT INTO posts (autor, titulo, texto, imagem) VALUES (:autor, :titulo, :texto, :imagem)");
        $sql->bindValue(":autor", $p->getAutor());
        $sql->bindValue(":titulo", $p->getTitulo());
        $sql->bindValue(":texto", $p->getTexto());
        $sql->bindValue(":imagem", $p->getImagem());
        $sql->execute();
    }
    public function listarTodos()
    {
        $lista = [];

        $sql = $this->pdo->query("SELECT * FROM posts");
        if($sql->rowCount() > 0){
            $dados = $sql->fetchAll();

            foreach($dados as $post){
                $p = new Post();
                $p->setId($post['id']);
                $p->setAutor($post['autor']);
                $p->setTitulo($post['titulo']);
                $p->setTexto($post['texto']);
                $p->setImagem($post['imagem']);

                $lista[] = $p;
            }
        }
        return $lista;

    }
    public function listarPorId($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM posts WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            $lista = $sql->fetch();

            $p = new Post();
            $p->setId($lista['id']);
            $p->setAutor($lista['autor']);
            $p->setTitulo($lista['titulo']);
            $p->setTexto($lista['texto']);
            $p->setImagem($lista['imagem']);


            return $p;
        }
    }
    public function atualizar(Post $p)
    {

        $sql = $this->pdo->prepare("UPDATE posts SET autor = :autor, titulo = :titulo, texto = :texto, imagem = :imagem WHERE id = :id");
        $sql->bindValue(":autor", $p->getAutor());
        $sql->bindValue(":titulo", $p->getTitulo());
        $sql->bindValue(":texto", $p->getTexto());
        $sql->bindValue(":imagem", $p->getImagem());
        $sql->bindValue(":id", $p->getId());
        $sql->execute();

        return true;

    }
    public function deletar($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM posts WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        return true;
    }

}