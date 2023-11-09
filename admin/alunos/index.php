<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/sistemabiblioteca/includes/cabecario.php";
require_once $_SERVER ['DOCUMENT_ROOT'] . "/sistemabiblioteca/controllers/alunoController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sistemabiblioteca/models/aluno.php";

if(isset($_GET["del"])&& !empty($_get['id_aluno'])){

    $alunoController = new alunoController();
    $usuarioController->excluirAluno();
}

?>

    <main class=" container mt-3 mb-3">
          <h1>Lista de Alunos</h1>

          <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>Data de Nascimento</th>     
                    <th style = "width: 200px;">Ação</th>           
                </tr>
            </thead>
            <tbody>
                <?php

                    $alunoController = new AlunoController();

                    $aluno = $alunoController->listarAlunos();

                    //var_dump($alunos);

                    foreach($aluno as $alunos):
                ?>

                <tr>

                <td><?=$alunos->id_aluno?></td>
                <td><?=$alunos->nome?></td>
                <td><?=$alunos->cpf?></td>
                <td><?=$alunos->email?></td>
                <td><?=$alunos->telefone?></td>
                <td><?=$alunos->celular?></td>
                <td><?=$alunos->data_nascimento?></td>
                <td>
                    <a href="editar.php?id_aluno=<?=$alunos->id_aluno?>" class="btn btn-primary">Editar</A>
                    <a href = "index.php?id_aluno=<?=$alunos->id_aluno?>" class="btn btn-primary">Excluir</a>
                </td>       
            </tr>
            <?php
            endforeach;
            ?>   
            </tbody>
          </table>
    </main>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
    ?>
      