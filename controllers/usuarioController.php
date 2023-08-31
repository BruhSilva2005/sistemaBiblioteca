<?php

class usuarioController{

    private $usuarioModel;

    public function __construct()
    {
        $this -> usuarioModel= new Usuario();
    }

}