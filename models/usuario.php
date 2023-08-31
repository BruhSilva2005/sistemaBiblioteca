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

    }

    /**
     * listar todos os registros da tabela usuario
     */ 
    public function listar(){


    }
    /**
     * cadastrar usuario
     * @param array $dados
     * @return bool
     */
    public function cadastrar($dados){

    }
    /**
     * editar usuario
     *@param int $id
     *@param array $dados
     *@return bool
     */

    public function editar($id,$dados){

    }
    //excluir usuario
    public function excluir($id){

    }


}