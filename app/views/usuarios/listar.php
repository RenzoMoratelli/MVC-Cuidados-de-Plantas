<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="/mvcPlantas/app/views/css/usuarios.css">
</head>
<body>
    <h1>Lista de Usuários</h1>

    <div style="text-align: center; margin-bottom: 20px;">
        <a href="/mvcPlantas/usuario/criar">+ Novo Usuário</a>
    </div>

    <table border="1" cellpadding="5" style="margin: 0 auto;">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u->id ?></td>
                <td><?= $u->nome ?></td>
                <td><?= $u->email ?></td>
                <td>
                    <a href="/mvcPlantas/usuario/editar/<?= $u->id ?>">Editar</a> |
                    <a href="/mvcPlantas/usuario/deletar/<?= $u->id ?>" onclick="return confirm('Deseja excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="/mvcPlantas">Voltar ao início</a></p>
</body>
</html>
