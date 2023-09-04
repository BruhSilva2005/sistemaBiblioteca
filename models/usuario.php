<?php

class Usuario{

    protected $db;
    protected $table = "usuarios";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

    /**
     * busca registro unico
     * @param int $id
     * @return Usuario
     */
    public function buscar($id){
        try{
            $query = ("SELECT * FROM {$this->table} WHERE id_usuario = :id");
            $stmt = $this->db->prepare($query);  
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if($usuario){
                echo "ID: " .$usuario['id_usuario'] . "<br>";
                echo "Nome: " .$usuario['nome'] . "<br>";
                echo "E-mail: " .$usuario['email'] . "<br>";
                echo "Perfil: " .$usuario['perfil'] . "<br>";
            } //isso tudo aqui é temporário
        }catch(PDOException $e ){
            echo 'Erro na inserção: ' . $e->getMessage();
        }

      
    }

    /**
     * listar todos os registros da tabela usuario
     */ 
    public function listar(){

        try{
            $sql = "SELECT FROM {$this -> table} Where id_usuario=:id";
            $stmt= $this ->db->prepare($sql);
            $stmt->execute();  
        }catch(PDOException $e){
            echo "erro na busca por usuario: " .$e -> getMessage();
        }
    }
    /**
     * cadastrar usuario
     * @param array $dados
     * @return bool
     */
    public function cadastrar($dados){
        try{
            $sql= "INSERT INTO {$this-> table} (nome,email, senha, perfil,)
            VALUES(:nome,:email,:senha,:perfil)";
            $stmt = $this->db-> prepare($sql);
        }catch(PDOException $e){
            echo "erro na preparação da consulta:" .$e -> getMessage();
        }
        $stmt->bindParam(':name',$dados['nome']);
        $stmt->bindParam(':email',$dados['email']);
        $stmt->bindParam(':senha',$dados['senha']);
        $stmt->bindParam(':perfil',$dados['perfil']);

        try{
            $stmt->execute();
            echo "Inserção bem-sucedida!";
        }catch(PDOException $e){
            echo "Erro na inserção: " .$e->getMessage();
        }
    }
    /**
     * editar usuario
     *@param int $id
     *@param array $dados
     *@return bool
     */

    public function editar($id,$dados){

        try{
            $sql = "UPDATE {$this -> table} SET nome=:nome email = :email ,senha =:senha , perfil = :perfil WHERE id = :id";
            $stmt =$this-> db->prepare($sql);
        }catch(PDOException $e){
            echo"Erro na preparacao da consulta: ".$e-> getMessage();
        }
        $stmt->bindParam(':name',$dados['nome']);
        $stmt->bindParam(':email',$dados['email']);
        $stmt->bindParam(':senha',$dados['senha']);
        $stmt->bindParam(':perfil',$dados['perfil']);

        try{
            $stmt->execuete();
            echo"Seus dados foram atualizados com Sucesso !";
        }catch(PDOException $e){
            echo "Erro na inserção: ".$e ->getMessage();
        }

        

    }
    //excluir usuario
    public function excluir($id){

        try{
            $sql = "DELETE FROM {$this->table} where id=:id";
            $stmt = $this -> db-> prepare($sql);
            //passagem de parametros e execução do sql
            $stmt->bindParam(':id',$id, PDO::PARAM_INT);
            $stmt->execute();
        }catch(PDOException $e){
            echo"Erro ao excluir dado" .$e->  getMessage();
        }   
    }
}