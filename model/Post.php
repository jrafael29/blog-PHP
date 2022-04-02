<?php

class Post{

    private $id;
    private $autor;
    private $titulo;
    private $texto;
    private $imagem;

    // setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setAutor($a)
    {
        $this->autor = ucwords(strtolower(trim($a)));
    }
    public function setTitulo($t)
    {
        $this->titulo = trim($t);
    }
    public function setTexto($t)
    {
        $this->texto = trim($t);
    }
    public function setImagem($i)
    {
        $this->imagem = trim($i);
    }
    

    // getters
    public function getId()
    {
        return $this->id;
    }
    public function getAutor()
    {
        return $this->autor;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getTexto()
    {
        return $this->texto;
    }
    public function getImagem()
    {
        return $this->imagem;
    }

}

interface PostDao{
    
    public function adicionar(Post $p);
    public function listarTodos();
    public function listarPorId($id);
    public function atualizar(Post $p);
    public function deletar($id);

}