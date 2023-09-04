<?php 

class alunoController{

    private $alunoModel;

    public function __construct()
    {
        $this -> alunoModel= new Aluno();
    }


}