<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= isset($cuidado->id) ? "Editar Cuidado" : "Novo Cuidado" ?></title>
    <link rel="stylesheet" href="/mvcPlantas/app/views/css/form.css">

</head>
<body>
    <h1><?= isset($cuidado->id) ? "Editar Cuidado" : "Novo Cuidado" ?></h1>

    <form action="/mvcPlantas/cuidado/salvar" method="post">
        <input type="hidden" name="id" value="<?= $cuidado->id ?? '' ?>">

        <label>Usuário:</label><br>
        <select name="usuario_id" required>
            <option value="">Selecione um usuário</option>
            <?php foreach($usuarios as $u): ?>
                <option value="<?= $u->id ?>" <?= ($cuidado->usuario_id ?? '') == $u->id ? 'selected' : '' ?>>
                    <?= $u->nome ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Planta:</label><br>
        <select name="planta_id" required>
            <option value="">Selecione uma planta</option>
            <?php foreach($plantas as $p): ?>
                <option value="<?= $p->id ?>" <?= ($cuidado->planta_id ?? '') == $p->id ? 'selected' : '' ?>>
                    <?= $p->nome_popular ?> (<?= $p->nome_cientifico ?>)
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Tipo de Cuidado:</label><br>
        <input type="text" name="tipo_cuidado" value="<?= $cuidado->tipo_cuidado ?? '' ?>" required><br><br>

        <label>Frequência (dias):</label><br>
        <input type="number" name="frequencia" value="<?= $cuidado->frequencia ?? '' ?>" required><br><br>

        <button type="submit">Salvar</button>
    </form>

    <p><a href="/mvcPlantas/cuidado">Voltar à lista</a></p>
</body>
</html>
