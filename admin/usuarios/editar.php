<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecario.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Usuario.php";


    $UsuarioController = new UsuarioController();

     $usuario = $UsuarioController ->EditarUsuario();

     var_dump($usuario);
    

?>

<main class="container mt-3 mb-3">
    <h1>Editar Usuario Usuario</h1>

    <form action="editar.php?id=<?=$usuario->id_usuario ?>"method="post" class="row g-3">
        <div class="col-md-12">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" 
            required value="<?=$usuario->nome ?>">
        </div>
        <div class="col-md-6">
            <label for="email" class="form=label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" required value="<?=$usuario->email ?>">
        </div>
        <div class="col-md-6">
            <label for="senha" class="form=label">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control">
        </div>
        <div class=col-md-6>
            <label for="perfil" class="form-label">Perfil</label>
            <select name="perfil" class="form-select" id="perfil">
                <option>Selecione o Perfil</option>
                <option value="usuario">Usuario</option>
                <option value="administrador">administrador</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Editar</button>
            <a href="index.php"class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</main>





















<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>