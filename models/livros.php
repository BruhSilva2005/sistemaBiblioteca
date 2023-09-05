<?php

class livro{
    protected $db;
    protected $table = "livros";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }
    /**
     * buscar registro unico
     * @param int $id
     * @return Usuario|null 
     */

    public function buscar($id){
        try{
            $query = ("SELECT * FROM {$this->table} WHERE id_livro = :id");
            $stmt = $this->db->prepare($query);  
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e ){
            echo 'Erro na Busca: ' . $e->getMessage();
            return  null ;
        }
    }

    public function listar(){

        try{
            $sql = "SELECT FROM {$this -> table}";
            $stmt= $this ->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo 'Erro ao Listar: ' . $e->getMessage();
            return  null;
        }
    }
    public function cadastrar($dados){
        try{
            $sql= "INSERT INTO {$this-> table} (titulo,autor, preco, numero_pagina ISBN,ano_publicacao)
            VALUES(:titulo,:autor,:preco,:numero_pagina,:ISBN,:ano_publicacao)";
        $stmt = $this->db-> prepare($sql);
        $stmt->bindParam(':titulo',$dados['titulo']);
        $stmt->bindParam(':autor',$dados['autor']);
        $stmt->bindParam(':preco',$dados['preco']);
        $stmt->bindParam(':numero_pagina',$dados['numero_pagina']);
        $stmt->bindParam(':ISBN',$dados['ISBN']);
        $stmt->bindParam(':ano_publicacao',$dados['ano_publicacao']);
         $stmt->execute();
        return true;
        }catch(PDOException $e){
            echo "erro na preparação da consulta:" .$e -> getMessage();
            return false;
        }
    }
    public function editar($id,$dados){

        try{
            $sql = "UPDATE {$this -> table} SET titulo=:titulo autor = :autor ,preco =:preco , numero_pagina = :numero_pagina,ISBN =:ISBN, ano_publicacao =:ano_publicacao WHERE id_livro = :id";
            $stmt =$this-> db->prepare($sql);
            $stmt->bindParam(':titulo',$dados['titulo']);
            $stmt->bindParam(':autor',$dados['autor']);
            $stmt->bindParam(':numero_pagina',$dados['numero_pagina']);
            $stmt->bindParam(':ISBN',$dados['ISBN']);
            $stmt->bindParam(':ano_publicacao',$dados['ano_publicacao']);
            $stmt->bindParam(':id',$id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo"Erro na preparacao da consulta: ".$e-> getMessage();
            return false;
        }

    }
    public function excluir($id){

        try{
            $sql = "DELETE FROM {$this->table} where id_livro=:id";
            $stmt = $this -> db-> prepare($sql);
            //passagem de parametros e execução do sql
            $stmt->bindParam(':id',$id, PDO::PARAM_INT);
            $stmt->execute();
        }catch(PDOException $e){
            echo"Erro ao excluir dado" .$e->  getMessage();
        }   
    }
}