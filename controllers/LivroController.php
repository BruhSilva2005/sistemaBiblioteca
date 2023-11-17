<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Livro.php";

class LivroController
{

    private $livroModel;

    public function __construct()
    {
        $this->livroModel = new Livro();
    }

    public function listarLivros()
    {
        return $this->livroModel->listar();
    }

    public function cadastrarLivro()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'numero_pagina' => $_POST['numero_pagina'],
                'preco' => $_POST['preco'],
                'ano_publicacao' => $_POST['ano_publicacao'],
                'isbn' => $_POST['isbn']
            ];

                if(isset($_FILES['capa']['name']) && !empty($_FILES['capa']['name']))  {
                $fileInfo = pathinfo($_FILES['capa']['name']);
                $nomeArquivo = md5(uniqid());
                $uploadDir = __dir__."/../uploads/";

                if(!is_dir($uploadDir)) {
                    mkdir($uploadDir,0777, true);
                }

                $novoNomeArquivo = $nomeArquivo . "." . $fileInfo["extension"];

                $pastaDestino = $uploadDir. $novoNomeArquivo;

                 move_uploaded_file($_FILES ['capa']['tmp_name'],$pastaDestino);

                $dados['capa'] = $novoNomeArquivo;

            }
            $this->livroModel->cadastrar($dados);
            header('Location: index.php');
            exit;
        }
    }

    public function editarLivro()
    {
        $id_livro = $_GET['id_livro'];
        $livro = $this->livroModel->buscar($id_livro);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $dados = [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'numero_pagina' => $_POST['numero_pagina'],
                'preco' => $_POST['preco'],
                'ano_publicacao' => $_POST['ano_publicacao'],
                'isbn' => $_POST['isbn']
            ];
            if(isset($_FILES['capa']['name']) && !empty($_FILES['capa']['name']))  {
                $fileInfo = pathinfo($_FILES['capa']['name']);
                $nomeArquivo = md5(uniqid());
                $uploadDir = __dir__."/../uploads/";

                if(!is_dir($uploadDir)) {
                    mkdir($uploadDir,0777, true);
                }

                $novoNomeArquivo = $nomeArquivo . "." . $fileInfo["extension"];

                $pastaDestino = $uploadDir. $novoNomeArquivo;

                 move_uploaded_file($_FILES ['capa']['tmp_name'],$pastaDestino);

                $dados['capa'] = $novoNomeArquivo;

            }else{ 
                $dados['capa'] = $livro->capa;
            }

            $this->livroModel->editar($id_livro, $dados);
            header('Location: index.php');
            exit;
        }

        return $livro ;
    }

    public function excluirLivro()
    {
        $livro = $this->livroModel->buscar($_GET['id_livro']);
        $imagemcapa = __DIR__."/../uploads/".$livro->capa;
        unset($imagemcapa);
        
        $this->livroModel->excluir($_GET['id_livro']);
        header('Location: index.php');
        exit;
    }
}
