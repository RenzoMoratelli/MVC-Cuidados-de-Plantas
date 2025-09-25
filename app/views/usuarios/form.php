<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= isset($usuario->id) ? "Editar Usuário" : "Novo Usuário" ?></title>
    <link rel="stylesheet" href="/mvcPlantas/app/views/css/form.css">
</head>
<body>
    <h1><?= isset($usuario->id) ? "Editar Usuário" : "Novo Usuário" ?></h1>

    <form action="/mvcPlantas/usuario/salvar" method="post">
        <input type="hidden" name="id" value="<?= $usuario->id ?? '' ?>">

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= $usuario->nome ?? '' ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $usuario->email ?? '' ?>" required><br><br>

        <button type="submit">Salvar</button>
    </form>

    <p><a href="/mvcPlantas/usuario">Voltar à lista</a></p>
</body>
</html>
