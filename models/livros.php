<?php

class livro{
    protected $db;
    protected $table = "livros";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

    public function buscar($id){
        try{
            $query = ("SELECT * FROM {$this->table} WHERE id_livro = :id");
            $stmt = $this->db->prepare($query);  
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $$livro = $stmt->fetch(PDO::FETCH_ASSOC);
            if($$livro){
                echo "ID: " .$livro['id_livro'] . "<br>";
                echo "titulo: " .$livro['titulo'] . "<br>";
                echo "autor: " .$livro['autor'] . "<br>"; 
                echo "preco: " .$livro['preco'] . "<br>";
                echo "numero_pagina: " .$livro['numero_pagina'] . "<br>";
                echo "ISBN: " .$livro['ISBN'] . "<br>"; 
                echo "ano_publicacao: " .$livro['ano_publicacao'] . "<br>";
            } //isso tudo aqui é temporário
        }catch(PDOException $e ){
            echo 'Erro na inserção: ' . $e->getMessage();
        }
    }

    public function listar(){

        try{
            $sql = "SELECT FROM {$this -> table} Where id_livro=:id";
            $stmt= $this ->db->prepare($sql);
            $stmt->execute();  
        }catch(PDOException $e){
            echo "erro na busca por usuario: " .$e -> getMessage();
        }
    }
    public function cadastrar($dados){
        try{
            $sql= "INSERT INTO {$this-> table} (titulo,autor, preco, numero_pagina,ISBN,ano_publicacao)
            VALUES(:titulo,:autor,:preco,:numero_pagina,:ISBN,:ano_publicacao)";
            $stmt = $this->db-> prepare($sql);
        }catch(PDOException $e){
            echo "erro na preparação da consulta:" .$e -> getMessage();
        }
        $stmt->bindParam(':titulo',$dados['titulo']);
        $stmt->bindParam(':autor',$dados['autor']);
        $stmt->bindParam(':preco',$dados['preco']);
        $stmt->bindParam(':numero_pagina',$dados['numero_pagina']);
        $stmt->bindParam(':ISBN',$dados['ISBN']);
        $stmt->bindParam(':ano_publicacao',$dados['ano_publicacao']);


        try{
            $stmt->execute();
            echo "Inserção bem-sucedida!";
        }catch(PDOException $e){
            echo "Erro na inserção: " .$e->getMessage();
        }
    }































}