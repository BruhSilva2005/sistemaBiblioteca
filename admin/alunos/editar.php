<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecario.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Usuario.php";

    $alunoController = new alunoController();
    $aluno = $alunoController ->EditarAluno();

     // var_dump($aluno);
?>

<main class="container mt-3 mb-3">
    <h1>Editar Aluno</h1>

    <form action="editar.php?id_aluno=<?=$aluno->id_aluno ?>"method="post" class="row g-3">
        <div class="col-md-12">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required value="<?=$aluno->nome?>">
        </div>
        <div class="col-md-6">
            <label for="email" class="form=label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" required value="<?=$aluno->email ?>">
        </div>
        <div class="col-md-6">
            <label for="senha" class="form=label">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control">
            <p class="text-secondary">Caso queira manter a senha,deixe o campo em branco</p>
        </div>
        <div class=col-md-6>
            <label for="perfil" class="form-label">Perfil</label>
            <select name="perfil" class="form-select" id="perfil">
                <option>Selecione o Perfil</option>
                <option value="usuario"
                <?=($aluno->perfil =="aluno")?"selected":"";?> >Aluno</option>
                <option value="administrador"
                <?=($aluno->perfil == "admnistrador")? "selected":"";?>>administrador</option>
            </select>
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