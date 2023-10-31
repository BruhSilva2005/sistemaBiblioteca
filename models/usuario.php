<?php  
        require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

class usuarios{
    protected $db;
    protected $table = "usuarios";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }


    public function buscar($id){
        try {
            $sql = ("SELECT * FROM {$this->table} WHERE id_aluno = :id");
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt ->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro na inserção!" . $e->getMessage();
            return null;
        }
    }

public function listarUsuario(){
    try{
        $sql = "SELECT * FROM {$this->table}";
        $stmt= $this ->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    catch(PDOException $e){
        echo "Erro ao listar: " .$e -> getMessage();
        return null;
    }
}       
        public function cadastrar($dados){
            try{
                $query= "INSERT INTO {$this->table} (nome,cpf, email, telefone,celular,data_nascimento)
                VALUES(:nome,:cpf,:email,:telefone,:celular,:data_nascimento)";
                $stmt = $this->db-> prepare($query);
                 $stmt->bindParam(':nome',$dados['nome']);
                 $stmt->bindParam(':cpf',$dados['cpf']);
                 $stmt->bindParam(':email',$dados['email']);
                 $stmt->bindParam(':telefone',$dados['telefone']);
                 $stmt->bindParam(':celular',$dados['celular']);
                 $stmt->bindParam(':data_nascimento',$dados['data_nascimento']);
                 $stmt->execute();
                 return true;
            }catch(PDOException $e){
                 echo "erro na preparação da consulta:" .$e -> getMessage();
                 return false;   
            }
}

public function editar($id,$dados){
    
    try{
        $sql = "UPDATE {$this -> table} SET nome=:nome cpf = :cpf ,email =:email , telefone = :telefone ,celular= :celular ,data_nascimento = :data_nascimento WHERE id_aluno = :id";
        $stmt =$this-> db->prepare($sql);
        $stmt->bindParam(':name',$dados['nome']);
        $stmt->bindParam(':cpf',$dados['cpf']);
        $stmt->bindParam(':email',$dados['email']);
        $stmt->bindParam(':telefone',$dados['telefone']);
        $stmt->bindParam(':celular',$dados['celular']);
        $stmt->bindParam(':data_nascimento',$dados['data_nascimento']);
        $stmt->execute();
        return true;
    }catch(PDOException $e){
        echo"Erro na preparacao da consulta: ".$e-> getMessage();
        return false;
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