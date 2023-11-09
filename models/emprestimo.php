<?php  
        require_once $_SERVER['DOCUMENT_ROOT'] . "/sistemabiblioteca/database/DBConexao.php";

class emprestimo{
    protected $db;
    protected $table = "emprestimo";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }


    public function buscar($id){
        try {
            $sql = ("SELECT * FROM {$this->table} WHERE id_emprestimo = :id");
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt ->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro na inserção!" . $e->getMessage();
            return null;
        }
    }

public function listar(){
    try{
        $sql = "SELECT FROM {$this -> table} Where id_emprestimo=:id";
        $stmt= $this ->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
        echo "Erro ao listar: " .$e -> getMessage();
        return null;
    }
}       
        public function cadastrar($dados){
            try{
                $query= "INSERT INTO {$this->table} (id_livro,id_aluno, data_emprestimo, data_devolucao)
                VALUES(:id_livro,:id_aluno,:data_emprestimo,:data_devolucao,)";
                $stmt = $this->db-> prepare($query);
                 $stmt->bindParam(':id_livro',$dados['id_livro']);
                 $stmt->bindParam(':id_aluno',$dados['id_aluno']);
                 $stmt->bindParam(':data_emprestimo',$dados['data_emprestimo']);
                 $stmt->bindParam(':data_devolucao',$dados['data_devolucao']);
                 $stmt->execute();
                 return true;
            }catch(PDOException $e){
                 echo "erro na preparação da consulta:" .$e -> getMessage();
                 return false;   
            }
}

public function editar($id,$dados){
    
    try{
        $sql = "UPDATE {$this -> table} SET id_livro=:id_livro id_aluno = :id_aluno ,data_emprestimo =:data_emprestimo , data_devolucao = :data_devolucao WHERE id_emprestimo = :id";
        $stmt =$this-> db->prepare($sql);
        $stmt->bindParam(':id_livro',$dados['id_livro']);
        $stmt->bindParam(':id_aluno',$dados['id_aluno']);
        $stmt->bindParam(':data_emprestimo',$dados['data_emprestimo']);
        $stmt->bindParam(':data_devolucao',$dados['data_devolucao']);
        $stmt->execute();
        return true;
    }catch(PDOException $e){
        echo"Erro na preparacao da consulta: ".$e-> getMessage();
        return false;
    }       
}
public function excluir($id){

    try{
        $sql = "DELETE FROM {$this->table} where id_emprestimo=:id";
        $stmt = $this -> db-> prepare($sql);
        //passagem de parametros e execução do sql
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->execute();
    }catch(PDOException $e){
        echo"Erro ao excluir dado" .$e->  getMessage();
    }   
}
























}