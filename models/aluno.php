<?php  

class Aluno{
    protected $db;
    protected $table = "alunos";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }


public function buscar($id){
    try{
        $query = ("SELECT * FROM {$this -> table} where id_aluno = :id");
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->EXECUTE();
        $$aluno = $stmt->fetch(PDO::FETCH_ASSOC);
        if($aluno){
            echo "ID: " .$$aluno['id_aluno'] . "<br>"; 
            echo "nome: " .$$aluno['nome'] . "<br>"; 
            echo "cpf: " .$$aluno['cpf'] . "<br>"; 
            echo "email: " .$$aluno['email'] . "<br>"; 
            echo "telefone: " .$$aluno['telefone'] . "<br>"; 
            echo "celular: " .$$aluno['celular'] . "<br>"; 
            echo "data_nascimento: " .$$aluno['data_nascimento'] . "<br>"; 
        }//
    }catch(PDOException $e){
        echo "Erro na inserção " .$e->getMessage();
    }
}

public function listar(){

    try{
        $sql = "SELECT FROM {$this -> table} Where id_aluno=:id";
        $stmt= $this ->db->prepare($sql);
        $stmt->execute();  
    }catch(PDOException $e){
        echo "Erro na busca por aluno: " .$e -> getMessage();
    }
}
public function cadastrar($dados){
    try{
        $sql= "INSERT INTO {$this-> table} (nome,cpf, email, telefone,celular.
        ,data_nascimento)
        VALUES(:nome,:cpf,:email,:telefone,:celular,:data_nascimento)";
        $stmt = $this->db-> prepare($sql);
    }catch(PDOException $e){
        echo "erro na preparação da consulta:" .$e -> getMessage();
    }
    $stmt->bindParam(':name',$dados['nome']);
    $stmt->bindParam(':cpf',$dados['cpf']);
    $stmt->bindParam(':email',$dados['email']);
    $stmt->bindParam(':telefone',$dados['telefone']);
    $stmt->bindParam(':celular',$dados['celular']);
    $stmt->bindParam(':data_nascimento',$dados['data_nascimento']);

    try{
        $stmt->execute();
        echo "Inserção bem-sucedida!";
    }catch(PDOException $e){
        echo "Erro na inserção: " .$e->getMessage();
    }
}

public function editar($id,$dados){
    
    try{
        $sql = "UPDATE {$this -> table} SET nome=:nome cpf = :cpf ,email =:email , telefone = :telefone ,celular= :celular ,data_nascimento = :data_nascimento WHERE id_aluno = :id";
        $stmt =$this-> db->prepare($sql);
    }catch(PDOException $e){
        echo"Erro na preparacao da consulta: ".$e-> getMessage();
    }
    $stmt->bindParam(':name',$dados['nome']);
    $stmt->bindParam(':cpf',$dados['cpf']);
    $stmt->bindParam(':email',$dados['email']);
    $stmt->bindParam(':telefone',$dados['telefone']);
    $stmt->bindParam(':celular',$dados['celular']);
    $stmt->bindParam(':data_nascimento',$dados['data_nascimento']);
    try{
        $stmt->execuete();
        echo"Seus dados foram atualizados com Sucesso !";
    }catch(PDOException $e){
        echo "Erro na inserção: ".$e ->getMessage();
    }
}
public function excluir($id){

    try{
        $sql = "DELETE FROM {$this->table} where id_alunos=:id";
        $stmt = $this -> db-> prepare($sql);
        //passagem de parametros e execução do sql
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->execute();
    }catch(PDOException $e){
        echo"Erro ao excluir dado" .$e->  getMessage();
    }   
}
























}