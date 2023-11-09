<?php  
        require_once $_SERVER['DOCUMENT_ROOT'] . "/sistemabiblioteca/database/DBConexao.php";

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
public function cadastrar($dados)
{
    try{
        $query = "INSERT INTO {$this->table} (nome, email, senha, perfil) VALUES(:nome, :email, :senha, :perfil)";
        $stmt = $this->db->prepare($query);  

        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':email', $dados['email']);
        $stmt->bindParam(':senha', $dados['senha']);
        $stmt->bindParam(':perfil', $dados['perfil']);
       
        $stmt->execute();
        $_SESSION['sucesso'] = "Cadastro realizado com sucesso";
       
        return true;

    }catch(PDOException $e){
        echo 'Erro ao cadastrar: ' . $e->getMessage();

        $_SESSION['erro'] = "Erro ao cadastrar usuario";

        return false;  
    }
}

public function editar($id_usuario, $dados)
    {
        try{
            $query = "UPDATE {$this->table} SET nome = :nome, email = :email, senha = :senha, perfil = :perfil WHERE id_usuario = :id";
            $stmt = $this->db->prepare($query);
 
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':senha', $dados['senha']);
            $stmt->bindParam(':perfil', $dados['perfil']);
            $stmt->bindParam(':id', $id_usuario, PDO::PARAM_INT);
 
            $stmt->execute();
            $_SESSION['sucesso'] = "Usuario editado com sucesso";
            return true;
        }catch(PDOException $e){
            echo 'Erro ao editar: ' . $e->getMessage();
            return false;
        }
    }
    public function excluir($id_usuario)
    {
        try{
            //Montagem e preparação do SQL
            $query = "DELETE FROM {$this->table} WHERE id_usuario = :id_usuario";
            $stmt = $this->db->prepare($query);
           
            //Passagem de parametros
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            $_SESSION['sucesso'] = "Usuario excluido com sucesso";
        }catch(PDOException $e){
            echo 'Erro na preparação da exclusão: ' . $e->getMessage();
        }
    }
























}