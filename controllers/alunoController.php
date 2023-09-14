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
               ];
    
               $this->alunoModel->cadastrar($dados);
    
               header('Location: index.php');   
               exit;
    
    
            }
    }


}