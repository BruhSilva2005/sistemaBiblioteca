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


}