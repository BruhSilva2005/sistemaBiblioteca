<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/aluno.php";

class alunoController{

    private $alunoModel;

    public function __construct()
    {
        $this->alunoModel= new Aluno();
    }

    public function listarAlunos(){
        return $this->alunoModel->listarAlunos();
    }
    public function cadastrarAlunos(){
            if($_SERVER['REQUEST_METHOD'] ==='POST'){
    
               $dados =[
                'nome'=>$_POST['nome'],
                'cpf'=>$_POST['cpf'],
                'email'=>password_hash ($_POST['email'],PASSWORD_DEFAULT),
                'telefone'=>$_POST['telefone'],
                'celular'=>$_POST['celular'],
                'data_nascimento'=>$_POST['data_nascimento']
               ];
    
               $this->alunoModel->cadastrar($dados);
    
               header('Location: index.php');   
               exit;
    
    
            }
    }

    public function EditarAluno(){{
        $id_aluno = $_GET['id_aluno'];
        if($_SERVER['REQUEST_METHOD'] ==='POST'){

            $dados =[
                'nome'=>$_POST['nome'],
                'cpf'=>$_POST['cpf'],
                'email'=>password_hash ($_POST['email'],PASSWORD_DEFAULT),
                'telefone'=>$_POST['telefone'],
                'celular'=>$_POST['celular'],
                'data_nascimento'=>$_POST['data_nascimento']
               ];

           $this->alunoModel->editar($id_aluno,$dados);

          header('Location: index.php');   
           exit;
        }
        return $this->alunoModel->buscar($id_aluno);
    }
    }
    public function excluirAluno(){

        $this->alunoModel->excluir($_GET['id_aluno']);

        header('location: index.php');
        exit;

    }


}