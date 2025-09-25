<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Cuidados</title>
    <link rel="stylesheet" href="/mvcPlantas/app/views/css/cuidados.css">
</head>
<body>
    <h1>Lista de Cuidados</h1>
    <a href="/mvcPlantas/cuidado/criar">+ Novo Cuidado</a>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Planta</th>
            <th>Tipo de Cuidado</th>
            <th>Frequência (dias)</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($cuidados as $c): ?>
            <tr>
                <td><?= $c->id ?></td>
                <td><?= $c->usuario_id ?></td>
                <td><?= $c->planta_id ?></td>
                <td><?= $c->tipo_cuidado ?></td>
                <td><?= $c->frequencia ?></td>
                <td>
                    <a href="/mvcPlantas/cuidado/editar/<?= $c->id ?>">Editar</a> |
                    <a href="/mvcPlantas/cuidado/deletar/<?= $c->id ?>" onclick="return confirm('Deseja excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="/mvcPlantas">Voltar ao início</a></p>
</body>
</html>
