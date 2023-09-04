<?php

class livroController{
    private $livroModel;

    public function __construct()
    {
        $this ->  livroModel = new livro();
    }
}