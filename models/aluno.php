<?php
require_once $_SERVER ['DOCUMENT_ROOT'] . "/database/DBConexao.php";
class Aluno{
 
   protected $db;
   protected $table = "alunos";
 
   public function __construct()
   {
        $this->db= DBConexao::getConexao();
   }
 
   /**
   * Busca registro unico
   * @param int $id
   * @return Usuario
   */
   public function buscarAluno($id, $dados){
 
     
      try{
         $query = "SELECT * FROM {$this->table} WHERE id_aluno = :id";
         $stmt = $this->db->prepare($query);  
         $stmt->bindParam(":id", $id, PDO::PARAM_INT);
         $stmt->execute();
       
         return $stmt->fetch(PDO::FETCH_OBJ);
 
     }catch(PDOException $e ){
         echo 'Erro na inserção: ' . $e->getMessage();
         return null;
     }
}
 
   /**
    *Listar todos os registros da tabela do usuário
    */
   public function listarAluno(){
      try{
         $query = "SELECT * FROM {$this->table}";
         $stmt = $this->db->query($query);
         return $stmt->fetchAll(PDO::FETCH_OBJ);
         
     }catch(PDOException $e){
         echo 'Erro na inserção: ' . $e->getMessage();
         return null;
     }
   }
   /**
    *Cadastrar Usuários.
    *
    *@param array $dados
    *@return bool
    */
 
   public function cadastrarAluno($dados){
 
      try{
         $sql = "INSERT INTO {$this->table}(nome, cpf, email, telefone, celular, data_nascimento)
         VALUES(:nome, :cpf, :email, :telefone, :celular, :data_nascimento)";
         $stmt = $this->db->prepare($sql);
 
         $stmt ->bindParam('nome', $dados['nome']);
         $stmt ->bindParam('cpf', $dados['cpf']);
         $stmt ->bindParam('email', $dados['email']);
         $stmt ->bindParam('telefone', $dados['telefone']);
         $stmt ->bindParam('celular', $dados['celular']);
         $stmt ->bindParam('data_nascimento', $dados ['data_nascimento']);
         $stmt->execute();
         return true;
 
      }catch(PDOException $e){
         echo "Erro na preparação da consulta" .$e->getMessage();
         return false;
      }
   }
   /**
    *Editar Usuários.
    *
    *@param int $id
    *@param array $dados
    *@return bool
    */
   public function editarAluno($id, $dados){
 
      try{
         $sql= ("UPDATE {$this->table} usuarios SET nome = :nome,  cpf = :cpf,email = :email,telefone = :telefone,celular = :celular, data_nascimento = :data_nascimento
         WHERE id_usuario = :$id");
         $stmt = $this->db->prepare($sql);
 
         $stmt ->bindParam('nome', $dados['nome']);
         $stmt ->bindParam('cpf', $dados['cpf']);
         $stmt ->bindParam('email', $dados['email']);
         $stmt ->bindParam('telefone', $dados['telefone']);
         $stmt ->bindParam('celular', $dados['celular']);
         $stmt ->bindParam('data_nascimento', $dados ['data_nascimento']);
         $stmt->execute();
         return true;
 
      }catch(PDOException $e){
         echo "Erro na atualização dos dados: " . $e->getMessage();
         return false;
      }  
   }
   //Excluir dados do usuário.
   public function excluir($id){
 
     
      try{
 
         //Montagem e preparação do SQL
         $sql= "DELETE FROM {$this->table} WHERE id = id_usuario";
         $stmt= $this->db->prepare($sql);
 
         //Passagem de parametros
         $stmt->bindParam(':id', $id, PDO::PARAM_INT);
         $stmt->execute();
      }
      catch(PDOException $e){
         echo "Erro na preparação da consulta do aluno:" . $e->getMessage();
      }
     
     
   }
 
}