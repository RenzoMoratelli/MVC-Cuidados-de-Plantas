<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Plantas</title>
    <link rel="stylesheet" href="/mvcPlantas/app/views/css/plantas.css">
</head>
<body>
    <h1>Lista de Plantas</h1>

    <div style="text-align:center; margin-bottom:20px;">
        <a href="/mvcPlantas/planta/criar">+ Nova Planta</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome Científico</th>
            <th>Nome Popular</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($plantas as $p): ?>
            <tr>
                <td><?= $p->id ?></td>
                <td><?= $p->nome_cientifico ?></td>
                <td><?= $p->nome_popular ?></td>
                <td>
                    <a href="/mvcPlantas/planta/editar/<?= $p->id ?>">Editar</a> |
                    <a href="/mvcPlantas/planta/deletar/<?= $p->id ?>" onclick="return confirm('Deseja excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="/mvcPlantas">Voltar ao início</a></p>
</body>
</html>
