<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecario.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

    $AlunoController=new alunoController();
    $AlunoController->EditarAluno();

     // var_dump($aluno);
?>

<main class="container mt-3 mb-3">
    <h1>Editar Aluno</h1>

    <form action="editar.php?id_aluno=<?=$aluno->id_aluno ?>"method="post" class="row g-3">
        <div class="col-md-12">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required value="<?=$aluno->nome?>">
        </div>
        <div class="col-md-12">
            <label for="number" class="form-label">CPF</label>
            <input type="number" name="cpf" id="cpf" class="form-control" required value="<?=$aluno->nome?>">
        </div>
        <div class="col-md-6">
            <label for="email" class="form=label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" required value="<?=$aluno->email ?>">
        </div>
        <div class="col-md-6">
            <label for="phone" class="form=label">Telefone</label>
            <input type="phone" name="telefone" id="telefone" class="form-control" required value="<?=$aluno->telefone ?>">
        </div>
        <div class="col-md-6">
            <label for="phone" class="form=label">Celular</label>
            <input type="phone" name="celular" id="celulat" class="form-control" required value="<?=$aluno->celular ?>">
        </div>
        <div class="col-md-6">
            <label for="data_nascimento" class="form=label">Data de Nascimento
            </label>
            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control"required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php"class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</main>