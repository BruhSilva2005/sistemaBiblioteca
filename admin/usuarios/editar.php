
<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/sistemabiblioteca/includes/cabecario.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/sistemabiblioteca/controllers/UsuarioController.php";
 
    $usuarioControler = new UsuarioController();
 
    $usuario = $usuarioControler->editarUsuario();
 
    //var_dump($usuario);
?>
 
<main class="container mt-3 mb-3">
    <h1>Editar Usuário</h1>
 
    <form action="editar.php?id_usuario=<?=$usuario->id_usuario?>" method="post" class = "row g-3">
 
        <div class="col-md-12">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" required value="<?=$usuario->nome?>">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" required value="<?=$usuario->email?>">
        </div>
        <div class="col-md-6">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" name="senha" id="senha">
            <p class="text-secondary">Caso queira manter a senha, deixe o campo em branco.</p>
        </div>
        <div class="col-md-8">
        <label for="Perfil" class="form-label">Perfil</label>
        <select name="perfil" class="form-select" id="perfil" required>
            <option disabled>Selecione o Perfil</option>
            <option value="usuario" <?=($usuario->perfil=="usuario")? "selected":"";?>>Usuario</option>
            <option value="administrador" <?=($usuario->perfil=="administrador")?"selected":"";?>>Administrador</option>
        </select>
        </div>
 
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>
 
    </form>
 
 
</main>  
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/sistemabiblioteca/includes/rodape.php";?>